<?php

namespace App\Http\Controllers\Home;

use App\Models\Comment;
use App\Models\Market\Order;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;
use App\Models\Market\Product;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserDashbordController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', auth()->user()->id)->get();
        $favouriteProducts = Auth::user()->favouriteProducts()->get();

        $frequentProducts = DB::table('order_items')
        ->join('orders', 'order_items.order_id', '=', 'orders.id')
        ->join('products', 'order_items.product_id', '=', 'products.id')
        ->where('orders.user_id', auth()->user()->id)
        ->select(
            'products.id',
            'products.name',
            'products.price',
            'products.image',
            'products.slug',
            DB::raw('count(*) as total_orders')
        )
        ->groupBy('products.id', 'products.name', 'products.price', 'products.image', 'products.slug')
        ->orderByDesc('total_orders')
        ->get();

        return view('app.user-dashbord.index', compact('orders', 'favouriteProducts', 'frequentProducts'));
    }

    public function userInfo()
    {
        $selectedAttributes = [
            'نام کاربری' => auth()->user()->name,
            'اطلاعات تماس' => auth()->user()->email ?? auth()->user()->mobile,
            'تاریخ ثبت نام' => Jalalian::forge(auth()->user()->created_at)->format('%A, %d %B %y'),
        ];
        return view('app.user-dashbord.user-info', compact('selectedAttributes'));
    }

    public function userOrders()
    {
        $pendingOrders = Order::where('user_id', auth()->user()->id)->where('order_status', 0)->with('orderItems.product')->get();
        $paidOrders = Order::where('user_id', auth()->user()->id)->where('order_status', 2)->where('peyment_status', 1)->with('orderItems.product')->get();
        $failedOrders = Order::where('user_id', auth()->user()->id)->where('order_status', 3)->with('orderItems.product')->get();
        return view('app.user-dashbord.user-orders', compact('pendingOrders', 'paidOrders', 'failedOrders'));
    }

    public function userOrdersDetail(Order $order)
    {
        return view('app.user-dashbord.user-orders-detail', compact('order'));
    }

    public function userComments()
    {
        $comments = Comment::with('product')->latest()->where('user_id', auth()->user()->id)->whereNull('parent_id')->paginate(5);
        return view('app.user-dashbord.user-comments', compact('comments'));
    }

    public function userFavourites()
    {
        $products = auth()->user()->favouriteProducts()->get();
        return view('app.user-dashbord.user-favourites', compact('products'));
    }

    public function removeFromFavourite(Product $product)
    {
        $user = Auth::user();
        if ($user->favouriteProducts()->where('product_id', $product->id)->exists()) {
            $user->favouriteProducts()->detach($product->id);
        }

        return back()->with('success', 'محصول از لیست حذف شد');

    }

}

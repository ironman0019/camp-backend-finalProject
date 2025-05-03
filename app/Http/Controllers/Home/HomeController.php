<?php

namespace App\Http\Controllers\Home;

use App\Models\Tag;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Market\Product;
use App\Http\Controllers\Controller;
use App\Models\Market\Order;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $mostViewedProducts = Product::where('marketable', 1)->orderBy('view_count', 'desc')->take(8)->get();
        $discountProducts = Product::where('marketable', 1)->where('discount_status', 1)->take(10)->get();
        $tags = Tag::all();
        return view('index', compact('mostViewedProducts', 'discountProducts', 'tags'));
    }

    public function product(Product $product)
    {
        $product->increment('view_count');

        $comments = Comment::with('user')->where('product_id', $product->id)->where('status', 2)->get();

        $relatedProducts = Product::where('marketable', 1)->where('product_category_id', $product->product_category_id)->inRandomOrder()->take(8)->get()->except($product->id);

        return view('app.product', compact('product', 'relatedProducts', 'comments'));
    }

    public function search()
    {
        $products = Product::filter(request(['search', 'product-category', 'marketable', 'image-products', 'start-price', 'end-price', 'sort', 'tag']))->paginate(10); 
        return view('app.search', compact('products'));
    }


    public function addToFavourite(Request $request)
    {
        $request->validate([
            'product_id' => 'exists:products,id'
        ]);

        $user = Auth::user();
        if (!$user->favouriteProducts()->where('product_id', $request->input('product_id'))->exists()) {
            $user->favouriteProducts()->attach($request->input('product_id'));
        }

        return back()->with('success', 'محصول به علاقه مندی اضافه شد');
    }

    
}

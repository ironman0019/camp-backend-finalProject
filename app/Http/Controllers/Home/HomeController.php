<?php

namespace App\Http\Controllers\Home;

use App\Models\Tag;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Market\Product;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Faq;
use App\Models\Market\Order;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $mostViewedProducts = Product::where('marketable', 1)->orderBy('view_count', 'desc')->take(8)->get();
        $discountProducts = Product::where('marketable', 1)->where('discount_status', 1)->take(10)->get();
        $tags = Tag::all();
        $slideBanners = Banner::latest()->where('status', 1)->where('position', 0)->take(5)->get();
        $bottomBanners = Banner::latest()->where('status', 1)->where('position', 3)->take(4)->get();
        $bottomTopLeftBanner = Banner::where('status', 1)->where('position', 2)->first();
        $bottomTopRightBanner = Banner::where('status', 1)->where('position', 1)->first();
        return view('index', compact('mostViewedProducts', 'discountProducts', 'tags', 'slideBanners', 'bottomBanners', 'bottomTopLeftBanner', 'bottomTopRightBanner'));
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


    public function createComment(Request $request, Product $product, ?Comment $comment = null)
    {
        $inputs = $request->validate([
            'body' => 'required|string|min:2|max:255'
        ]);

        $user = Auth::user();

        if (!$comment) {
            Comment::create([
                'body' => $inputs['body'],
                'user_id' => $user->id,
                'product_id' => $product->id,
            ]);
        }
        else
        {
            Comment::create([
                'body' => $inputs['body'],
                'user_id' => $user->id,
                'product_id' => $product->id,
                'parent_id' => $comment->id
            ]);
        }


        return back()->with('success', 'کامنت ساخته و پس از تایید نمایش داده میشود');
    }

    public function faq()
    {
        $faqs = Faq::where('status', 1)->get();
        return view('app.faq', compact('faqs'));
    }

    
}

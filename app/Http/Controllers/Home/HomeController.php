<?php

namespace App\Http\Controllers\Home;

use App\Models\Tag;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Market\Product;
use App\Http\Controllers\Controller;

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

    
}

<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Market\Cart;
use App\Models\Market\CartItem;
use App\Models\Market\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
        $user = Auth::user();

        $hasPurchased = $user->orders()
            ->whereHas('orderItems', function ($query) use ($product) {
            $query->where('product_id', $product->id);
        })
        ->exists();

        if ($hasPurchased) {
            return back()->with('error', 'این محصول قبلا خریداری شده به داشبورد کاربری مراجعه کنید');
        }

        $cart = Cart::firstOrCreate(
            ['user_id' => $user->id, 'status' => 0], 
            ['total_price' => 0, 'total_discount_price' => 0, 'expired_at' => now()->addDays(7)]
        );

        $cartItem = CartItem::where('cart_id', $cart->id)->where('product_id', $product->id)->first();

        if ($cartItem) {

            return back()->with('error', 'محصول در سبد خرید وجود دارد!');

        } else {
            CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $product->id,
                'price' => $product->off_price ?? $product->price
            ]);
        }


        $this->updateCartTotalPrice($cart);

        return back()->with('success', 'محصول با موفقیت به سبد خرید اضافه شد');
    }

    private function updateCartTotalPrice($cart)
    {
        $totalPrice = $cart->cartItems()->sum('price');
        $cart->update(['total_price' =>  $totalPrice]);
    }

    public function removeFromCart($id)
    {
        $cartItem = CartItem::findOrFail($id);
        $cart = $cartItem->cart;

        $cartItem->delete();

        $this->updateCartTotalPrice($cart);

        return back()->with('success', 'محصول با موفقیت حذف شد');

    }
}

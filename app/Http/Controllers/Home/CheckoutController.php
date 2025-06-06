<?php

namespace App\Http\Controllers\Home;

use App\Models\Market\Cart;
use Illuminate\Http\Request;
use App\Models\Market\Delivery;
use App\Http\Controllers\Controller;
use App\Models\Market\Coupan;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function show(Request $request)
    {
        $user = Auth::user();
        $cart = Cart::where('user_id', $user->id)->where('status', 0)->with('cartItems.product')->first();

        if(!$cart || $cart->cartItems->isEmpty()) {
            return to_route('home');
        }

        return view('app.checkout', compact('cart','user'));
    }


    public function applyDiscount(Request $request)
    {
        $request->validate(['code' => 'required|string']);

        $user = Auth::user();
        $cart = Cart::where('user_id', $user->id)->where('status', 0)->first();

        if(!$cart) {
            return back()->with('error', 'سبد خرید یافت نشد');
        }

        $coupan = Coupan::where('code', $request->input('code'))->first();

        if(!$coupan || !$coupan->isValid()) {
            return back()->with('error', 'کد نامعتبر است');
        }

        if($coupan->amount_type == 1 && $coupan->amount > $cart->total_price) {
            return back()->with('error', 'مقدار کد تخفیف از مجموع سبد خرید بیشتر است!');
        }

        $discountAmount = $coupan->amount_type == 0 ? min(($cart->total_price * $coupan->amount / 100), $coupan->discount_ceiling) : min($coupan->amount, $cart->total_price);

        $cart->update([
            'coupan_id' => $coupan->id,
            'discount_status' => 1,
            'total_discount_price' => $discountAmount
        ]);

        return back()->with('success', 'کد تخفیف با موفقیت اعمال شد');

    }

    public function removeDiscount(Cart $cart)
    {
        if($cart->discount_status) {

            $cart->update([
                'coupan_id' => null,
                'discount_status' => 0,
                'total_discount_price' => 0
            ]);
            return back()->with('success', 'کد تخفیف از سبد خرید حذف شد');

        } else {
            return to_route('home');
        }
    }


}

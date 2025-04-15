<?php

namespace App\Http\Controllers\Home;

use App\Models\Market\Cart;
use App\Models\Market\Order;
use Illuminate\Http\Request;
use App\Mail\OrderStatusChanged;
use App\Models\Market\OrderItem;
use App\Events\OrderStatusUpdated;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Services\Sms\SmsService;

class OrderController extends Controller
{

    public function orderStore(Request $request)
    {
        $request->validate([
            'peyment_type' => 'required|in:0,2'
        ]);

        $user = Auth::user();
        $cart = Cart::where('user_id', $user->id)->where('status', 0)->with('cartItems.product')->first();

        if(!$cart || $cart->cartItems->isEmpty()) {
            return to_route('home');
        }

        // check if the user wallet have needed amount
        if($request->input('peyment_type') == 2) {
            if($user->wallet->amount < $cart->total_price - $cart->total_discount_price){
                return back()->with('error', 'مبلغ کیف پول کافی نیست!');
            }
        }

        try {

            DB::beginTransaction();

            $order = Order::create([
                'user_id' => $user->id,
                'coupan_id' => $cart->coupan_id,
                'cart_id' => $cart->id,
                'peyment_type' => $request->input('peyment_type'),
                'peyment_status' => 0,
                'order_final_amount' => $cart->total_price,
                'order_discount_amount' => $cart->total_discount_price,
                'order_total_discount_amount' => $cart->total_price - $cart->total_discount_price,
                'order_status' => 0,
            ]);

            foreach($cart->cartItems as $item) {

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product->id,
                    'product_object' => json_encode($item),
                    'price' => $item->product->price,
                ]);

            };

            $cart->update(['status' => 1]);
            DB::commit();

            // if($user->email) {
            //     Mail::to($user->email)->send(new OrderStatusChanged($order));
            // }
            // else
            // {
            //     $smsService->SendOtpSms($user->mobile, $order->order_status);
            // }

            // elegent way?
            event(new OrderStatusUpdated($order));

            return to_route('home')->with('success', 'سفارش شما ثبت شد');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Something went wrong');
        }

    }


}

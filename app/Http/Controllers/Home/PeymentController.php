<?php

namespace App\Http\Controllers\Home;

use Illuminate\Support\Str;
use App\Models\Market\Order;
use Illuminate\Http\Request;
use App\Models\Market\Peyment;
use App\Events\OrderStatusUpdated;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\User\Wallet;
use App\Models\User\WalletPeyment;

class PeymentController extends Controller
{

    public function confirmPeyment(Request $request, Order $order)
    {
        if ($order->peyment_type == 0) {
            $inputs = $request->all();
            $inputs['gateway'] = 'زرین پال';
            $inputs['transaction_id'] = random_int(10000, 99999);
            $inputs['tracking_code'] = 'PEY-' . strtoupper(Str::random(10));


            try {

                DB::beginTransaction();

                $peyment = Peyment::create([
                    'user_id' => $order->user->id,
                    'amount' => $order->order_total_discount_amount,
                    'gateway' => $inputs['gateway'],
                    'transaction_id' => $inputs['transaction_id'],
                    'tracking_code' => $inputs['tracking_code']
                ]);

                

                foreach ($order->orderItems as $orderItem) {
                    $product = $orderItem->product;
                    $product->increment('sold_number');
                }

                $order->update([
                    'peyment_id' => $peyment->id,
                    'peyment_object' => json_encode($peyment),
                    'peyment_status' => 1,
                    'order_status' => 2
                ]);
                DB::commit();

                event(new OrderStatusUpdated($order));
                return back()->with('success', 'سفارش شما پرداخت شد میتوانید محصول خود را دانلود کنید');
            } catch (\Exception $e) {
                DB::rollBack();
                return back()->with('error', 'Something went wrong');
            }

        } elseif($order->peyment_type == 2)
        {
            $wallet = Wallet::where('user_id', $order->user_id)->first();

            if($wallet->amount < $order->order_total_discount_amount) {
                return back()->with('error', 'موجودی کیف پول کافی نیست');
            }

            $wallet->update([
                'amount' => $wallet->amount - $order->order_total_discount_amount
            ]);

            $walletPeyment = WalletPeyment::create([
                'wallet_id' => $wallet->id,
                'withdraw_amount' => $order->order_total_discount_amount,
                'peyment_status' => 1,
                'status' => 1
            ]);

            $order->update([
                'peyment_status' => 1,
                'order_status' => 2
            ]);

            foreach ($order->orderItems as $orderItem) {
                $product = $orderItem->product;
                $product->increment('sold_number');
            }

            event(new OrderStatusUpdated($order));
            return back()->with('success', 'سفارش شما پرداخت شد میتوانید محصول خود را دانلود کنید');
        }
    }
}

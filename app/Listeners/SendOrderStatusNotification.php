<?php

namespace App\Listeners;

use App\Events\OrderStatusUpdated;
use App\Mail\OrderStatusChanged;
use App\Http\Services\Sms\SmsService;
use Illuminate\Support\Facades\Mail;

class SendOrderStatusNotification
{
    public function handle(OrderStatusUpdated $event)
    {
        $order = $event->order;
        $user = $order->user;

        if ($user->email) {
            Mail::to($user->email)->send(new OrderStatusChanged($order));
        } else {
            (new SmsService())->OrderStatus($user->mobile, $order->status);
        }
    }
}

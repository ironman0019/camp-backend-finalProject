<?php

namespace App\Mail;

use App\Models\Market\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderStatusChanged extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $order;
    public $statusMessage;

    public function __construct(Order $order)
    {
        $this->order = $order;
        $this->statusMessage = $this->getStatusMessage($order->order_status);
    }

    public function build()
    {
        return $this->subject('وضعیت سفارش تغییر کرده است')
                    ->view('emails.order_status_changed');
    }

    private function getStatusMessage($status)
    {
        switch ($status) {
            case 0:
                return 'سفارش شما ثبت و در انتظار پرداخت است';
            case 2:
                return 'سفارش شما پرداخت و تکمیل شد به داشبورد کاربری خود مراجعه کنید.';
            case 3:
                return 'سفارش شما لغو شد.';
            default:
                return '';
        }
    }
}
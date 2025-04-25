<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Market\Order;

class DashbordController extends Controller
{
    /**
     * Return index page
     */
    public function index()
    {
        return view('admin.index');
    }

    public function getSaleStats()
    {
        $today = (int) Order::whereDate('created_at', today())->where('peyment_status', 1)->where('order_status', 2)->sum('order_total_discount_amount');
        $thisMonth = (int) Order::whereMonth('created_at', now()->month)->where('peyment_status', 1)->where('order_status', 2)->sum('order_total_discount_amount');
        $thisYear = (int) Order::whereYear('created_at', now()->year)->where('peyment_status', 1)->where('order_status', 2)->sum('order_total_discount_amount');
        $totalSales = (int) Order::where('peyment_status', 1)->where('order_status', 2)->sum('order_total_discount_amount');

        return response()->json([
            'today' => $today,
            'thisMonth' => $thisMonth,
            'thisYear' => $thisYear,
            'total' => $totalSales,
        ]);
    }
}

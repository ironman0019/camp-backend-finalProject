<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;
use App\Http\Controllers\Controller;

class UserDashbordController extends Controller
{
    public function index()
    {
        return view('app.user-dashbord.index');
    }

    public function userInfo()
    {
        $selectedAttributes = [
            'نام کاربری' => auth()->user()->name,
            'اطلاعات تماس' => auth()->user()->email ?? auth()->user()->mobile,
            'تاریخ ثبت نام' => Jalalian::forge(auth()->user()->created_at)->format('%A, %d %B %y'),
        ];
        return view('app.user-dashbord.user-info', compact('selectedAttributes'));
    }

}

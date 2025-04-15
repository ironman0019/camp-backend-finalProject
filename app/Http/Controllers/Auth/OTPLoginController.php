<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\User\Otp;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Services\Sms\SmsService;
use App\Models\User\Wallet;

class OTPLoginController extends Controller {

    private $smsService;

    public function __construct(SmsService $smsService)
    {
        $this->smsService = $smsService;
    }

    public function sendOtp(Request $request)
    {
        $loginId = $request->input('login_id');
    
        // Validate input: must be either valid mobile or email
        $request->validate([
            'login_id' => ['required', function ($attribute, $value, $fail) {
                if (!filter_var($value, FILTER_VALIDATE_EMAIL) && !preg_match('/^09[0-9]{9}$/', $value)) {
                    $fail('ایمیل یا شماره موبایل معتبر وارد کنید.');
                }
            }],
        ]);
    
        if (preg_match('/^09[0-9]{9}$/', $loginId)) {
            // It's a mobile number
            $user = User::firstOrCreate(['mobile' => $loginId]);

            // Create wallet for user
            if(!$user->wallet) {
                Wallet::create([
                    'user_id' => $user->id
                ]);
            }
    
            $otp = Otp::where('user_id', $user->id)->latest()->first();
            if ($otp && $otp->created_at->addMinutes(2)->isFuture()) {
                return to_route('login')->with('error', 'لطفا دو دقیقه دیگر تلاش کنید');
            }
    
            Otp::where('user_id', $user->id)->delete();
    
            $otpCode = rand(1000, 9999);
            $token = Str::random(32);
    
            Otp::create([
                'token' => $token,
                'user_id' => $user->id,
                'otp_code' => $otpCode,
                'used' => 0,
                'attempts' => 0
            ]);
    
            try {
                $this->smsService->SendOtpSms($loginId, $otpCode);
                return to_route('otp.verify.form', ['token' => $token])->with('message', 'کد ارسال شد');
            } catch (\Exception $e) {
                return back()->with('error', 'خطا در ارسال کد');
            }
    
        } elseif (filter_var($loginId, FILTER_VALIDATE_EMAIL)) {
            // It's an email address
            $user = User::firstOrCreate(['email' => $loginId]);

            // Create wallet for user
            if(!$user->wallet) {
                Wallet::create([
                    'user_id' => $user->id
                ]);
            }
    
            // Generate OTP and send it via email
            $otpCode = rand(1000, 9999);
            $token = Str::random(32);
    
            Otp::where('user_id', $user->id)->delete();
    
            Otp::create([
                'token' => $token,
                'user_id' => $user->id,
                'otp_code' => $otpCode,
                'used' => 0,
                'attempts' => 0
            ]);
    
            try {
                Mail::to($loginId)->later(now()->addSeconds(10), new \App\Mail\SendOtpEmail($otpCode));
                return to_route('otp.verify.form', ['token' => $token])->with('message', 'کد به ایمیل ارسال شد');
            } catch (\Exception $e) {
                return back()->with('error', 'خطا در ارسال ایمیل: ');
            }
    
        } else {
            return back()->with('error', 'ورودی نامعتبر است.');
        }
    }
    

    public function showVerifyForm($token)
    {
        $otp = Otp::where('token', $token)->first();

        if(!$otp || $otp->used) {
            return to_route('login')->with('error', 'کد نامعتبر است');
        }

        return view('auth.verify-otp', ['token' => $token]);
    }


    public function otpVerify(Request $request)
    {
        $request->validate([
            'token' => 'required|exists:otps,token',
            'otp' => 'required|digits:4'
        ]);

        $otp = Otp::where('token', $request->input('token'))->first();


        if(!$otp || $otp->used) {
            return to_route('login')->with('error', 'کد نامعتبر است');
        }

        if($otp->attempts >= 3 ) {
            return to_route('login')->with('error', 'تعداد تلاش بیشتر از حد مجاز است');
        }

        if($otp->otp_code != $request->input('otp')) {
            $otp->increment('attempts');
            return back()->with('error', 'کد وارد شده اشتباه است');
        }

        $otp->update(['used' => 1]);

        $user = $otp->user;
        Auth::login($user);

        return redirect()->intended('/');

    }



}
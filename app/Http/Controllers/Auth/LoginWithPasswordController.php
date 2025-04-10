<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginWithPasswordController extends Controller {

    public function index()
    {
        return view('auth.login-with-password');
    }

    public function auth(Request $request)
    {
        $formFields = $request->validate([
            'login_id' => 'required',
            'password' => 'required',
        ]);
    
        // Determine whether login_id is email or mobile
        $fieldType = filter_var($formFields['login_id'], FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';
    
        if (auth()->attempt([
            $fieldType => $formFields['login_id'],
            'password' => $formFields['password']
        ])) {
            $request->session()->regenerate();
            return redirect('/')->with('message', 'وارد شدید');
        }
    
        return back()->withErrors([
            'login_id' => 'رمز عبور یا نام کاربری غلط است',
        ])->onlyInput('login_id');
    }



}
@extends('auth.layouts.master')

@section('title', 'ثبت نام | ورود')

@section('content')

    <section class="vh-100 d-flex justify-content-center align-items-center pb-5" style="background-color: #4158D0; background-image: linear-gradient(43deg, #4158D0 0%, #C850C0 46%, #FFCC70 100%);">
        <section class="login-wrapper mb-5">
            <section class="login-logo">
                <h1>LOGO</h1>
            </section>
            <section class="login-title">ورود / ثبت نام</section>
            <form action="{{ route('otp.send') }}" method="POST">
                @csrf
                <section class="login-input-text">
                    <label class="login-info">شماره موبایل یا پست الکترونیک خود را وارد کنید</label>
                    <input type="text" class="form-control" name="login_id">
                    @error('login_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </section>
                <section class="login-btn d-grid g-2"><button class="btn btn-danger" type="submit">ورود به آمازون</button></section>
            </form>
            <section class="login-terms-and-conditions"><a href="{{ route('login.with.password') }}">ورود</a> با رمز عبور</section>
            @if (session('error'))
                <section class="alert alert-danger">
                    {{ session('error') }}
                </section>
            @endif
        </section>
    </section>

@endsection

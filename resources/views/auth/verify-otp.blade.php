@extends('auth.layouts.master')

@section('title', 'تایید کد')

@section('content')

    <section class="vh-100 d-flex justify-content-center align-items-center pb-5" style="background-color: #4158D0; background-image: linear-gradient(43deg, #4158D0 0%, #C850C0 46%, #FFCC70 100%);">
        <section class="login-wrapper mb-5">
            <section class="login-logo">
                <h1>LOGO</h1>
            </section>
            <section class="login-title">تایید کد</section>
            <form action="{{ route('otp.verify') }}" method="POST">
                @csrf
                <section class="login-input-text">
                    <label class="login-info">کد ارسال شده به شماره موبایل یا ایمیل را وارد کنید</label>
                    <input type="hidden" name="token" value="{{ $token }}">
                    <input type="text" class="form-control" name="otp">
                    @error('otp')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </section>
                <section class="login-btn d-grid g-2"><button class="btn btn-danger" type="submit">تایید</button></section>
            </form>
            @if (session('error'))
                <section class="alert alert-danger">
                    {{ session('error') }}
                </section>
            @endif
            @if (session('message'))
            <section class="alert alert-success">
                {{ session('message') }}
            </section>
            @endif
        </section>
    </section>

@endsection
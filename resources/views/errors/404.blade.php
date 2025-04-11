@extends('app.layouts.master')


@section('title', 'داشبورد کاربر')

@section('content')


    <main class="main">
        <div class="page404">
            <!-- bg-->
            <div class="page404-box">
                <div class="page404-box-text">
                    <div class="nt-flex-center-center text-primary animate__animated animate__zoomInUp animate__slower">
                        <span>۴</span><span
                            class="animate__animated animate__bounce animate__delay-2s">۰</span><span>۴</span></div>
                </div>
                <div class="page404-box-img"><img src="{{ asset('assets/img/pages/404/box.png') }}" width="300" /></div>
            </div>
            <div class="nt-flex-column-center-center gap-4 py-5">
                <h1 class="fs-1 nt-fw-light">ما نتوانستیم آن صفحه را پیدا کنیم</h1>
                <div class="fs-5 nt-flex-center-center gap-3">جستجو کنید یا به<a class="btn btn-light rounded-pill"
                        href="{{ route('home') }}"><i class="ti ti-home"></i>صفحه اصلی</a>بروید</div>
            </div>
        </div>
    </main>


@endsection

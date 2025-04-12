@extends('app.layouts.master')

@section('title', 'پرداخت')

@section('styles')
@parent
<link rel="stylesheet" href="{{ asset('assets/css/checkout.css') }}">
@endsection


@section('content')

<!-- start checkout -->
<section class="checkout-section py-4">
    <div class="container-xxl">
        <div class="row">
            <div class="col">
                <!-- page header -->
                <div class="checkout-header d-flex justify-content-between align-items-center mb-3">
                    <h2 class="checkout-title">انتخاب نوع پرداخت</h2>
                </div>

                <div class="row">
                    <!-- left content -->
                    <div class="col-md-9">
                        <!-- discount box -->
                        <div class="checkout-box bg-white p-3 rounded mb-4">
                            <div class="box-header d-flex justify-content-between align-items-center mb-2">
                                <h5 class="box-title">کد تخفیف</h5>
                            </div>

                            @if(session('error'))
                                <p class="alert alert-danger">{{ session('error') }}</p>
                            @endif

                            @if(true)
                                <div class="alert alert-success">
                                    <p>کد تخفیف اعمال شد - {{ 'hi' }}</p>
                                </div>
                            @else
                                <div class="alert alert-primary d-flex align-items-center p-2">
                                    <i class="fa fa-info-circle me-2"></i>
                                    <span>کد تخفیف خود را در این بخش وارد کنید.</span>
                                </div>

                                <form action="#" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="input-group input-group-sm">
                                                <input type="text" class="form-control" name="code" placeholder="کد تخفیف را وارد کنید">
                                                <button type="submit" class="btn btn-primary">اعمال کد</button>
                                            </div>
                                            @error('code')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </form>
                            @endif
                        </div>

                        <!-- shipping method -->
                        <form action="#" method="post">
                            @csrf
                            <div class="checkout-box bg-white p-3 rounded mb-4">
                                <div class="box-header d-flex justify-content-between align-items-center mb-2">
                                    <h5 class="box-title">انتخاب روش ارسال</h5>
                                </div>

                                <div class="delivery-options row">
                                    
                                        <input type="radio" name="delivery_type" value="" id="delivery_">
                                        <label for="delivery_" class="delivery-card col-md-4 p-2 mb-2 border rounded">
                                            <div class="mb-1">
                                                <i class="fa fa-calendar-alt me-1"></i>
                                                {{ 'aefafe' }} | {{ 'afafadfw' }} {{ 'awfafwawfd' }}
                                            </div>
                                            <div>
                                                <i class="fa fa-credit-card me-1"></i>
                                                {{ 651235612 }} تومان
                                            </div>
                                        </label>
                                    
                                </div>
                            </div>

                            <!-- address selection -->
                            <div class="checkout-box bg-white p-3 rounded mb-4">
                                <div class="box-header d-flex justify-content-between align-items-center mb-2">
                                    <h5 class="box-title">انتخاب آدرس</h5>
                                </div>

                                <div class="address-options row">
                                    
                                        <input type="radio" name="address_id" value="" id="address_">
                                        <label for="address_" class="address-card col-md-4 p-2 mb-2 border rounded">
                                            <div class="mb-1">
                                                <i class="fa fa-map-marker-alt me-1"></i>
                                                {{ 'HI' }} - {{ 'no'}}: {{ 'LOrem oajfionsfekm;sefsfe' }}
                                            </div>
                                            <div>
                                                <i class="fa fa-mail-bulk me-1"></i>
                                                کد پستی: {{ 65312365132 }}
                                            </div>
                                        </label>
                                        @error('address_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    
                                </div>
                            </div>
                    </div>

                    <!-- right summary -->
                    <div class="col-md-3">
                        <div class="checkout-summary bg-white p-3 rounded">
                            <div class="d-flex justify-content-between">
                                <span class="text-muted">قیمت کالاها ({{ 48484848 }})</span>
                                <span class="text-muted">{{ number_format(561654654654) }} تومان</span>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <span class="text-muted">تخفیف کالاها</span>
                                <span class="text-danger fw-bold">{{ number_format(5315655656) }} تومان</span>
                            </div>

                            <p class="mt-3 small">
                                <i class="fa fa-info-circle me-1"></i>
                                کالاها بر اساس نوع ارسالی که انتخاب می‌کنید در زمان تعیین شده ارسال خواهند شد.
                            </p>

                            <hr class="my-3">

                            <div class="d-flex justify-content-between">
                                <strong>مبلغ قابل پرداخت</strong>
                                <strong>{{ number_format(516654654654) }} تومان</strong>
                            </div>

                            <div class="mt-4">
                                <button type="submit" class="btn btn-danger w-100" id="final-level">ثبت سفارش</button>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end checkout -->



@endsection

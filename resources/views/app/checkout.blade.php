@extends('app.layouts.master')

@section('title', 'پرداخت')

@section('styles')
@parent
<link rel="stylesheet" href="{{ asset('assets/css/checkout.css') }}">
<style>
    .radio-card {
  display: block;
  border: 2px solid #dee2e6;
  border-radius: 10px;
  padding: 1rem;
  text-align: left;
  cursor: pointer;
  transition: all 0.3s ease;
}

.btn-check:checked + .radio-card {
  border-color: #0d6efd; /* Bootstrap primary blue */
  background-color: #e7f1ff;
  box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
}

</style>
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

                            @if($cart->discount_status)
                                <section class="alert alert-success">
                                    <p>کد تخفیف اعمال شد - {{ $cart->coupan->code }}</p>
                                </section>
                            @else
                                <div class="alert alert-primary d-flex align-items-center p-2">
                                    <i class="fa fa-info-circle me-2"></i>
                                    <span>کد تخفیف خود را در این بخش وارد کنید.</span>
                                </div>

                                <form action="{{ route('checkout.apply-discount') }}" method="post">
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

                        <!-- peyment method -->
                        <form action="{{ route('order.store') }}" method="post">
                            @csrf
                            <div class="container py-4">
                                <div class="row g-3">

                                  <div class="col-md-4">
                                    <input type="radio" class="btn-check" name="peyment_type" value="0" id="plan1" autocomplete="off">
                                    <label class="radio-card" for="plan1">
                                      <h5 class="mb-1">آنلاین</h5>
                                      <p class="mb-0 text-muted">درگاه پرداخت زرین پال</p>
                                    </label>
                                  </div>

                                  <div class="col-md-4">
                                    <input type="radio" class="btn-check" name="peyment_type" value="2" id="plan2" autocomplete="off">
                                    <label class="radio-card" for="plan2">
                                      <h5 class="mb-1">کیف پول کاربر</h5>
                                      <p class="mb-0 text-muted">موجودی: {{ number_format(auth()->user()->wallet->amount) }}</p>
                                    </label>
                                  </div>

                                </div>
                                @error('peyment_type')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                    </div>

                    <!-- right summary -->
                    <div class="col-md-3">
                        <div class="checkout-summary bg-white p-3 rounded">
                            <div class="d-flex justify-content-between">
                                <span class="text-muted">قیمت کالاها ({{ $cart->cartItems->count() }})</span>
                                <span class="text-muted">{{ number_format($cart->total_price)  }} تومان</span>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <span class="text-muted">تخفیف کالاها</span>
                                <span class="text-danger fw-bold">{{ number_format($cart->total_discount_price) }} تومان</span>
                            </div>

                            <p class="mt-3 small">
                                <i class="fa fa-info-circle me-1"></i>
                                پس از پرداخت لینک دانلود فایل ها در داشبورد کاربر برای شما فعال میشود
                            </p>

                            <hr class="my-3">

                            <div class="d-flex justify-content-between">
                                <strong>مبلغ قابل پرداخت</strong>
                                <strong>{{ number_format($cart->total_price - $cart->total_discount_price) }} تومان</strong>
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

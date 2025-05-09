@extends('app.layouts.master')


@section('title', 'جزئیات سفارش کاربر')

@section('content')

    <main class="main">
        @include('app.user-dashbord.partials.dashbord-sidebar-ofcanvas')
        <div class="profile">
            <div class="container py-5">
                <div class="row g-4">
                    @include('app.user-dashbord.partials.dashbord-sidebar')
                    <div class="col-12 col-md-9">
                        <!-- content-->
                        <div class="border rounded bg-body">
                            <!-- title & back button-->
                            <div class="sticky-top bg-body p-5 border-bottom">
                                <div class="nt-flex-start-center gap-4"><a class="btn btn-light" href="{{ route('user.dashbord.user-orders') }}"> <i
                                            class="ti ti-arrow-narrow-right fs-3"></i>بازگشت به سفارش‌ ها</a>
                                    <div class="fs-4 nt-fw-bold">جزئیات سفارش</div>
                                </div>
                            </div>
                            <div class="border-bottom">
                                <div class="nt-flex-start-center gap-4 px-5 py-4 border-bottom">
                                    <div class="nt-flex">
                                        <div class="text-body-secondary">کد پیگیری سفارش</div>
                                        <div class="nt-fw-bold">{{ $order->tracking_code }}</div>
                                    </div>
                                    <div class="nt-flex">
                                        <div class="text-body-secondary">تاریخ ثبت سفارش</div>
                                        <div class="nt-fw-bold">{{ \Morilog\Jalali\Jalalian::forge($order->created_at)->format('%A, %d %B %y') }}</div>
                                    </div>
                                </div>
                                <div class="nt-flex-column px-5 py-4">
                                    <div class="nt-flex-start-center gap-4 mb-3">
                                        <div class="nt-flex">
                                            <div class="text-body-secondary">سفارش دهنده</div>
                                            <div class="nt-fw-bold">{{ $order->user->name }}</div>
                                        </div>
                                        <div class="nt-flex">
                                            <div class="text-body-secondary">اطلاعات تماس</div>
                                            <div class="nt-fw-bold">{{ $order->user->mobile ? $order->user->mobile : $order->user->email }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="border-bottom">
                                <div class="nt-flex-column px-5 py-4">
                                    <div class="nt-flex-start-center gap-4 mb-3">
                                        <div class="nt-flex">
                                            <div class="text-body-secondary">مبلغ</div>
                                            <div class="nt-flex-start-center">
                                                <div class="nt-fw-bold">{{ number_format($order->order_total_discount_amount) }}</div>
                                                <div class="nt-fw-bold">تومان</div>
                                            </div>
                                        </div>
                                        <div class="badge bg-light-subtle nt-flex-start-center"><i
                                                class="ti ti-world-check fs-5 text-success"></i>
                                            <div class="text-body-secondary">
                                                @if($order->peyment_type == 0)
                                                پرداخت اینترنتی
                                                @elseif($order->peyment_type == 2)
                                                پرداخت از کیف پول
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @if($order->peyment_status == 1)
                                    <a class="nt-collapse collapsed" data-bs-toggle="collapse"
                                        href="#collapseOrdersDetail" role="button" aria-expanded="false"
                                        aria-controls="collapseOrdersDetail" data-textcollapsed="تاریخچه تراکنش‌ها"
                                        data-text="تاریخچه تراکنش‌ها" data-nt-collapse-reverse="true"></a>
                                    <div class="collapse" id="collapseOrdersDetail">
                                        <div class="nt-flex-between-center gap-4 border rounded p-3">
                                            <div class="nt-flex-start-center"><i
                                                    class="ti ti-circle-check-filled fs-5 text-success"></i>
                                                <div class="text-body-secondary">مبلغ سفارش - پرداخت موفق</div>
                                            </div>
                                            <div class="nt-flex-start-center gap-4">
                                                <div class="nt-fw-500">{{ \Morilog\Jalali\Jalalian::forge($order->peyment->created_at)->format('%A, %d %B %y') }}</div>
                                                <div class="nt-fw-500">{{ $order->peyment->amount }} تومان</div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <!---->
                            <div class="rounded bg-body">
                                <div class="p-5">
                                    <div class="row align-items-center">
                                        <div class="col-12 col-md-6">
                                            <div class="nt-flex-start-center gap-4">
                                                <div class="text-body-secondary nt-fw-bold">تعداد محصولات سفارش: {{ $order->orderItems->count() }}</div>
                                            </div>
                                        </div>
                                        <!-- desktop progress-->
                                        <div class="col-12 col-md-6 d-none d-md-block">
                                            <div class="nt-flex-between-center small">
                                                <div class="nt-fw-bold text-success">
                                                    @if($order->order_status == 0)
                                                    منتظر پرداخت
                                                    @elseif($order->order_status == 2)
                                                    پرداخت شده
                                                    @elseif($order->order_status == 3)
                                                    لغو شده
                                                    @endif
                                                </div>
                                                <div class="nt-flex-start-center">
                                                    <div class="text-body-secondary">مرحله بعد:</div>
                                                    <div class="nt-fw-bold">
                                                        @if($order->order_status == 0)
                                                        پرداخت
                                                        @elseif($order->order_status == 2)
                                                        دانلود فایل
                                                        @elseif($order->order_status == 3)
                                                        ثبت سفارش از نو
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <hr />
                                        </div>
                                        <!-- desktop progress-->
                                        <div class="d-none d-md-block col-12 col-md-6">
                                            <div class="progress" role="progressbar" aria-label="Success striped example"
                                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                <div class="progress-bar progress-bar-animated progress-bar-striped @if($order->order_status == 3){{'bg-danger'}}@else{{'bg-success'}}@endif"
                                                    style="width:
                                                    @if($order->order_status == 0)
                                                        50%
                                                    @elseif($order->order_status == 2 || $order->order_status == 3)
                                                        100%
                                                    @endif;"></div>
                                            </div>
                                        </div>
                                        <!-- divider-->
                                        <div class="col-12">
                                            <div class="py-3"></div>
                                        </div>
                                        <!-- mobile progress-->
                                        <div class="d-md-none col-12 col-md-6">
                                            <div class="nt-flex-between-center gap-4 small">
                                                <div class="nt-fw-bold text-success">
                                                    @if($order->order_status == 0)
                                                    منتظر پرداخت
                                                    @elseif($order->order_status == 2)
                                                    پرداخت شده
                                                    @elseif($order->order_status == 3)
                                                    لغو شده
                                                    @endif
                                                </div>
                                                <div class="nt-flex-start-center gap-4">
                                                    <div class="text-body-secondary">مرحله بعد:</div>
                                                    <div class="nt-fw-bold">
                                                        @if($order->order_status == 0)
                                                        پرداخت
                                                        @elseif($order->order_status == 2)
                                                        دانلود فایل
                                                        @elseif($order->order_status == 3)
                                                        ثبت سفارش از نو
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="py-4">
                                                <div class="progress" role="progressbar"
                                                    aria-label="Success striped example" aria-valuenow="25"
                                                    aria-valuemin="0" aria-valuemax="100">
                                                    <div class="progress-bar progress-bar-animated progress-bar-striped @if($order->order_status == 3){{'bg-danger'}}@else{{'bg-success'}}@endif"
                                                        style="width:
                                                        @if($order->order_status == 0)
                                                            50%
                                                        @elseif($order->order_status == 2 || $order->order_status == 3)
                                                            100%
                                                        @endif;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- lists-->
                                <section class="px-5 mb-5">
                                    <!-- cart list-->
                                    <ul class="list-group cart">
                                        <!-- cart item-->
                                        @foreach($order->orderItems as $orderItem)
                                        <li class="list-group-item cart-item">
                                            <div class="cart-item-side"><img class="img-fluid rounded"
                                                    src="{{ $orderItem->product->image }}" alt="" /></div>
                                            <div class="cart-item-content">
                                                <div class="cart-item-title">{{ $orderItem->product->name }}</div>
                                                <ul class="list-group list-group-flush cart-item-list">
                                                    <li class="list-group-item"><i
                                                            class="ti ti-circle-filled border rounded-pill fs-5"
                                                            style="color: #6c03ce"></i>تعداد فروش: {{ $orderItem->product->sold_number }}</li>
                                                    <li class="list-group-item"><i
                                                            class="ti ti-shield fs-5 text-dark"></i>سرویس ویژه نتـیفای: 7
                                                        روز تضمین بازگشت کالا</li>
                                                </ul>
                                                <div class="cart-item-price">
                                                    <div class="cart-item-priceTag">{{ number_format($orderItem->product->price) }}</div>
                                                    <div class="cart-item-priceToman">تومان</div>
                                                </div>
                                                @if($order->order_status == 2 && $order->peyment_status == 1)
                                                <div class="card-footer bg-transparent border-0">
                                                    <a href="{{ route('download-file.index', [$orderItem->product, $order]) }}" class="btn btn-primary w-100">
                                                        دانلود
                                                    </a>
                                                </div>
                                                @endif
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>



@endsection

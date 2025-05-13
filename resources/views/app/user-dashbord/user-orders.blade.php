@extends('app.layouts.master')


@section('title', 'سفارشات کاربر')

@section('content')

    <main class="main">
        @include('app.user-dashbord.partials.dashbord-sidebar-ofcanvas')
        <div class="profile">
            <div class="container py-5">
                <div class="row g-4">
                    @include('app.user-dashbord.partials.dashbord-sidebar')
                    <div class="col-12 col-md-9">
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                         @if(session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                        <!-- content-->
                        <div class="border rounded bg-body">
                            <!-- heading-->
                            <div class="nt-flex-start-center p-5"><i class="ti ti-shopping-bag fs-3"></i>
                                <div class="nt-fw-500 fs-4">تاریخچه سفارشات</div>
                            </div>
                            <!-- tabs-->
                            <ul class="nav nav-tabs lists-nav" id="userOrders" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link lists-link active" id="userOrders-current-tab"
                                        data-bs-toggle="tab" data-bs-target="#userOrders-current-tab-pane" type="button"
                                        role="tab" aria-controls="userOrders-current-tab-pane"
                                        aria-selected="true">جاری</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link lists-link" id="userOrders-delivered-tab"
                                        data-bs-toggle="tab" data-bs-target="#userOrders-delivered-tab-pane"
                                        type="button" role="tab" aria-controls="userOrders-delivered-tab-pane"
                                        aria-selected="false">پرداخت شده</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link lists-link" id="userOrders-canceled-tab" data-bs-toggle="tab"
                                        data-bs-target="#userOrders-canceled-tab-pane" type="button" role="tab"
                                        aria-controls="userOrders-canceled-tab-pane" aria-selected="false">لغو
                                        شده</button>
                                </li>
                            </ul>
                            <!-- tabs content-->
                            <div class="tab-content" id="userOrdersContent">
                                <!-- Current tab-->
                                <div class="tab-pane fade p-5 show active" id="userOrders-current-tab-pane"
                                    role="tabpanel" aria-labelledby="userOrders-current-tab" tabindex="0">
                                    <!-- lists-->
                                    <div class="nt-flex-column-start-stretch gap-4">
                                        <!-- item-->
                                        @foreach($pendingOrders as $pendingOrder)
                                        <div class="card p-3">
                                            <div class="card-header bg-transparent border-0 py-4">
                                                <div class="nt-flex-between-center">
                                                    <div class="nt-flex-start-center gap-3"><i
                                                            class="ti ti-dots-circle-horizontal text-success fs-3"></i>
                                                        <div class="nt-fw-bold">منتظر پرداخت</div>
                                                    </div><a class="stretched-link" href="{{ route('user.dashbord.user-orders-detail', $pendingOrder) }}"> <i
                                                            class="ti ti-chevron-left fs-5 text-body-secondary"></i></a>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="nt-flex-start-center mb-4">
                                                    <div
                                                        class="nt-flex-start-center rounded-pill py-2 px-3 bg-light-subtle text-body-emphasis">
                                                        <i class="ti ti-calendar-month fs-5"></i>{{ \Morilog\Jalali\Jalalian::forge($pendingOrder->created_at)->format('%A, %d %B %y') }}</div>
                                                    <div
                                                        class="nt-flex-start-center rounded-pill py-2 px-3 bg-light-subtle text-body-emphasis">
                                                        <i class="ti ti-grid-3x3 fs-5"></i>
                                                        <div class="text-body-secondary">کد سفارش</div>
                                                        <div class="text-body-emphasis">{{ $pendingOrder->tracking_code }}</div>
                                                    </div>
                                                    <div
                                                        class="nt-flex-start-center rounded-pill py-2 px-3 bg-light-subtle text-body-emphasis">
                                                        <i class="ti ti-cash fs-5"></i>
                                                        <div class="text-body-secondary">مبلغ</div>
                                                        <div class="text-body-emphasis">
                                                            {{ number_format($pendingOrder->order_final_amount) }}
                                                            تومان
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="nt-flex-start-center rounded-pill py-2 px-3 bg-light-subtle text-body-emphasis">
                                                        <i class="ti ti-cash-off fs-5"></i>
                                                        <div class="text-body-secondary">تخفیف</div>
                                                        <div class="text-body-emphasis">
                                                            {{ number_format($pendingOrder->order_discount_amount) }}
                                                            تومان
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row align-items-center">
                                                    <div class="col-12 col-md-6">
                                                        <div class="nt-flex-start-center gap-4">
                                                            <div class="text-body-secondary nt-fw-bold">تعداد محصولات سفارش: {{ $pendingOrder->orderItems->count() }}</div>
                                                        </div>
                                                    </div>
                                                    <!-- desktop progress-->
                                                    <div class="col-12 col-md-6 d-none d-md-block">
                                                        <div class="nt-flex-between-center small">
                                                            <div class="nt-fw-bold text-success">منتظر پرداخت</div>
                                                            <div class="nt-flex-start-center">
                                                                <div class="text-body-secondary">مرحله بعد:</div>
                                                                <div class="nt-fw-bold">پرداخت و تحویل</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <hr />
                                                    </div>
                                                    <!-- desktop progress-->
                                                    <div class="d-none d-md-block col-12 col-md-6">
                                                        <div class="progress" role="progressbar"
                                                            aria-label="Success striped example" aria-valuenow="25"
                                                            aria-valuemin="0" aria-valuemax="100">
                                                            <div class="progress-bar progress-bar-animated progress-bar-striped bg-success"
                                                                style="width: 50%"></div>
                                                        </div>
                                                    </div>
                                                    <!-- mobile progress-->
                                                    <div class="d-md-none col-12 col-md-6">
                                                        <div class="nt-flex-between-center gap-4 small">
                                                            <div class="nt-fw-bold text-success">منتظر پرداخت</div>
                                                            <div class="nt-flex-start-center gap-4">
                                                                <div class="text-body-secondary">مرحله بعد:</div>
                                                                <div class="nt-fw-bold">پرداخت و تحویل</div>
                                                            </div>
                                                        </div>
                                                        <div class="py-4">
                                                            <div class="progress" role="progressbar"
                                                                aria-label="Success striped example" aria-valuenow="25"
                                                                aria-valuemin="0" aria-valuemax="100">
                                                                <div class="progress-bar progress-bar-animated progress-bar-striped bg-success"
                                                                    style="width: 50%"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @foreach($pendingOrder->orderItems as $orderItem)
                                            <div class="nt-flex-start-center mb-4 bg-transparent border-0">
                                                <div class="nt-flex-start-center">
                                                    <img
                                                    src="{{ $orderItem->product->image }}" alt="{{ $orderItem->product->name }}"
                                                    width="100"/>
                                                </div>
                                            </div>
                                            @endforeach

                                        </div>
                                        <div class="card-footer bg-transparent border-0">
                                            <form action="{{ route('peyment.store', $pendingOrder) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-primary w-100">
                                                    پرداخت سفارش
                                                </button>
                                            </form>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <!-- paid -->
                                <div class="tab-pane fade p-5" id="userOrders-delivered-tab-pane" role="tabpanel"
                                    aria-labelledby="userOrders-delivered-tab" tabindex="0">
                                    <!-- lists-->
                                    <div class="nt-flex-column-start-stretch gap-4">
                                        <!-- item-->
                                        @foreach($paidOrders as $paidOrder)
                                        <div class="card p-3">
                                            <div class="card-header bg-transparent border-0 py-4">
                                                <div class="nt-flex-between-center">
                                                    <div class="nt-flex-start-center gap-3"><i
                                                            class="ti ti-circle-check-filled text-body-emphasis fs-3"></i>
                                                        <div class="nt-fw-bold">پرداخت شده</div>
                                                    </div><a class="stretched-link" href="{{ route('user.dashbord.user-orders-detail', $paidOrder) }}"> <i
                                                            class="ti ti-chevron-left fs-5 text-body-secondary"></i></a>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="nt-flex-start-center mb-4">
                                                    <div
                                                        class="nt-flex-start-center rounded-pill py-2 px-3 bg-light-subtle text-body-emphasis">
                                                        <i class="ti ti-calendar-month fs-5"></i>{{ \Morilog\Jalali\Jalalian::forge($paidOrder->created_at)->format('%A, %d %B %y') }}</div>
                                                    <div
                                                        class="nt-flex-start-center rounded-pill py-2 px-3 bg-light-subtle text-body-emphasis">
                                                        <i class="ti ti-grid-3x3 fs-5"></i>
                                                        <div class="text-body-secondary">کد سفارش</div>
                                                        <div class="text-body-emphasis">{{ $paidOrder->tracking_code }}</div>
                                                    </div>
                                                    <div
                                                        class="nt-flex-start-center rounded-pill py-2 px-3 bg-light-subtle text-body-emphasis">
                                                        <i class="ti ti-cash fs-5"></i>
                                                        <div class="text-body-secondary">مبلغ</div>
                                                        <div class="text-body-emphasis">
                                                            {{ number_format($paidOrder->order_final_amount) }}
                                                            تومان
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="nt-flex-start-center rounded-pill py-2 px-3 bg-light-subtle text-body-emphasis">
                                                        <i class="ti ti-cash-off fs-5"></i>
                                                        <div class="text-body-secondary">تخفیف</div>
                                                        <div class="text-body-emphasis">
                                                            {{ number_format($paidOrder->order_discount_amount) }}
                                                            تومان
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @foreach($paidOrder->orderItems as $orderItem)
                                            <div class="card-footer bg-transparent border-0"><img
                                                    src="{{ $orderItem->product->image }}" alt="{{ $orderItem->product->name }}"
                                                    width="100" />
                                            </div>
                                            @endforeach
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <!-- Failed -->
                                <div class="tab-pane fade p-5" id="userOrders-canceled-tab-pane" role="tabpanel"
                                    aria-labelledby="userOrders-canceled-tab" tabindex="0">
                                    <!-- lists-->
                                    <div class="nt-flex-column-start-stretch gap-4">
                                        <!-- item-->
                                        @foreach($failedOrders as $failedOrder)
                                        <div class="card p-3">
                                            <div class="card-header bg-transparent border-0 py-4">
                                                <div class="nt-flex-between-center">
                                                    <div class="nt-flex-start-center gap-3"><i
                                                            class="ti ti-circle-x-filled text-body-tertiary fs-3"></i>
                                                        <div class="nt-fw-bold">سفارشات لغو شده</div>
                                                    </div><a class="stretched-link" href="{{ route('user.dashbord.user-orders-detail', $failedOrder) }}"> <i
                                                            class="ti ti-chevron-left fs-5 text-body-secondary"></i></a>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="nt-flex-start-center mb-4">
                                                    <div
                                                        class="nt-flex-start-center rounded-pill py-2 px-3 bg-light-subtle text-body-emphasis">
                                                        <i class="ti ti-calendar-month fs-5"></i>{{ \Morilog\Jalali\Jalalian::forge($failedOrder->created_at)->format('%A, %d %B %y')  }}</div>
                                                    <div
                                                        class="nt-flex-start-center rounded-pill py-2 px-3 bg-light-subtle text-body-emphasis">
                                                        <i class="ti ti-grid-3x3 fs-5"></i>
                                                        <div class="text-body-secondary">کد سفارش</div>
                                                        <div class="text-body-emphasis">{{ $failedOrder->tracking_code }}</div>
                                                    </div>
                                                    <div
                                                        class="nt-flex-start-center rounded-pill py-2 px-3 bg-light-subtle text-body-emphasis">
                                                        <i class="ti ti-cash fs-5"></i>
                                                        <div class="text-body-secondary">مبلغ</div>
                                                        <div class="text-body-emphasis">
                                                            {{ number_format($failedOrder->order_final_amount) }}
                                                            تومان
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="nt-flex-start-center rounded-pill py-2 px-3 bg-light-subtle text-body-emphasis">
                                                        <i class="ti ti-cash-off fs-5"></i>
                                                        <div class="text-body-secondary">تخفیف</div>
                                                        <div class="text-body-emphasis">
                                                            {{ number_format($failedOrder->order_discount_amount) }}
                                                            تومان
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @foreach($failedOrder->orderItems as $orderItem)
                                            <div class="card-footer bg-transparent border-0"><img
                                                    src="{{ $orderItem->product->image }}" alt="{{ $orderItem->product->name }}"
                                                    width="100" />
                                            </div>
                                            @endforeach
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>



@endsection

@section('scripts')
@parent
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const hash = window.location.hash;
        if (hash) {
            const triggerEl = document.querySelector(`button[data-bs-target="${hash}-pane"]`);
            if (triggerEl) {
                const tab = new bootstrap.Tab(triggerEl);
                tab.show();
            }
        }
    });
</script>
@endsection

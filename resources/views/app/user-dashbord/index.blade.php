@extends('app.layouts.master')


@section('title', 'داشبورد کاربر')

@section('content')



    <main class="main">
        @include('app.user-dashbord.partials.dashbord-sidebar-ofcanvas')
        <div class="profile">
            <div class="container py-5">
                <div class="row g-4 py-5">
                    @include('app.user-dashbord.partials.dashbord-sidebar')
                    <div class="col-12 col-md-9 nt-flex-column gap-3">
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                         @if(session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                        <!-- summary-->
                        <div class="w-100 bg-body border rounded p-5">
                            <!-- header-->
                            <div class="nt-flex-between-center mb-5">
                                <div class="nt-flex-start-center"><i class="ti ti-shopping-bag fs-3"></i>
                                    <div class="fs-4 nt-fw-500">سفارش های من</div>
                                </div><a class="icon-link" href="{{ route('user.dashbord.user-orders') }}">مشاهده همه<i
                                        class="ti ti-chevron-left"></i></a>
                            </div>
                            <!-- items-->
                            <div class="row">
                                <div class="col-12 col-md-4"><a class="link-body-emphasis nt-flex-start-center gap-4"
                                        href="/user/dashbord/user-orders#userOrders-current-tab-pane"><img src="{{ asset('assets/img/pages/user-profile/packages/package-pen.png') }}"
                                            alt="" width="75" />
                                        <div class="nt-flex-column">
                                            <div class="nt-flex-start-center gap-3 nt-fw-500">
                                                <div class="nt-fw-bolder">{{ $orders->where('order_status', 0)->count() }}</div>
                                                <div class="fs-6">سفارش</div>
                                            </div>
                                            <div class="border-bottom border-2 border-warning py-2 nt-fw-500 text-warning">
                                                جاری</div>
                                        </div>
                                    </a></div>
                                <div class="col-12 col-md-4"><a class="link-body-emphasis nt-flex-start-center gap-4"
                                        href="/user/dashbord/user-orders#userOrders-delivered-tab"><img src="{{ asset('assets/img/pages/user-profile/packages/package-check.png') }}"
                                            alt="" width="75" />
                                        <div class="nt-flex-column">
                                            <div class="nt-flex-start-center gap-3 nt-fw-500">
                                                <div class="nt-fw-bolder">{{ $orders->where('order_status', 2)->count() }}</div>
                                                <div class="fs-6">سفارش</div>
                                            </div>
                                            <div class="border-bottom border-2 border-success py-2 nt-fw-500 text-success">
                                                پرداخت شده</div>
                                        </div>
                                    </a></div>
                                <div class="col-12 col-md-4"><a class="link-body-emphasis nt-flex-start-center gap-4"
                                        href="/user/dashbord/user-orders#userOrders-canceled-tab"><img src="{{ asset('assets/img/pages/user-profile/packages/package-minus.png') }}"
                                            alt="" width="75" />
                                        <div class="nt-flex-column">
                                            <div class="nt-flex-start-center gap-3 nt-fw-500">
                                                <div class="nt-fw-bolder">{{ $orders->where('order_status', 3)->count() }}</div>
                                                <div class="fs-6">سفارش</div>
                                            </div>
                                            <div class="border-bottom border-2 border-danger py-2 nt-fw-500 text-danger">
                                                نا موفق</div>
                                        </div>
                                    </a></div>
                            </div>
                        </div>
                        <!-- your list-->
                        <div class="w-100 bg-body border rounded p-5">
                            <!-- header-->
                            <div class="nt-flex-between-center mb-5">
                                <div class="nt-flex-start-center"><i class="ti ti-heart fs-3"></i>
                                    <div class="fs-4 nt-fw-500">از لیست‌های شما</div>
                                </div><a class="icon-link" href="{{ route('user.dashbord.user-favourites') }}">مشاهده همه<i
                                        class="ti ti-chevron-left"></i></a>
                            </div>
                            <!-- swiper-->
                            <div class="swiper"
                                data-swiper-options="{ &quot;slidesPerView&quot;:1, &quot;spaceBetween&quot;:10, &quot;breakpoints&quot;:{&quot;320&quot;:{&quot;slidesPerView&quot;:2,&quot;spaceBetween&quot;:20},&quot;480&quot;:{&quot;slidesPerView&quot;:3,&quot;spaceBetween&quot;:30},&quot;640&quot;:{&quot;slidesPerView&quot;:4,&quot;spaceBetween&quot;:40}} }">
                                <div class="swiper-wrapper">
                                    <!-- item-->
                                    @forelse($favouriteProducts as $favouriteProduct)
                                    <div class="swiper-slide h-auto">
                                        <div class="card border-0 h-100"><img class="card-img-top"
                                                src="{{ $favouriteProduct->image }}" alt="{{ $favouriteProduct->name }}" /><a
                                                class="card-body link-body-emphasis link-opacity-75-hover" href="{{ route('product.show', [$favouriteProduct, $favouriteProduct->slug]) }}">
                                                <div class="card-title nt-clamp-3 nt-fw-500">
                                                    {{ $favouriteProduct->name }}
                                                </div>
                                            </a>
                                            <div class="card-footer border-0 bg-transparent">
                                                <div class="nt-flex-end-center nt-fw-700 mb-3">
                                                    <div class="fs-5">{{ number_format($favouriteProduct->price) }}</div>
                                                    <div class="small">تومان</div>
                                                </div>
                                                <div class="d-grid">
                                                    <form action="{{ route('cart.add', $favouriteProduct->id) }}" method="post">
                                                        @csrf
                                                        <button class="btn btn-outline-primary" type="submit"> <i
                                                            class="ti ti-shopping-cart fs-5"></i>افزودن به سبد</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                    <div>
                                        <p class="text-center fw-bold">محصولی در لیست شما وجود ندارد</p>
                                    </div>
                                    @endforelse
                                </div>
                                <!-- swiper buttons-->
                                <div class="swiper-button-prev swiper-button-circle"></div>
                                <div class="swiper-button-next swiper-button-circle"></div>
                            </div>
                        </div>
                        <!-- frequent purchases-->
                        <div class="w-100 bg-body border rounded p-5">
                            <!-- header-->
                            <div class="nt-flex-between-center mb-5">
                                <div class="nt-flex-start-center"><i class="ti ti-repeat fs-3"></i>
                                    <div class="fs-4 nt-fw-500">خریدهای پرتکرار شما</div>
                                </div><a class="icon-link" href="#">مشاهده همه<i
                                        class="ti ti-chevron-left"></i></a>
                            </div>
                            <!-- swiper-->
                            <div class="swiper swiper-profile"
                                data-swiper-options="{ &quot;slidesPerView&quot;:1, &quot;spaceBetween&quot;:10, &quot;breakpoints&quot;:{&quot;320&quot;:{&quot;slidesPerView&quot;:2,&quot;spaceBetween&quot;:20},&quot;480&quot;:{&quot;slidesPerView&quot;:3,&quot;spaceBetween&quot;:30},&quot;640&quot;:{&quot;slidesPerView&quot;:4,&quot;spaceBetween&quot;:40}} }">
                                <div class="swiper-wrapper">
                                    <!-- Slide-->
                                    <!-- item-->
                                    @foreach($frequentProducts as $frequentProduct)
                                    <div class="swiper-slide h-auto">
                                        <div class="card border-0 h-100"><img class="card-img-top"
                                                src="{{ $frequentProduct->image }}" alt="{{ $frequentProduct->name }}" /><a
                                                class="card-body link-body-emphasis link-opacity-75-hover" href="{{ route('product.show', [$frequentProduct->id, $frequentProduct->slug]) }}">
                                                <div class="card-title nt-clamp-3 nt-fw-500">
                                                    {{ $frequentProduct->name }}
                                                </div>
                                            </a>
                                            <div class="card-footer border-0 bg-transparent">
                                                <div class="nt-flex-end-center nt-fw-700 mb-3">
                                                    <div class="fs-5">{{ number_format($frequentProduct->price) }}</div>
                                                    <div class="small">تومان</div>
                                                </div>
                                                <div class="d-grid">
                                                    <form action="{{ route('cart.add', $frequentProduct->id) }}" method="post">
                                                        @csrf
                                                        <button class="btn btn-outline-primary" type="submit"> <i
                                                            class="ti ti-shopping-cart fs-5"></i>افزودن به سبد</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <!-- swiper buttons-->
                                <div class="swiper-button-prev swiper-button-circle"></div>
                                <div class="swiper-button-next swiper-button-circle"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


@endsection


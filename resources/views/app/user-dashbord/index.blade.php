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
                        <!-- summary-->
                        <div class="w-100 bg-body border rounded p-5">
                            <!-- header-->
                            <div class="nt-flex-between-center mb-5">
                                <div class="nt-flex-start-center"><i class="ti ti-shopping-bag fs-3"></i>
                                    <div class="fs-4 nt-fw-500">سفارش های من</div>
                                </div><a class="icon-link" href="#">مشاهده همه<i
                                        class="ti ti-chevron-left"></i></a>
                            </div>
                            <!-- items-->
                            <div class="row">
                                <div class="col-12 col-md-4"><a class="link-body-emphasis nt-flex-start-center gap-4"
                                        href="#"><img src="img/pages/user-profile/packages/package-pen.png"
                                            alt="" width="75" />
                                        <div class="nt-flex-column">
                                            <div class="nt-flex-start-center gap-3 nt-fw-500">
                                                <div class="nt-fw-bolder">۰</div>
                                                <div class="fs-6">سفارش</div>
                                            </div>
                                            <div class="border-bottom border-2 border-warning py-2 nt-fw-500 text-warning">
                                                جاری</div>
                                        </div>
                                    </a></div>
                                <div class="col-12 col-md-4"><a class="link-body-emphasis nt-flex-start-center gap-4"
                                        href="#"><img src="img/pages/user-profile/packages/package-check.png"
                                            alt="" width="75" />
                                        <div class="nt-flex-column">
                                            <div class="nt-flex-start-center gap-3 nt-fw-500">
                                                <div class="nt-fw-bolder">۴۴</div>
                                                <div class="fs-6">سفارش</div>
                                            </div>
                                            <div class="border-bottom border-2 border-success py-2 nt-fw-500 text-success">
                                                تحویل شده</div>
                                        </div>
                                    </a></div>
                                <div class="col-12 col-md-4"><a class="link-body-emphasis nt-flex-start-center gap-4"
                                        href="#"><img src="img/pages/user-profile/packages/package-minus.png"
                                            alt="" width="75" />
                                        <div class="nt-flex-column">
                                            <div class="nt-flex-start-center gap-3 nt-fw-500">
                                                <div class="nt-fw-bolder">۱۲</div>
                                                <div class="fs-6">سفارش</div>
                                            </div>
                                            <div class="border-bottom border-2 border-danger py-2 nt-fw-500 text-danger">
                                                مرجوع شده</div>
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
                                </div><a class="icon-link" href="#">مشاهده همه<i
                                        class="ti ti-chevron-left"></i></a>
                            </div>
                            <!-- swiper-->
                            <div class="swiper"
                                data-swiper-options="{ &quot;slidesPerView&quot;:1, &quot;spaceBetween&quot;:10, &quot;breakpoints&quot;:{&quot;320&quot;:{&quot;slidesPerView&quot;:2,&quot;spaceBetween&quot;:20},&quot;480&quot;:{&quot;slidesPerView&quot;:3,&quot;spaceBetween&quot;:30},&quot;640&quot;:{&quot;slidesPerView&quot;:4,&quot;spaceBetween&quot;:40}} }">
                                <div class="swiper-wrapper">
                                    <!-- item-->
                                    <div class="swiper-slide h-auto">
                                        <div class="card border-0 h-100"><img class="card-img-top"
                                                src="img/pages/user-profile/1.jpg" alt="" /><a
                                                class="card-body link-body-emphasis link-opacity-75-hover" href="#">
                                                <div class="card-title nt-clamp-3 nt-fw-500">گوشی موبایل شیائومی مدل 14
                                                    Ultra 5G دو سیم کارت ظرفیت 512 گیگابایت و رم 16 گیگابایت - پک گلوبال
                                                </div>
                                            </a>
                                            <div class="card-footer border-0 bg-transparent">
                                                <div class="nt-flex-end-center nt-fw-700 mb-3">
                                                    <div class="fs-5">۷۵,۴۰۰,۰۰۰</div>
                                                    <div class="small">تومان</div>
                                                </div>
                                                <div class="d-grid">
                                                    <button class="btn btn-outline-primary" type="button"> <i
                                                            class="ti ti-shopping-cart fs-5"></i>افزودن به سبد</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- item-->
                                    <div class="swiper-slide h-auto">
                                        <div class="card border-0 h-100"><img class="card-img-top"
                                                src="img/pages/user-profile/2.jpg" alt="" /><a
                                                class="card-body link-body-emphasis link-opacity-75-hover" href="#">
                                                <div class="card-title nt-clamp-3 nt-fw-500">گوشی موبایل شیائومی مدل 14 5G
                                                    دو سیم کارت ظرفیت 512 گیگابایت و رم 12 گیگابایت - گلوبال</div>
                                            </a>
                                            <div class="card-footer border-0 bg-transparent">
                                                <div class="nt-flex-end-center nt-fw-700 mb-3">
                                                    <div class="fs-5">۴۹,۸۹۹,۰۰۰</div>
                                                    <div class="small">تومان</div>
                                                </div>
                                                <div class="d-grid">
                                                    <button class="btn btn-outline-primary" type="button"> <i
                                                            class="ti ti-shopping-cart fs-5"></i>افزودن به سبد</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- item-->
                                    <div class="swiper-slide h-auto">
                                        <div class="card border-0 h-100"><img class="card-img-top"
                                                src="img/pages/user-profile/3.jpg" alt="" /><a
                                                class="card-body link-body-emphasis link-opacity-75-hover" href="#">
                                                <div class="card-title nt-clamp-3 nt-fw-500">گوشی موبایل شیائومی مدل 14T
                                                    Pro دو سیم کارت ظرفیت 1 ترابایت و رم 12 گیگابایت</div>
                                            </a>
                                            <div class="card-footer border-0 bg-transparent">
                                                <div class="nt-flex-end-center nt-fw-700 mb-3">
                                                    <div class="fs-5">۴۵,۵۰۰,۰۰۰</div>
                                                    <div class="small">تومان</div>
                                                </div>
                                                <div class="d-grid">
                                                    <button class="btn btn-outline-primary" type="button"> <i
                                                            class="ti ti-shopping-cart fs-5"></i>افزودن به سبد</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- item-->
                                    <div class="swiper-slide h-auto">
                                        <div class="card border-0 h-100"><img class="card-img-top"
                                                src="img/pages/user-profile/4.jpg" alt="" /><a
                                                class="card-body link-body-emphasis link-opacity-75-hover" href="#">
                                                <div class="card-title nt-clamp-3 nt-fw-500">گوشی موبایل شیائومی مدل 14T
                                                    Pro دو سیم کارت ظرفیت 512 گیگابایت و رم 12 گیگابایت</div>
                                            </a>
                                            <div class="card-footer border-0 bg-transparent">
                                                <div class="nt-flex-end-center nt-fw-700 mb-3">
                                                    <div class="fs-5">۴۲,۷۹۹,۰۰۰</div>
                                                    <div class="small">تومان</div>
                                                </div>
                                                <div class="d-grid">
                                                    <button class="btn btn-outline-primary" type="button"> <i
                                                            class="ti ti-shopping-cart fs-5"></i>افزودن به سبد</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- item-->
                                    <div class="swiper-slide h-auto">
                                        <div class="card border-0 h-100"><img class="card-img-top"
                                                src="img/pages/user-profile/5.jpg" alt="" /><a
                                                class="card-body link-body-emphasis link-opacity-75-hover" href="#">
                                                <div class="card-title nt-clamp-3 nt-fw-500">گوشی موبایل شیائومی مدل Poco
                                                    F6 Pro دو سیم کارت ظرفیت 1 ترابایت و رم 16 گیگابایت - پک گلوبال</div>
                                            </a>
                                            <div class="card-footer border-0 bg-transparent">
                                                <div class="nt-flex-end-center nt-fw-700 mb-3">
                                                    <div class="fs-5">۳۹,۷۹۰,۰۰۰</div>
                                                    <div class="small">تومان</div>
                                                </div>
                                                <div class="d-grid">
                                                    <button class="btn btn-outline-primary" type="button"> <i
                                                            class="ti ti-shopping-cart fs-5"></i>افزودن به سبد</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- item-->
                                    <div class="swiper-slide h-auto">
                                        <div class="card border-0 h-100"><img class="card-img-top"
                                                src="img/pages/user-profile/6.jpg" alt="" /><a
                                                class="card-body link-body-emphasis link-opacity-75-hover" href="#">
                                                <div class="card-title nt-clamp-3 nt-fw-500">گوشی موبایل شیائومی مدل 13T
                                                    Pro 5G دو سیم کارت ظرفیت 512 گیگابایت و رم 12 گیگابایت</div>
                                            </a>
                                            <div class="card-footer border-0 bg-transparent">
                                                <div class="nt-flex-end-center nt-fw-700 mb-3">
                                                    <div class="fs-5">۳۵,۴۰۰,۰۰۰</div>
                                                    <div class="small">تومان</div>
                                                </div>
                                                <div class="d-grid">
                                                    <button class="btn btn-outline-primary" type="button"> <i
                                                            class="ti ti-shopping-cart fs-5"></i>افزودن به سبد</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                                    <div class="swiper-slide h-auto">
                                        <div class="card border-0 h-100"><img class="card-img-top"
                                                src="img/pages/user-profile/6.jpg" alt="" /><a
                                                class="card-body link-body-emphasis link-opacity-75-hover" href="#">
                                                <div class="card-title nt-clamp-3 nt-fw-500">گوشی موبایل شیائومی مدل 13T
                                                    Pro 5G دو سیم کارت ظرفیت 512 گیگابایت و رم 12 گیگابایت</div>
                                            </a>
                                            <div class="card-footer border-0 bg-transparent">
                                                <div class="nt-flex-end-center nt-fw-700 mb-3">
                                                    <div class="fs-5">۳۵,۴۰۰,۰۰۰</div>
                                                    <div class="small">تومان</div>
                                                </div>
                                                <div class="d-grid">
                                                    <button class="btn btn-outline-primary" type="button"> <i
                                                            class="ti ti-shopping-cart fs-5"></i>افزودن به سبد</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- item-->
                                    <div class="swiper-slide h-auto">
                                        <div class="card border-0 h-100"><img class="card-img-top"
                                                src="img/pages/user-profile/5.jpg" alt="" /><a
                                                class="card-body link-body-emphasis link-opacity-75-hover" href="#">
                                                <div class="card-title nt-clamp-3 nt-fw-500">گوشی موبایل شیائومی مدل Poco
                                                    F6 Pro دو سیم کارت ظرفیت 1 ترابایت و رم 16 گیگابایت - پک گلوبال</div>
                                            </a>
                                            <div class="card-footer border-0 bg-transparent">
                                                <div class="nt-flex-end-center nt-fw-700 mb-3">
                                                    <div class="fs-5">۳۹,۷۹۰,۰۰۰</div>
                                                    <div class="small">تومان</div>
                                                </div>
                                                <div class="d-grid">
                                                    <button class="btn btn-outline-primary" type="button"> <i
                                                            class="ti ti-shopping-cart fs-5"></i>افزودن به سبد</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- item-->
                                    <div class="swiper-slide h-auto">
                                        <div class="card border-0 h-100"><img class="card-img-top"
                                                src="img/pages/user-profile/4.jpg" alt="" /><a
                                                class="card-body link-body-emphasis link-opacity-75-hover" href="#">
                                                <div class="card-title nt-clamp-3 nt-fw-500">گوشی موبایل شیائومی مدل 14T
                                                    Pro دو سیم کارت ظرفیت 512 گیگابایت و رم 12 گیگابایت</div>
                                            </a>
                                            <div class="card-footer border-0 bg-transparent">
                                                <div class="nt-flex-end-center nt-fw-700 mb-3">
                                                    <div class="fs-5">۴۲,۷۹۹,۰۰۰</div>
                                                    <div class="small">تومان</div>
                                                </div>
                                                <div class="d-grid">
                                                    <button class="btn btn-outline-primary" type="button"> <i
                                                            class="ti ti-shopping-cart fs-5"></i>افزودن به سبد</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- item-->
                                    <div class="swiper-slide h-auto">
                                        <div class="card border-0 h-100"><img class="card-img-top"
                                                src="img/pages/user-profile/3.jpg" alt="" /><a
                                                class="card-body link-body-emphasis link-opacity-75-hover" href="#">
                                                <div class="card-title nt-clamp-3 nt-fw-500">گوشی موبایل شیائومی مدل 14T
                                                    Pro دو سیم کارت ظرفیت 1 ترابایت و رم 12 گیگابایت</div>
                                            </a>
                                            <div class="card-footer border-0 bg-transparent">
                                                <div class="nt-flex-end-center nt-fw-700 mb-3">
                                                    <div class="fs-5">۴۵,۵۰۰,۰۰۰</div>
                                                    <div class="small">تومان</div>
                                                </div>
                                                <div class="d-grid">
                                                    <button class="btn btn-outline-primary" type="button"> <i
                                                            class="ti ti-shopping-cart fs-5"></i>افزودن به سبد</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- item-->
                                    <div class="swiper-slide h-auto">
                                        <div class="card border-0 h-100"><img class="card-img-top"
                                                src="img/pages/user-profile/2.jpg" alt="" /><a
                                                class="card-body link-body-emphasis link-opacity-75-hover" href="#">
                                                <div class="card-title nt-clamp-3 nt-fw-500">گوشی موبایل شیائومی مدل 14 5G
                                                    دو سیم کارت ظرفیت 512 گیگابایت و رم 12 گیگابایت - گلوبال</div>
                                            </a>
                                            <div class="card-footer border-0 bg-transparent">
                                                <div class="nt-flex-end-center nt-fw-700 mb-3">
                                                    <div class="fs-5">۴۹,۸۹۹,۰۰۰</div>
                                                    <div class="small">تومان</div>
                                                </div>
                                                <div class="d-grid">
                                                    <button class="btn btn-outline-primary" type="button"> <i
                                                            class="ti ti-shopping-cart fs-5"></i>افزودن به سبد</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- item-->
                                    <div class="swiper-slide h-auto">
                                        <div class="card border-0 h-100"><img class="card-img-top"
                                                src="img/pages/user-profile/1.jpg" alt="" /><a
                                                class="card-body link-body-emphasis link-opacity-75-hover" href="#">
                                                <div class="card-title nt-clamp-3 nt-fw-500">گوشی موبایل شیائومی مدل 14
                                                    Ultra 5G دو سیم کارت ظرفیت 512 گیگابایت و رم 16 گیگابایت - پک گلوبال
                                                </div>
                                            </a>
                                            <div class="card-footer border-0 bg-transparent">
                                                <div class="nt-flex-end-center nt-fw-700 mb-3">
                                                    <div class="fs-5">۷۵,۴۰۰,۰۰۰</div>
                                                    <div class="small">تومان</div>
                                                </div>
                                                <div class="d-grid">
                                                    <button class="btn btn-outline-primary" type="button"> <i
                                                            class="ti ti-shopping-cart fs-5"></i>افزودن به سبد</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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


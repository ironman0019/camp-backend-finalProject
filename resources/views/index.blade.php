@extends('app.layouts.master')

@section('title', 'صفحه اصلی')

@section('content')


    <!-- slider-->
    <section class="swiper"
        data-swiper-options="{&quot;loop&quot;:true, &quot;spaceBetween&quot;:0, &quot;autoHeight&quot;:true, &quot;autoplay&quot;:{&quot;delay&quot;: 5000}, &quot;speed&quot;:300 }"
        style="--swiper-theme-color: var(--bs-primary);">
        <div class="swiper-wrapper"><a class="swiper-slide rounded" href="#">
                <picture>
                    <source srcset="{{ asset('assets/img/pages/index/slider/1.jpg') }}" media="(min-width: 850px)" /><img class="swiper-slide-img"
                        src="" alt="" />
                </picture>
            </a><a class="swiper-slide rounded" href="#">
                <picture>
                    <source srcset="{{ asset('assets/img/pages/index/slider/2.jpg') }}" media="(min-width: 850px)" /><img
                        class="swiper-slide-img" src="" alt="" />
                </picture>
            </a>
        </div>
        <div class="swiper-pagination swiper-pagination-center bg-body rounded rounded-bottom-0 bottom-0"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </section>


    <!-- wordpress section-->
    <section class="container-fluid wrapper mt-5 mb-5">
        <div class="index-offer py-4">
            <div class="index-offer-bg" style="background-color: var(--bs-primary)"></div>
            <header class="nt-flex gap-4 p-3">
                <div class="nt-flex-column gap-4">
                    <div class="fs-2 nt-fw-500 text-light text-nowrap">محصولات ورد پرسی</div>
                </div>
            </header>
            <div class="swiper px-5 py-5"
                data-swiper-options="{ &quot;freeMode&quot;:true, &quot;spaceBetween&quot;:15, &quot;slidesPerView&quot;:&quot;auto&quot; }"
                style="--swiper-theme-color: var(--bs-dark);">
                <!-- wrapper-->
                <div class="swiper-wrapper">
                    <!-- slide-->
                    <div class="swiper-slide h-auto" style="max-width:13rem"><a class="card h-100 rounded-4 px-2 py-4"
                            href="#"><img class="card-img-top"
                                src="{{ asset('assets/img/pages/index/offers/1.jpg') }}" alt="" />
                            <div class="card-body">
                                <div class="card-title lh-lg nt-clamp-2"> آیتم یک
                                </div>
                                <div class="card-text"></div>
                            </div>
                            <div class="card-footer bg-transparent border-0">
                                <div class="nt-fw-bold" dir="ltr">
                                    <div class="nt-flex-start-center gap-1">
                                        <div class="small">تومان</div>
                                        <div class="fs-5">۲۰,۴۰۰,۰۰۰</div>
                                    </div>
                                </div>
                            </div>
                        </a></div>

                </div>
                <div class="swiper-pagination"></div>
                <!-- swiper buttons-->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
            <!---->
            <div class="nt-flex-start-center py-2 fs-5 px-2"><a class="btn btn-lg btn-danger" href="#">
                    <div class="fs-6 nt-fw-500">مشاهده همه</div><i class="ti ti-chevron-left fs-4"></i>
                </a></div>
        </div>
    </section>

    <!-- hot sells-->
    <section class="container-fluid wrapper mb-5">
        <div class="index-offer py-4">
            <div class="index-offer-bg"></div>
            <header class="nt-flex gap-4 p-3"><i class="ti ti-percentage display-1 text-light"></i>
                <div class="nt-flex-column gap-4">
                    <div class="fs-2 nt-fw-500 text-light text-nowrap">محصولات دارای تخفیف</div>
                </div>
            </header>
            <div class="swiper px-5 py-5"
                data-swiper-options="{ &quot;freeMode&quot;:true, &quot;spaceBetween&quot;:15, &quot;slidesPerView&quot;:&quot;auto&quot; }"
                style="--swiper-theme-color: var(--bs-dark);">
                <!-- wrapper-->
                <div class="swiper-wrapper">
                    <!-- slide-->
                    <div class="swiper-slide h-auto" style="max-width:13rem"><a class="card h-100 rounded-4 px-2 py-4"
                            href="#"><img class="card-img-top" src="img/pages/index/offers/1.jpg"
                                alt="" />
                            <div class="card-body">
                                <div class="card-title lh-lg nt-clamp-2">ماشین لباسشویی دوو مدل DWK-UN810C ظرفیت 8 کیلوگرم
                                </div>
                                <div class="card-text"></div>
                            </div>
                            <div class="card-footer bg-transparent border-0">
                                <div class="nt-flex-between-center mb-2">
                                    <div class="badge bg-danger text-light rounded-pill">۲۹٪</div>
                                    <div class="nt-fw-500 text-body-tertiary nt-flex-start-center gap-1">
                                        <div class="text-decoration-line-through">۱۶,۴۹۹,۰۰۰</div>
                                        <div class="small">تومان</div>
                                    </div>
                                </div>
                                <div class="nt-fw-bold" dir="ltr">
                                    <div class="nt-flex-start-center gap-1">
                                        <div class="small">تومان</div>
                                        <div class="fs-5">۲۰,۴۰۰,۰۰۰</div>
                                    </div>
                                </div>
                            </div>
                        </a></div>
                    <!-- slide-->
                    <div class="swiper-slide h-auto" style="max-width:13rem"><a class="card h-100 rounded-4 px-2 py-4"
                            href="#"><img class="card-img-top" src="img/pages/index/offers/2.jpg"
                                alt="" />
                            <div class="card-body">
                                <div class="card-title lh-lg nt-clamp-2">جاروبرقی ایربات مدل L108S Pro Ultra</div>
                                <div class="card-text"></div>
                            </div>
                            <div class="card-footer bg-transparent border-0">
                                <div class="nt-flex-between-center mb-2">
                                    <div class="badge bg-danger text-light rounded-pill">۲۴٪</div>
                                    <div class="nt-fw-500 text-body-tertiary nt-flex-start-center gap-1">
                                        <div class="text-decoration-line-through">۳۹,۹۹۹,۰۰۰</div>
                                        <div class="small">تومان</div>
                                    </div>
                                </div>
                                <div class="nt-fw-bold" dir="ltr">
                                    <div class="nt-flex-start-center gap-1">
                                        <div class="small">تومان</div>
                                        <div class="fs-5">۵۲,۸۲۰,۳۴۰</div>
                                    </div>
                                </div>
                            </div>
                        </a></div>
                    <!-- slide-->
                    <div class="swiper-slide h-auto" style="max-width:13rem"><a class="card h-100 rounded-4 px-2 py-4"
                            href="#"><img class="card-img-top" src="img/pages/index/offers/3.jpg" />
                            <div class="card-body">
                                <div class="card-title lh-lg nt-clamp-2">
                                    ماشین ظرفشویی وست پوینت مدل WYG-15822.ES</div>
                                <div class="card-text"> </div>
                            </div>
                            <div class="card-footer bg-transparent border-0">
                                <div class="nt-flex-between-center mb-2">
                                    <div class="badge bg-danger text-light rounded-pill">
                                        ۱۵٪</div>
                                    <div class="nt-fw-500 text-body-tertiary nt-flex-start-center gap-1">
                                        <div class="text-decoration-line-through">
                                            ۳۳,۹۹۹,۰۰۰</div>
                                        <div class="small">
                                            تومان</div>
                                    </div>
                                </div>
                                <div class="nt-fw-bold" dir="ltr">
                                    <div class="nt-flex-start-center gap-1">
                                        <div class="small">تومان</div>
                                        <div class="fs-5">۳۹,۸۰۰,۰۰۰</div>
                                    </div>
                                </div>
                            </div>
                        </a></div>
                    <!-- slide-->
                    <div class="swiper-slide h-auto" style="max-width:13rem"><a class="card h-100 rounded-4 px-2 py-4"
                            href="#"><img class="card-img-top" src="img/pages/index/offers/4.jpg" />
                            <div class="card-body">
                                <div class="card-title lh-lg nt-clamp-2">
                                    جاروبرقی روبوراک مدل Q Revo Max V </div>
                                <div class="card-text"> </div>
                            </div>
                            <div class="card-footer bg-transparent border-0">
                                <div class="nt-flex-between-center mb-2">
                                    <div class="badge bg-danger text-light rounded-pill">
                                        ۴۱٪</div>
                                    <div class="nt-fw-500 text-body-tertiary nt-flex-start-center gap-1">
                                        <div class="text-decoration-line-through">
                                            ۷۴,۹۰۰,۰۰۰</div>
                                        <div class="small">
                                            تومان</div>
                                    </div>
                                </div>
                                <div class="nt-fw-bold" dir="ltr">
                                    <div class="nt-flex-start-center gap-1">
                                        <div class="small">تومان</div>
                                        <div class="fs-5">۱۲۷,۹۸۲,۰۲۰</div>
                                    </div>
                                </div>
                            </div>
                        </a></div>
                    <!-- slide-->
                    <div class="swiper-slide h-auto" style="max-width:13rem"><a class="card h-100 rounded-4 px-2 py-4"
                            href="#"><img class="card-img-top" src="img/pages/index/offers/5.jpg" />
                            <div class="card-body">
                                <div class="card-title lh-lg nt-clamp-2">
                                    یخچال و فریزر ساید بای ساید 28 فوت ایکس ویژن مدل TS552-AWD/ASD</div>
                                <div class="card-text"> </div>
                            </div>
                            <div class="card-footer bg-transparent border-0">
                                <div class="nt-flex-between-center mb-2">
                                    <div class="badge bg-danger text-light rounded-pill">
                                        ۶٪</div>
                                    <div class="nt-fw-500 text-body-tertiary nt-flex-start-center gap-1">
                                        <div class="text-decoration-line-through">
                                            ۳۱,۵۰۰,۰۰۰</div>
                                        <div class="small">
                                            تومان</div>
                                    </div>
                                </div>
                                <div class="nt-fw-bold" dir="ltr">
                                    <div class="nt-flex-start-center gap-1">
                                        <div class="small">تومان</div>
                                        <div class="fs-5">۳۳,۴۰۰,۰۰۰</div>
                                    </div>
                                </div>
                            </div>
                        </a></div>
                    <!-- slide-->
                    <div class="swiper-slide h-auto" style="max-width:13rem"><a class="card h-100 rounded-4 px-2 py-4"
                            href="#"><img class="card-img-top" src="img/pages/index/offers/6.jpg" />
                            <div class="card-body">
                                <div class="card-title lh-lg nt-clamp-2">
                                    گوشی موبایل موتورولا مدل Moto G24 دو سیم‌ کارت ظرفیت 128 گیگابایت و رم 8 گیگابایت</div>
                                <div class="card-text"> </div>
                            </div>
                            <div class="card-footer bg-transparent border-0">
                                <div class="nt-flex-between-center mb-2">
                                    <div class="badge bg-danger text-light rounded-pill">
                                        ۵٪</div>
                                    <div class="nt-fw-500 text-body-tertiary nt-flex-start-center gap-1">
                                        <div class="text-decoration-line-through">
                                            ۵,۹۹۹,۰۰۰</div>
                                        <div class="small">
                                            تومان</div>
                                    </div>
                                </div>
                                <div class="nt-fw-bold" dir="ltr">
                                    <div class="nt-flex-start-center gap-1">
                                        <div class="small">تومان</div>
                                        <div class="fs-5">۶,۳۰۰,۰۰۰</div>
                                    </div>
                                </div>
                            </div>
                        </a></div>
                    <!-- slide-->
                    <div class="swiper-slide h-auto" style="max-width:13rem"><a class="card h-100 rounded-4 px-2 py-4"
                            href="#"><img class="card-img-top" src="img/pages/index/offers/7.jpg" />
                            <div class="card-body">
                                <div class="card-title lh-lg nt-clamp-2">
                                    گوشی موبایل هوآوی مدل nova 10 SE دو سیم کارت ظرفیت 256 گیگابایت و رم 8 گیگابایت</div>
                                <div class="card-text"> </div>
                            </div>
                            <div class="card-footer bg-transparent border-0">
                                <div class="nt-flex-between-center mb-2">
                                    <div class="badge bg-danger text-light rounded-pill">
                                        ۴٪</div>
                                    <div class="nt-fw-500 text-body-tertiary nt-flex-start-center gap-1">
                                        <div class="text-decoration-line-through">
                                            ۱۳,۱۹۹,۰۰۰</div>
                                        <div class="small">
                                            تومان</div>
                                    </div>
                                </div>
                                <div class="nt-fw-bold" dir="ltr">
                                    <div class="nt-flex-start-center gap-1">
                                        <div class="small">تومان</div>
                                        <div class="fs-5">۱۳,۶۹۹,۰۰۰</div>
                                    </div>
                                </div>
                            </div>
                        </a></div>
                    <!-- slide-->
                    <div class="swiper-slide h-auto" style="max-width:13rem"><a class="card h-100 rounded-4 px-2 py-4"
                            href="#"><img class="card-img-top" src="img/pages/index/offers/8.jpg" />
                            <div class="card-body">
                                <div class="card-title lh-lg nt-clamp-2">
                                    گوشی موبایل آنر مدل X9a دو سیم کارت ظرفیت 256 گیگابایت و رم 8 گیگابایت </div>
                                <div class="card-text"> </div>
                            </div>
                            <div class="card-footer bg-transparent border-0">
                                <div class="nt-flex-between-center mb-2">
                                    <div class="badge bg-danger text-light rounded-pill">
                                        ۳٪</div>
                                    <div class="nt-fw-500 text-body-tertiary nt-flex-start-center gap-1">
                                        <div class="text-decoration-line-through">
                                            ۱۴,۱۴۹,۰۰۰</div>
                                        <div class="small">
                                            تومان</div>
                                    </div>
                                </div>
                                <div class="nt-fw-bold" dir="ltr">
                                    <div class="nt-flex-start-center gap-1">
                                        <div class="small">تومان</div>
                                        <div class="fs-5">۱۴,۵۵۹,۰۰۰</div>
                                    </div>
                                </div>
                            </div>
                        </a></div>
                    <!-- slide-->
                    <div class="swiper-slide h-auto" style="max-width:13rem"><a class="card h-100 rounded-4 px-2 py-4"
                            href="#"><img class="card-img-top" src="img/pages/index/offers/9.jpg" />
                            <div class="card-body">
                                <div class="card-title lh-lg nt-clamp-2">
                                    گوشی موبایل ناتینگ مدل Phone 2 دو سیم کارت ظرفیت 512 گیگابایت و رم 12 گیگابایت</div>
                                <div class="card-text"> </div>
                            </div>
                            <div class="card-footer bg-transparent border-0">
                                <div class="nt-flex-between-center mb-2">
                                    <div class="badge bg-danger text-light rounded-pill">
                                        ۲٪</div>
                                    <div class="nt-fw-500 text-body-tertiary nt-flex-start-center gap-1">
                                        <div class="text-decoration-line-through">
                                            ۳۸,۳۹۹,۰۰۰</div>
                                        <div class="small">
                                            تومان</div>
                                    </div>
                                </div>
                                <div class="nt-fw-bold" dir="ltr">
                                    <div class="nt-flex-start-center gap-1">
                                        <div class="small">تومان</div>
                                        <div class="fs-5">۳۹,۲۹۹,۰۰۰</div>
                                    </div>
                                </div>
                            </div>
                        </a></div>
                    <!-- slide-->
                    <div class="swiper-slide h-auto" style="max-width:13rem"><a class="card h-100 rounded-4 px-2 py-4"
                            href="#"><img class="card-img-top" src="img/pages/index/offers/10.jpg" />
                            <div class="card-body">
                                <div class="card-title lh-lg nt-clamp-2">
                                    هدفون بلوتوثی پرووان مدل PHB3222</div>
                                <div class="card-text"> </div>
                            </div>
                            <div class="card-footer bg-transparent border-0">
                                <div class="nt-flex-between-center mb-2">
                                    <div class="badge bg-danger text-light rounded-pill">
                                        ۴۱٪</div>
                                    <div class="nt-fw-500 text-body-tertiary nt-flex-start-center gap-1">
                                        <div class="text-decoration-line-through">
                                            ۱,۰۹۹,۰۰۰</div>
                                        <div class="small">
                                            تومان</div>
                                    </div>
                                </div>
                                <div class="nt-fw-bold" dir="ltr">
                                    <div class="nt-flex-start-center gap-1">
                                        <div class="small">تومان</div>
                                        <div class="fs-5">۱,۸۵۰,۰۰۰</div>
                                    </div>
                                </div>
                            </div>
                        </a></div>
                    <!-- slide-->
                    <div class="swiper-slide h-auto" style="max-width:13rem"><a class="card h-100 rounded-4 px-2 py-4"
                            href="#"><img class="card-img-top" src="img/pages/index/offers/11.jpg" />
                            <div class="card-body">
                                <div class="card-title lh-lg nt-clamp-2">
                                    هدفون بلوتوثی انکر مدل SoundCore R50i A3949</div>
                                <div class="card-text"> </div>
                            </div>
                            <div class="card-footer bg-transparent border-0">
                                <div class="nt-flex-between-center mb-2">
                                    <div class="badge bg-danger text-light rounded-pill">
                                        ۱۶٪</div>
                                    <div class="nt-fw-500 text-body-tertiary nt-flex-start-center gap-1">
                                        <div class="text-decoration-line-through">
                                            ۷۸۹,۰۰۰</div>
                                        <div class="small">
                                            تومان</div>
                                    </div>
                                </div>
                                <div class="nt-fw-bold" dir="ltr">
                                    <div class="nt-flex-start-center gap-1">
                                        <div class="small">تومان</div>
                                        <div class="fs-5">۹۴۰,۰۰۰</div>
                                    </div>
                                </div>
                            </div>
                        </a></div>
                    <!-- slide-->
                    <div class="swiper-slide h-auto" style="max-width:13rem"><a class="card h-100 rounded-4 px-2 py-4"
                            href="#"><img class="card-img-top" src="img/pages/index/offers/12.jpg" />
                            <div class="card-body">
                                <div class="card-title lh-lg nt-clamp-2">
                                    لپ تاپ 15.3 اینچی اپل مدل MacBook Air MQKP3 M2 2023</div>
                                <div class="card-text"> </div>
                            </div>
                            <div class="card-footer bg-transparent border-0">
                                <div class="nt-flex-between-center mb-2">
                                    <div class="badge bg-danger text-light rounded-pill">
                                        ۸٪</div>
                                    <div class="nt-fw-500 text-body-tertiary nt-flex-start-center gap-1">
                                        <div class="text-decoration-line-through">
                                            ۶۷,۰۹۹,۰۰۰</div>
                                        <div class="small">
                                            تومان</div>
                                    </div>
                                </div>
                                <div class="nt-fw-bold" dir="ltr">
                                    <div class="nt-flex-start-center gap-1">
                                        <div class="small">تومان</div>
                                        <div class="fs-5">۷۲,۹۸۹,۰۰۰</div>
                                    </div>
                                </div>
                            </div>
                        </a></div>
                </div>
                <div class="swiper-pagination"></div>
                <!-- swiper buttons-->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
            <!---->
            <div class="nt-flex-start-center py-2 fs-5 px-2"><a class="btn btn-lg btn-danger" href="#">
                    <div class="fs-6 nt-fw-500">مشاهده همه</div><i class="ti ti-chevron-left fs-4"></i>
                </a></div>
        </div>
    </section>
    <!-- buttonLinks-->
    <section class="container-fluid wrapper mb-5">
        <div class="row g-4 py-4">
            <!-- item-->
            <div class="col-12 col-md-6 col-lg-4"><a class="index-buttonLink btn btn-light" href="#">
                    <div class="nt-flex-column">
                        <div class="fs-4 nt-fw-bold mb-4">پرفروش ترین های</div>
                        <div class="nt-flex-start-center mb-3"><i class="ti ti-caret-left-filled fs-3 text-primary"></i>
                            <div class="fs-2">قالب سایت</div>
                        </div>
                        <div class="nt-flex-start-center">
                            <div class="btn btn-lg btn-primary rounded-5" style="border-top-right-radius: 0 !important">
                                <div class="fs-6">خرید</div><i class="ti ti-arrow-left fs-5"></i>
                            </div>
                        </div>
                    </div><img src="{{ asset('assets/img/pages/index/card/phone.png') }}" alt="" width="125" />
                </a></div>
            <!-- item-->
            <div class="col-12 col-md-6 col-lg-4"><a class="index-buttonLink btn btn-light" href="#">
                    <div class="nt-flex-column">
                        <div class="fs-4 nt-fw-bold mb-4">پرفروش ترین های</div>
                        <div class="nt-flex-start-center mb-3"><i class="ti ti-caret-left-filled fs-3 text-primary"></i>
                            <div class="fs-2">قالب وردپرسی</div>
                        </div>
                        <div class="nt-flex-start-center">
                            <div class="btn btn-lg btn-primary rounded-5" style="border-top-right-radius: 0 !important">
                                <div class="fs-6">خرید</div><i class="ti ti-arrow-left fs-5"></i>
                            </div>
                        </div>
                    </div><img src="{{ asset('assets/img/pages/index/card/tablet.png') }}" alt="" width="125" />
                </a></div>
            <!-- item-->
            <div class="col-12 col-md-6 col-lg-4"><a class="index-buttonLink btn btn-light" href="#">
                    <div class="nt-flex-column">
                        <div class="fs-4 nt-fw-bold mb-4">پرفروش ترین های</div>
                        <div class="nt-flex-start-center mb-3"><i class="ti ti-caret-left-filled fs-3 text-primary"></i>
                            <div class="fs-2">کتاب الکترونیک</div>
                        </div>
                        <div class="nt-flex-start-center">
                            <div class="btn btn-lg btn-primary rounded-5" style="border-top-right-radius: 0 !important">
                                <div class="fs-6">خرید</div><i class="ti ti-arrow-left fs-5"></i>
                            </div>
                        </div>
                    </div><img src="{{ asset('assets/img/pages/index/card/laptop.png') }}" alt="" width="125" />
                </a></div>
            <!-- item-->
            <div class="col-12 col-md-6"><a class="index-buttonLink btn btn-light" href="#">
                    <div class="nt-flex-column">
                        <div class="fs-4 nt-fw-bold mb-4">پرفروش ترین های</div>
                        <div class="nt-flex-start-center mb-3"><i class="ti ti-caret-left-filled fs-3 text-primary"></i>
                            <div class="fs-2">دوره آموزشی</div>
                        </div>
                        <div class="nt-flex-start-center">
                            <div class="btn btn-lg btn-primary rounded-5" style="border-top-right-radius: 0 !important">
                                <div class="fs-6">خرید</div><i class="ti ti-arrow-left fs-5"></i>
                            </div>
                        </div>
                    </div><img src="{{ asset('assets/img/pages/index/card/meta.png') }}" alt="" width="200" />
                </a></div>
            <!-- item-->
            <div class="col-12 col-md-6"><a class="index-buttonLink btn btn-light" href="#">
                    <div class="nt-flex-column">
                        <div class="fs-4 nt-fw-bold mb-4">پرفروش ترین های</div>
                        <div class="nt-flex-start-center mb-3"><i class="ti ti-caret-left-filled fs-3 text-primary"></i>
                            <div class="fs-2">پلاگین های فیگما</div>
                        </div>
                        <div class="nt-flex-start-center">
                            <div class="btn btn-lg btn-primary rounded-5" style="border-top-right-radius: 0 !important">
                                <div class="fs-6">خرید</div><i class="ti ti-arrow-left fs-5"></i>
                            </div>
                        </div>
                    </div><img src="{{ asset('assets/img/pages/index/card/console.png') }}" alt="" width="125" />
                </a></div>
        </div>
    </section>
    <!-- categories slider-->
    <section class="container-fluid wrapper mb-5">
        <div class="swiper py-5 px-1"
            data-swiper-options="{ &quot;loop&quot;:true, &quot;autoplay&quot;:{&quot;delay&quot;: 3000}, &quot;speed&quot;:1000, &quot;slidesPerView&quot;:1, &quot;spaceBetween&quot;:30, &quot;breakpoints&quot;:{ &quot;480&quot;:{&quot;slidesPerView&quot;:3},&quot;640&quot;:{&quot;slidesPerView&quot;:6},&quot;720&quot;:{&quot;slidesPerView&quot;:8} } }">
            <div class="swiper-wrapper">
                <!-- slide-->
                <div class="swiper-slide h-auto"><a
                        class="h-100 link-body-emphasis nt-flex-column-center-center border bg-body rounded-5 p-3"
                        href="#"><img src="{{ asset('assets/img/pages/index/card/laptop.png') }}" alt="" width="100" />
                        <div class="fs-4 nt-fw-500">لپ‌تاپ</div>
                        <div class="text-body-secondary">LapTop</div>
                    </a></div>
                <!-- slide-->
                <div class="swiper-slide h-auto"><a
                        class="h-100 link-body-emphasis nt-flex-column-center-center border bg-body rounded-5 p-3"
                        href="#"><img src="{{ asset('assets/img/pages/index/card/phone.png') }}" alt="" width="100" />
                        <div class="fs-4 nt-fw-500">گوشی موبایل</div>
                        <div class="text-body-secondary">Phone</div>
                    </a></div>
                <!-- slide-->
                <div class="swiper-slide h-auto"><a
                        class="h-100 link-body-emphasis nt-flex-column-center-center border bg-body rounded-5 p-3"
                        href="#"><img src="{{ asset('assets/img/pages/index/card/tablet.png') }}" alt="" width="100" />
                        <div class="fs-4 nt-fw-500">تبلت</div>
                        <div class="text-body-secondary">Tablet</div>
                    </a></div>
                <!-- slide-->
                <div class="swiper-slide h-auto"><a
                        class="h-100 link-body-emphasis nt-flex-column-center-center border bg-body rounded-5 p-3"
                        href="#"><img src="{{ asset('assets/img/pages/index/card/laptop.png') }}" alt="" width="100" />
                        <div class="fs-4 nt-fw-500">لپ‌تاپ</div>
                        <div class="text-body-secondary">LapTop</div>
                    </a></div>
                <!-- slide-->
                <div class="swiper-slide h-auto"><a
                        class="h-100 link-body-emphasis nt-flex-column-center-center border bg-body rounded-5 p-3"
                        href="#"><img src="{{ asset('assets/img/pages/index/card/console.png') }}" alt="" width="100" />
                        <div class="fs-4 nt-fw-500">کنسول</div>
                        <div class="text-body-secondary">Console</div>
                    </a></div>
                <!-- slide-->
                <div class="swiper-slide h-auto"><a
                        class="h-100 link-body-emphasis nt-flex-column-center-center border bg-body rounded-5 p-3"
                        href="#"><img src="{{ asset('assets/img/pages/index/card/meta.png') }}" alt="" width="100" />
                        <div class="fs-4 nt-fw-500">واقعیت مجازی</div>
                        <div class="text-body-secondary">VR headset</div>
                    </a></div>
                <!-- slide-->
                <div class="swiper-slide h-auto"><a
                        class="h-100 link-body-emphasis nt-flex-column-center-center border bg-body rounded-5 p-3"
                        href="#"><img src="{{ asset('assets/img/pages/index/card/phone.png') }}" alt="" width="100" />
                        <div class="fs-4 nt-fw-500">گوشی موبایل</div>
                        <div class="text-body-secondary">Phone</div>
                    </a></div>
                <!-- slide-->
                <div class="swiper-slide h-auto"><a
                        class="h-100 link-body-emphasis nt-flex-column-center-center border bg-body rounded-5 p-3"
                        href="#"><img src="{{ asset('assets/img/pages/index/card/tablet.png') }}" alt="" width="100" />
                        <div class="fs-4 nt-fw-500">تبلت</div>
                        <div class="text-body-secondary">Tablet</div>
                    </a></div>
                <!-- slide-->
                <div class="swiper-slide h-auto"><a
                        class="h-100 link-body-emphasis nt-flex-column-center-center border bg-body rounded-5 p-3"
                        href="#"><img src="{{ asset('assets/img/pages/index/card/console.png') }}" alt="" width="100" />
                        <div class="fs-4 nt-fw-500">کنسول</div>
                        <div class="text-body-secondary">Console</div>
                    </a></div>
                <!-- slide-->
                <div class="swiper-slide h-auto"><a
                        class="h-100 link-body-emphasis nt-flex-column-center-center border bg-body rounded-5 p-3"
                        href="#"><img src="{{ asset('assets/img/pages/index/card/meta.png') }}" alt="" width="100" />
                        <div class="fs-4 nt-fw-500">واقعیت مجازی</div>
                        <div class="text-body-secondary">VR headset</div>
                    </a></div>
            </div>
        </div>
    </section>
    <!-- cols-->
    <section class="container-fluid wrapper mb-5">
        <div class="row g-4">
            <div class="col-12 col-md-6"><a href="#"> <img class="rounded-5"
                        src="{{ asset('assets/img/pages/index/2cols/1.jpg') }}" alt="" /></a></div>
            <div class="col-12 col-md-6"><a href="#"> <img class="rounded-5"
                        src="{{ asset('assets/img/pages/index/2cols/2.jpg') }}" alt="" /></a></div>
            <div class="col-6 col-md-3"><a href="#"> <img class="rounded-5"
                        src="{{ asset('assets/img/pages/index/cards/1.jpg') }}" alt="" /></a></div>
            <div class="col-6 col-md-3"><a href="#"> <img class="rounded-5"
                        src="{{ asset('assets/img/pages/index/cards/2.jpg') }}" alt="" /></a></div>
            <div class="col-6 col-md-3"><a href="#"> <img class="rounded-5"
                        src="{{ asset('assets/img/pages/index/cards/3.jpg') }}" alt="" /></a></div>
            <div class="col-6 col-md-3"><a href="#"> <img class="rounded-5"
                        src="{{ asset('assets/img/pages/index/cards/4.jpg') }}" alt="" /></a></div>
        </div>
    </section>

@endsection

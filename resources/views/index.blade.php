@extends('app.layouts.master')

@section('title', 'صفحه اصلی')

@section('content')


    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    
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


    <!-- most viewed products section-->
    <section class="container-fluid wrapper mt-5 mb-5">
        <div class="index-offer py-4">
            <div class="index-offer-bg" style="background-color: var(--bs-primary)"></div>
            <header class="nt-flex gap-4 p-3">
                <div class="nt-flex-column gap-4">
                    <div class="fs-2 nt-fw-500 text-light text-nowrap">محصولات پربازدید</div>
                </div>
            </header>
            <div class="swiper px-5 py-5"
                data-swiper-options="{ &quot;freeMode&quot;:true, &quot;spaceBetween&quot;:15, &quot;slidesPerView&quot;:&quot;auto&quot; }"
                style="--swiper-theme-color: var(--bs-dark);">
                <!-- wrapper-->
                <div class="swiper-wrapper">
                    <!-- slide-->
                    @foreach($mostViewedProducts as $mostViewedProduct)
                    <div class="swiper-slide h-auto" style="max-width:13rem">
                        <a class="card h-100 rounded-4 px-2 py-4"
                            href="{{ route('product.show', [$mostViewedProduct, $mostViewedProduct->slug]) }}"><img class="card-img-top"
                                src="{{ $mostViewedProduct->image }}" alt="{{ $mostViewedProduct->name }}" />
                            <div class="card-body">
                                <div class="card-title lh-lg nt-clamp-2">
                                    {{ $mostViewedProduct->name }}
                                </div>
                                <div class="card-text"></div>
                            </div>
                            <div class="card-footer bg-transparent border-0">
                                <div class="nt-fw-bold" dir="ltr">
                                    <div class="nt-flex-start-center gap-1">
                                        <div class="small">تومان</div>
                                        <div class="fs-5">{{ number_format($mostViewedProduct->price) }}</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach

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
                    @foreach($discountProducts as $discountProduct)
                    <div class="swiper-slide h-auto" style="max-width:13rem">
                        <a class="card h-100 rounded-4 px-2 py-4"
                            href="{{ route('product.show', [$discountProduct, $discountProduct->slug]) }}"><img class="card-img-top" src="{{ $discountProduct->image }}"
                                alt="{{ $discountProduct->name }}" />
                            <div class="card-body">
                                <div class="card-title lh-lg nt-clamp-2">
                                    {{ $discountProduct->name }}
                                </div>
                                <div class="card-text"></div>
                            </div>
                            <div class="card-footer bg-transparent border-0">
                                <div class="nt-flex-between-center mb-2">
                                    <div class="badge bg-danger text-light rounded-pill">{{ $discountProduct->discount_percent }}٪</div>
                                    <div class="nt-fw-500 text-body-tertiary nt-flex-start-center gap-1">
                                        <div class="text-decoration-line-through">{{ number_format($discountProduct->price) }}</div>
                                        <div class="small">تومان</div>
                                    </div>
                                </div>
                                <div class="nt-fw-bold" dir="ltr">
                                    <div class="nt-flex-start-center gap-1">
                                        <div class="small">تومان</div>
                                        <div class="fs-5">{{ number_format($discountProduct->off_price) }}</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
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
            @foreach($productCategories as $productCategory)
            <div class="col-12 col-md-6 col-lg-4">
                <a class="index-buttonLink btn btn-light" href="#">
                    <div class="nt-flex-column">
                        <div class="fs-4 nt-fw-bold mb-4">پرفروش ترین های</div>
                        <div class="nt-flex-start-center mb-3"><i class="ti ti-caret-left-filled fs-3 text-primary"></i>
                            <div class="fs-2">{{ $productCategory->name }}</div>
                        </div>
                        <div class="nt-flex-start-center">
                            <div class="btn btn-lg btn-primary rounded-5" style="border-top-right-radius: 0 !important">
                                <div class="fs-6">خرید</div><i class="ti ti-arrow-left fs-5"></i>
                            </div>
                        </div>
                    </div><img src="https://picsum.photos/id/237/125" alt="" width="125" />
                </a>
            </div>
            @endforeach
        </div>
    </section>

    <!-- tags slider-->
    <section class="container-fluid wrapper mb-5">
        <div class="swiper py-5 px-1"
            data-swiper-options="{ &quot;loop&quot;:true, &quot;autoplay&quot;:{&quot;delay&quot;: 3000}, &quot;speed&quot;:1000, &quot;slidesPerView&quot;:1, &quot;spaceBetween&quot;:30, &quot;breakpoints&quot;:{ &quot;480&quot;:{&quot;slidesPerView&quot;:3},&quot;640&quot;:{&quot;slidesPerView&quot;:6},&quot;720&quot;:{&quot;slidesPerView&quot;:8} } }">
            <div class="swiper-wrapper">
                <!-- slide-->
                @foreach($tags as $tag)
                <div class="swiper-slide h-auto">
                    <a
                        class="h-100 link-body-emphasis nt-flex-column-center-center border bg-body rounded-5 p-3"
                        href="#">
                        <div class="fs-4 nt-fw-500">{{ $tag->name }}</div>
                    </a>
                </div>
                @endforeach
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

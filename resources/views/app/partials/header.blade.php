<!-- ============================ Offcanvas Menu ============================-->
<div class="offcanvas offcanvasMain offcanvas-start" id="offcanvasMain" tabindex="-1" aria-labelledby="offcanvasMainLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasMainLabel"></h5>
        <button class="btn-close" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-0">
        <!-- search-->
        <div class="px-4 py-2">
            <form class="header-search" action="{{ route('search') }}" method="GET">
                <div class="input-group header-search-group">
                    <input class="form-control form-control-lg" type="text" name="search"
                        placeholder="جستجو کنید ..." />
                    <button class="btn btn-lg btn-light" type="submit"> <i class="ti ti-search fs-2"></i></button>
                </div>
            </form>
        </div>
        <!---->
        <ul class="list-unstyled nt-flex-column bg-body rounded-4 py-4 px-2">
            <!-- item-->
            @foreach ($menus as $menu)
            <li class="w-100">
                <a class="nt-flex-start-center text-body-emphasis py-2 px-3" href="{{ url($menu->url) }}">
                    {{ $menu->name }}
                </a>
            </li>
            @endforeach
        </ul>
        <!---->
        <div class="accordion accordion-flush" id="accordionFlushExample">
            @foreach($productCategories as $productCategory)
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapse{{$productCategory->id}}" aria-expanded="false"
                        aria-controls="flush-collapse{{$productCategory->id}}">{{ $productCategory->name }}</button>
                </h2>
                <div class="accordion-collapse collapse" id="flush-collapse{{$productCategory->id}}" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <ul class="offmenu-menu">
                            <!-- submenu title-->
                            <li class="offmenu-menu-item">
                                <h5>جدید ترین محصولات</h5>
                            </li>
                            @foreach($productCategory->products as $product)
                            <!-- submenu item-->
                            <li class="offmenu-menu-item"><a href="{{ route('product.show', [$product, $product->slug]) }}">{{ $product->name }}</a></li>
                            @endforeach

            
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- ========================== end Offcanvas Menu ==========================-->
<!-- ============================ Offcanvas Cart ============================-->
<div class="offcanvas offcanvas-end" id="offcanvasCart" tabindex="-1" aria-labelledby="offcanvasCartLabel">
    <div class="offcanvas-header bg-light-subtle">
        <h5 class="offcanvas-title" id="offcanvasCartLabel">سبد خرید</h5>
        <button class="btn-close" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-0">
        @if(auth()->check() && $cart && $cart->total_price != 0)
        <!-- content-->
        <div class="container-fluid bg-light-subtle">
            <ul class="row p-0 px-2 row-cols-1 g-3 cart">
                @foreach($cart->cartItems as $item)
                <div class="col">
                    <!-- item-->
                    <li class="card p-4">
                        <div class="row g-0">
                            <div class="col-4"><img class="img-fluid rounded"
                                    src="{{ $item->product->image }}" alt="{{ $item->product->name }}" /></div>
                            <div class="col-8">
                                <div class="card-body">
                                    <div class="card-title nt-fw-500 lh-lg">{{ $item->product->name }}</div>
                                </div>
                                <ul class="list-group list-group-flush cart-item-list p-3">
                                    <li class="list-group-item border-0">
                                        <i
                                            class="ti ti-circle-filled border rounded-pill fs-5"
                                            style="color: #f10000">
                                        </i>
                                        فرمت فایل اصلی: {{ substr($item->product->file_type, strpos($item->product->file_type, '/') + 1) }}
                                    </li>
                                    <li class="list-group-item border-0">
                                        <i
                                            class="ti ti-truck-delivery fs-5 text-primary">
                                        </i>
                                        تعداد فروش: {{ $item->product->sold_number }}
                                        
                                    </li>
                                    <li class="list-group-item border-0">
                                        <i
                                            class="ti ti-circle-filled border rounded-pill fs-5"
                                            style="color: #3204d8">
                                        </i>
                                        قیمت محصول: {{ number_format($item->product->price) }}
                                    </li>
                                    @if($item->product->discount_status)
                                    <li class="list-group-item border-0">
                                        <div class="small text-danger">
                                          {{ number_format($item->product->price - $item->product->off_price) }}
                                          تومان تخفیف
                                        </div>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                            <div class="col-4 nt-flex-center-center">
                                <!-- controls-->
                                <div class="cart-counter nt-flex-start-center flex-nowrap border rounded p-1">
                                    <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="cart-counter-minus btn btn-sm btn-link link-danger" type="submit">
                                            <i class="ti ti-trash fs-5"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="nt-flex-start-center p-3">
                                    <div class="fs-4 nt-fw-500">{{ $item->product->discount_status ? number_format($item->product->off_price) : number_format($item->product->price) }}</div>
                                    <div class="small">تومان</div>
                                </div>
                            </div>
                        </div>
                    </li>
                </div>
                @endforeach
            </ul>
        </div>
        <!-- footer-->
        <div class="sticky-bottom nt-flex-between-center bg-body border-top p-4">
            <div class="nt-flex-column">
                <div class="text-body-secondary">مبلغ قابل پرداخت</div>
                <div class="nt-flex-start-center">
                    <div class="nt-fw-500 fs-5">{{ number_format($cartTotalPrice) }}</div>
                    <div class="small">تومان</div>
                </div>
            </div><a class="btn btn-lg btn-danger" href="{{ route('checkout') }}">پرداخت</a>
        </div>
        @else
        <div class="nt-flex-start-center p-3">
            <p class="fs-4 nt-fw-500">
                سبد خرید شما خالی است
            </p>
        </div>
        @endif
    </div>
</div>
<!-- ========================== end Offcanvas Cart ==========================-->
<!-- ================================ Header ================================-->
<header class="header">
    <!-- ============================ header content ============================-->
    <div class="overflow-x-hidden mb-3">
        <div class="wrapper container-fluid">
            <div class="row align-items-center">
                <!-- logo-->
                <div class="col-auto">
                    <div class="header-logo"><a class="btn btn-link link-light" href="{{ route('home') }}"> <i
                                class="ti ti-circle display-1"></i>
                            <div class="nt-flex-column">
                                <h1 class="fs-1 nt-fw-bolder mb-0">نتـیفای</h1>
                                <div class="fs-5 opacity-75" style="letter-spacing: 0.5rem;">Netify</div>
                            </div>
                        </a>
                        <div class="header-logo-br" aria-hidden="true"></div>
                    </div>
                </div>
                <!-- search (tablet & desktop)-->
                <div class="col d-none d-lg-flex">
                    <form class="header-search" action="{{ route('search') }}" method="GET">
                        <div class="input-group header-search-group">
                            <input class="form-control form-control-lg" type="text" name="search"
                                placeholder="جستجو کنید ..." />
                            <button class="btn btn-lg btn-light" type="submit"> <i
                                    class="ti ti-search fs-4"></i></button>
                        </div>
                    </form>
                </div>
                <!-- buttons-->
                <div class="col">
                    <nav class="nt-flex-end-center gap-4">
                        <!-- theme switcher-->
                        <button class="btn btn-lg btn-link header-buttons-link btn-toggle" type="button"><i
                                class="ti ti-moon fs-3"></i>
                            <div class="nt-flex-column gap-0">
                                <div class="small text-body-secondary">حالت</div>
                                <div class="nt-fw-500">تاریک</div>
                            </div>
                        </button>
                        <!-- user (desktop)-->
                        @if(!auth()->check())
                        <a  class="btn btn-lg btn-link header-buttons-link d-none d-lg-flex" href="{{ route('login') }}"><i
                                class="ti ti-user fs-2"></i>
                            <div class="nt-flex-column gap-0">
                                <div class="small text-body-secondary">سلام، وارد شوید به</div>
                                <div class="nt-fw-500">حساب کاربری</div>
                            </div>
                        </a>
                        @else
                        <a  class="btn btn-lg btn-link header-buttons-link d-none d-lg-flex" href="{{ route('user.dashbord.index') }}"><i
                            class="ti ti-user fs-2"></i>
                            <div class="nt-flex-column gap-0">
                                <div class="small text-body-secondary">سلام، خوش آمدید</div>
                                <div class="nt-fw-500">{{ auth()->user()->name }}</div>
                            </div>
                        </a>
                        @endif

                        <!-- panel admin -->
                        @if(auth()->check() && auth()->user()->is_admin)
                        <a href="{{ route('admin.home') }}" class="btn btn-primary btn-sm">
                            پنل ادمین
                        </a>
                        @endif

                        <!-- cart (desktop)-->
                        <button class="btn btn-lg btn-secondary header-cart d-none d-lg-flex" type="button"
                            data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart"
                            aria-controls="offcanvasCart"><i class="ti ti-shopping-cart fs-1"></i>
                            <div class="nt-flex-center-center gap-3">
                                <div class="nt-fw-500">سبد</div>
                                <div class="badge bg-light text-dark">{{ $cartItemCount }}</div>
                            </div>
                        </button>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================== header nav ==============================-->
    <div class="header-nav">
        <!-- header nav (desktop) =========================-->
        <div class="header-nav-container wrapper d-none d-md-flex">
            <!-- header nav categories-->
            <div class="header-megamenu"><a class="btn btn-link header-megamenu-button" href="#"><i
                        class="ti ti-category-2 fs-3"></i>
                    <div class="nt-fw-bolder">دسته بندی ها</div>
                </a>
                <div class="header-megamenu-dropdown">
                    <ul class="header-megamenu-list">
                        @foreach($productCategories as $productCategory)
                        <li class="header-megamenu-subitem active"><a class="header-megamenu-sublink"
                                href="{{ route('search', ['product-category' => $productCategory->name]) }}">{{ $productCategory->name }}</a>
                            <ul class="header-megamenu-sublist">
                                <div class="row g-0">
                                    <div class="col-12"><a class="header-megamenu-suball" href="{{ route('search', ['product-category' => $productCategory->name]) }}">
                                            همه محصولات
                                            {{ $productCategory->name }}</a></div>
                                    <div class="col-4">
                                        <li>
                                            <h5 class="header-megamenu-title">جدید ترین محصولات</h5>
                                        </li>
                                        @foreach ($productCategory->products as $product)
                                            <li><a class="link-body-emphasis" href="{{ route('product.show', [$product, $product->slug]) }}">{{ $product->name }}</a></li>
                                        @endforeach
                                        
                                    </div>
                                </div>
                            </ul>
                        </li>
                        @endforeach

                    </ul>
                </div>
            </div>
            <!-- header nav menu-->
            <div class="flex-grow-1 nt-flex-between-center">
                <nav class="nt-flex-start-center gap-3">
                    @foreach($menus as $menu)
                    <a class="btn btn-link link-body-emphasis" href="{{ $menu->url }}">
                        <div class="nt-fw-500">{{ $menu->name }}</div>
                    </a>
                    @endforeach
                </nav>
            </div>
        </div>
        <!-- header nav (mobile) =========================-->
        <div class="header-nav-container wrapper d-md-none">
            <nav class="nt-flex-start-center flex-nowrap text-nowrap overflow-x-auto py-2">
                @foreach ($menus as $menu)
                <a class="btn btn-light rounded-pill" href="{{ $menu->url }}">
                    {{ $menu->name }}    
                </a>
                @endforeach
            </nav>
        </div>
    </div>
</header>
<!-- ============================== end Header ==============================-->

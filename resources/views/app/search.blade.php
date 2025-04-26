@extends('app.layouts.master')

@section('title', 'صفحه جست و جو')

@section('styles')
    @parent
    <style>
        .hover-shadow:hover {
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15) !important;
        }

        .transition {
            transition: all 0.3s ease;
        }

        .fixed-image {
            height: 200px;
            /* You can change this height */
            object-fit: cover;
        }
    </style>
@endsection



@section('content')

    <!-- start body -->
    <section>
        <section id="main-body-two-col" class="container-xxl py-4">
            <section class="row">
                <!-- Sidebar -->
                <aside id="sidebar" class="col-md-3">
                    <form action="{{ route('search') }}" method="GET">
                        <!-- Search -->
                        <section class="bg-white p-4 rounded-3 shadow-sm mb-4">
                            <section class="d-flex justify-content-between align-items-center mb-3">
                                <h2 class="h5 mb-0">جستجو در نتایج</h2>
                            </section>
                            <input type="text" name="search" class="form-control"
                                placeholder="جستجو بر اساس نام، برند ...">
                        </section>

                        <!-- Price Range -->
                        <section class="bg-white p-4 rounded-3 shadow-sm mb-4">
                            <section class="d-flex justify-content-between align-items-center mb-3">
                                <h2 class="h5 mb-0">محدوده قیمت</h2>
                            </section>
                            <div class="d-flex gap-2">
                                <input type="text" name="start-price" class="form-control" placeholder="قیمت از ...">
                                <input type="text" name="end-price" class="form-control" placeholder="قیمت تا ...">
                            </div>
                        </section>

                        <!-- Check box -->
                        <section class="bg-white p-4 rounded-3 shadow-sm mb-4">
                            <section class="d-flex justify-content-between align-items-center mb-3">
                                <h2 class="h5 mb-0">چک باکس</h2>
                            </section>
                            <div class="d-flex gap-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="marketable" value="1" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                      فقط کالای های موجود
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="image-products" value="1" id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                      فقط کالاهای عکس دار
                                    </label>
                                  </div>
                            </div>
                        </section>

                        <!-- Filter Button -->
                        <section class="bg-white p-4 rounded-3 shadow-sm mb-4">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-danger">اعمال فیلتر</button>
                            </div>
                        </section>
                    </form>
                </aside>

                <!-- Main Content -->
                <main id="main-body" class="col-md-9">
                    <section class="bg-white p-4 rounded-3 shadow-sm mb-4">
                        <!-- Filters -->
                        <div class="mb-4">
                            <div class="d-flex flex-wrap gap-2">
                                <span class="badge bg-light text-dark border p-2">نتیجه جستجو برای : <span
                                        class="badge bg-info text-dark">{{ request('search') ?? 'خالی' }}</span></span>
                                <span class="badge bg-light text-dark border p-2">دسته : <span
                                        class="badge bg-info text-dark">{{ request('product-category') ?? 'خالی' }}</span></span>
                                <span class="badge bg-light text-dark border p-2">قیمت از : <span
                                        class="badge bg-info text-dark">{{ number_format(request('start-price')) }} تومان</span></span>
                                <span class="badge bg-light text-dark border p-2">قیمت تا : <span
                                        class="badge bg-info text-dark">{{ number_format(request('end-price')) }} تومان</span></span>
                            </div>
                        </div>

                        <!-- Sort Buttons -->
                        <div class="mb-5">
                            <span>مرتب سازی بر اساس :</span>
                            <div class="btn-group btn-group-sm ms-2" role="group">
                                <a href="{{ route('search', array_merge(request()->except('sort'), ['sort' => 'newest'])) }}" class="btn {{ request('sort') == 'newest' ? 'btn-info' : 'btn-light' }} text-dark">جدیدترین</a>
                                <a href="{{ route('search', array_merge(request()->except('sort'), ['sort' => 'expensive'])) }}" class="btn {{ request('sort') == 'expensive' ? 'btn-info' : 'btn-light' }}">گران ترین</a>
                                <a href="{{ route('search', array_merge(request()->except('sort'), ['sort' => 'cheap'])) }}" class="btn {{ request('sort') == 'cheap' ? 'btn-info' : 'btn-light' }}">ارزان ترین</a>
                                <a href="{{ route('search', array_merge(request()->except('sort'), ['sort' => 'most-viewed'])) }}" class="btn {{ request('sort') == 'most-viewed' ? 'btn-info' : 'btn-light' }}">پربازدیدترین</a>
                                <a href="{{ route('search', array_merge(request()->except('sort'), ['sort' => 'sold-number'])) }}" class="btn {{ request('sort') == 'sold-number' ? 'btn-info' : 'btn-light' }}">پرفروش ترین</a>
                            </div>
                        </div>

                        <!-- Products -->

                        <div class="d-flex flex-wrap gap-4">
                            @forelse ($products as $product)
                                <a href="{{ route('product.show', [$product, $product->slug]) }}">
                                    <div class="card shadow-sm hover-shadow transition d-flex flex-column"
                                        style="width: 16rem;">
                                        <img src="{{ $product->image }}" class="card-img-top fixed-image"
                                            alt="{{ $product->name }}">
                                        <div class="card-body d-flex flex-column justify-content-between text-center">
                                            <h5 class="card-title small mb-2">{{ $product->name }}</h5>
                                            @if(!$product->discount_status)
                                            <p class="card-text fw-bold text-primary">{{ number_format($product->price) }}
                                                تومان</p>
                                            @endif
                                        </div>
                                        @if($product->discount_status)
                                        <div class="card-footer bg-transparent border-0">
                                            <div class="nt-flex-between-center mb-2">
                                                <div class="badge bg-danger text-light rounded-pill">{{ $product->discount_percent }}٪</div>
                                                <div class="nt-fw-500 text-body-tertiary nt-flex-start-center gap-1">
                                                    <div class="text-decoration-line-through">{{ number_format($product->price) }}</div>
                                                    <div class="small">تومان</div>
                                                </div>
                                            </div>
                                            <div class="nt-fw-bold" dir="ltr">
                                                <div class="nt-flex-start-center gap-1 text-primary">
                                                    <div class="small">تومان</div>
                                                    <div class="fs-5">{{ number_format($product->off_price) }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </a>
                            @empty
                            <div>
                                <p class="fw-bold text-primary text-center">محصولی یافت نشد</p>
                            </div>
                            @endforelse
                        </div>


                        <!-- Pagination -->
                        <div class="d-flex justify-content-center my-5">
                            {{ $products->links() }}
                        </div>

                    </section>
                </main>
            </section>
        </section>
    </section>
    <!-- end body -->



@endsection

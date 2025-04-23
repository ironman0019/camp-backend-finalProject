@extends('app.layouts.master')


@section('title', 'دانلود فایل')

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
                                    <div class="fs-4 nt-fw-bold">دانلود فایل</div>
                                </div>
                            </div>
                            <!---->
                            <div class="rounded bg-body">

                                <!-- lists-->
                                <section class="px-5 mb-5 mt-5">
                                    <!-- cart list-->
                                    <ul class="list-group cart">
                                        <!-- cart item-->
                                        
                                        <li class="list-group-item cart-item">
                                            <div class="cart-item-side"><img class="img-fluid rounded"
                                                    src="{{ $product->image }}" alt="{{ $product->name }}" /></div>
                                            <div class="cart-item-content">
                                                <div class="cart-item-title">{{ $product->name }}</div>
                                                <ul class="list-group list-group-flush cart-item-list">
                                                    <li class="list-group-item"><i
                                                            class="ti ti-circle-filled border rounded-pill fs-5"
                                                            style="color: #6c03ce"></i>دسته بندی: {{ $product->productCategory->name }}
                                                    </li>
                                                    <li class="list-group-item"><i
                                                        class="ti ti-circle-filled border rounded-pill fs-5"
                                                        style="color: #6c03ce"></i>نوع فایل: {{ substr($product->file_type, strpos($product->file_type, '/') + 1)}}
                                                    </li>
                                                    <li class="list-group-item"><i
                                                    class="ti ti-circle-filled border rounded-pill fs-5"
                                                    style="color: #6c03ce"></i>اسم فایل: {{ $product->file_original_name }}
                                                    </li>
                                                    
                                                </ul>
                                                
                                                <div class="card-footer bg-transparent border-0">
                                                    <a href="{{ URL::signedRoute('download-file', ['product', $product->id, $order]) }}" class="btn btn-primary w-100">
                                                        دانلود
                                                    </a>
                                                </div>
                                                
                                            </div>
                                        </li>

                                        @if($product->productItems)
                                        @foreach ($product->productItems as $productItem)
                                        <li class="list-group-item cart-item">
                                            <div class="cart-item-side"><img class="img-fluid rounded"
                                                    src="{{ asset('assets/img/Lorem ipsum.jpg') }}" alt="" /></div>
                                            <div class="cart-item-content">
                                                <div class="cart-item-title">{{ $productItem->file_original_name }}</div>
                                                <ul class="list-group list-group-flush cart-item-list">
                                                    <li class="list-group-item"><i
                                                        class="ti ti-circle-filled border rounded-pill fs-5"
                                                        style="color: #6c03ce"></i>نوع فایل: {{ substr($productItem->file_type, strpos($productItem->file_type, '/') + 1)}}
                                                    </li>
                                                    <li class="list-group-item"><i
                                                    class="ti ti-circle-filled border rounded-pill fs-5"
                                                    style="color: #6c03ce"></i>اسم فایل: {{ $productItem->file_original_name }}
                                                    </li>
                                                    <li class="list-group-item"><i
                                                        class="ti ti-circle-filled border rounded-pill fs-5"
                                                        style="color: #6c03ce"></i>فایل های اضافه متعلق به: {{ $productItem->product->name }}
                                                    </li>
                                                    
                                                </ul>
                                                
                                                <div class="card-footer bg-transparent border-0">
                                                    <a href="{{ URL::signedRoute('download-file', ['productItem', $productItem->id, $order]) }}" class="btn btn-primary w-100">
                                                        دانلود
                                                    </a>
                                                </div>
                                                
                                            </div>
                                        </li>
                                        @endforeach
                                        @endif
                                        
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

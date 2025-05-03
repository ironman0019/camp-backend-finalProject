@extends('app.layouts.master')


@section('title', 'محصولات مورد علاقه کاربر')

@section('content')


<main class="main">                                                              
    @include('app.user-dashbord.partials.dashbord-sidebar-ofcanvas')

    <div class="profile">
      <div class="container py-5">
        <div class="row g-4">
            @include('app.user-dashbord.partials.dashbord-sidebar')
          <div class="col-12 col-md-9">
            <div class="bg-body border rounded p-5">
                <!-- header-->
                <div class="nt-flex-start-center gap-4 mb-5"><a class="btn btn-light" href="{{ route('user.dashbord.index') }}"><i class="ti ti-arrow-narrow-right fs-3"></i>بازگشت به داشبورد</a>
                  <div class="fs-4 nt-fw-500">جزئیات لیست</div>
                </div>
                <!-- title-->
                <div class="lists-title">
                  <div class="nt-flex-column gap-4">
                    <div class="fs-5 nt-fw-500">محصولات مورد علاقه</div>
                  </div>
                </div>
                <!---->
                <div class="container-fluid">
                  <div class="row g-4 row-cols-1 row-cols-sm-3 row-cols-md-4">
                    <!-- item-->
                    @forelse($products as $product)
                    <div class="col">
                      <div class="card h-100 px-3 py-4">
                        <div class="card-header border-0 bg-transparent nt-flex-between-center">
                          <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="ti ti-dots-vertical fs-5"></i></button>
                            <ul class="dropdown-menu">
                              <li>
                                <form action="{{ route('user.dashbord.remove-from-favourite', $product) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="icon-link dropdown-item" type="submit"><i class="ti ti-trash fs-5"></i>حذف از لیست</button>
                                </form>
                              </li>
                            </ul>
                          </div>
                        </div><img class="card-img-top" src="{{ $product->image }}" alt="{{ $product->name }}"/><a class="card-body link-body-emphasis link-opacity-75-hover" href="#">
                          <div class="card-title nt-clamp-3 nt-fw-500 lh-lg">{{ $product->name }}</div></a>
                        <div class="card-footer border-0 bg-transparent">
                          <div class="nt-flex-end-center nt-fw-700">
                            <div class="fs-4">{{ number_format($product->price) }}</div>
                            <div class="small">تومان</div>
                          </div>
                        </div>
                      </div>
                    </div>
                    @empty
                    <div class="nt-flex-column-center-center gap-3 p-5"><i class="ti ti-folder-exclamation display-1 opacity-50"></i>
                        <div class="fs-5 nt-fw-500 lh-lg">لیست شما خالی است.</div>
                    </div>
                    @endforelse
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </main>




@endsection

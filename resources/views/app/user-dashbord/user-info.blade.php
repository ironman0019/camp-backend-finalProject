@extends('app.layouts.master')


@section('title', 'اطلاعات کاربر')

@section('content')



    <main class="main">
        @include('app.user-dashbord.partials.dashbord-sidebar-ofcanvas')
        <div class="profile">
            <div class="container py-5">
              <div class="row g-4">
                <!-- sidebar-->
                @include('app.user-dashbord.partials.dashbord-sidebar')
                <div class="col-12 col-md-9">
                  <!-- content-->
                  <div class="row g-3 mb-4">
                    @foreach ($selectedAttributes as $label => $value)
                    <div class="col-12 col-md-6">
                      <div class="h-100 nt-flex-between-end flex-nowrap bg-body bg-body border rounded p-5">
                        <div class="nt-flex-column gap-4">
                          <div class="nt-flex gap-4">
                            <div class="fs-5 text-body-tertiary">{{ $label }}</div>
                          </div>
                          <div class="fs-5 nt-fw-bold">{{ $value }}</div>
                        </div>
                      </div>
                    </div>
                    @endforeach
                </div>
              </div>
            </div>
          </div>
    </main>


@endsection


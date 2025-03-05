<!DOCTYPE html >
<html lang="fa" dir="rtl" data-bs-theme="light">
  
<!-- Mirrored from www.netthemes.ir/html/netify/dist/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 04 Mar 2025 20:07:14 GMT -->
<head>
    @include('app.layouts.head-tag')
  </head>
  <body>

    @include('app.partials.header')

    <!-- ========================================================================-->
    <!--                                   Page                                  -->
    <!-- ========================================================================-->
    <div class="page">
      <!-- ================================= Main =================================-->
      <main class="main">                                                              
        @yield('content')
      </main>
      <!-- =============================== end Main ===============================-->

        @include('app.partials.footer')


      <!-- ============================== Nav mobile ==============================-->
      <!-- mobile Nav (mobile)-->
      <div class="mobileNav d-md-none text-bg-dark shadow-sm">
        <nav class="w-100 nt-flex-between-center px-2">
          <!-- search-->
          <button class="btn btn-dark rounded-pill active" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMain" aria-controls="offcanvasMain"> <i class="ti ti-list-search fs-1"></i>
            <div class="px-2">منو و جستجو</div>
          </button>
          <!-- home-->
          <button class="btn btn-dark rounded-pill" type="button"> <i class="ti ti-home fs-1"></i></button>
          <!-- user-->
          <button class="btn btn-dark rounded-pill" type="button"> <i class="ti ti-user fs-1"></i></button>
          <!-- cart-->
          <button class="btn btn-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart" aria-controls="offcanvasCart"> <i class="ti ti-shopping-cart fs-1"></i></button>
        </nav>
      </div>
      <!-- ============================ end Nav mobile ============================-->
    </div>
    <!-- ========================================================================-->
    <!--                                 end Page                                -->
    <!-- ========================================================================-->
    <!-- ================================ scripts ===============================-->
    @include('app.layouts.scripts')
  </body>

<!-- Mirrored from www.netthemes.ir/html/netify/dist/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 04 Mar 2025 20:09:01 GMT -->
</html>
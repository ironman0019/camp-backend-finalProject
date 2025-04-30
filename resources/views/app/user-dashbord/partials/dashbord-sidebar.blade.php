<div class="col-12 col-md-3">
    <!-- sidebar-->
    <aside class="profile-sidebar">
        <!-- header-->
        <header class="profile-sidebar-header text-bg-primary bg-gradient">
            <div class="nt-flex-start-center gap-4 mb-4">
                <!-- avatar-->
                <div class="profile-sidebar-avatar"><img src="{{ asset(auth()->user()->profile_image) }}" alt=""
                        width="75" /></div>
                <div class="nt-flex-column">
                    <!-- name-->
                    <div class="fs-4 nt-fw-bold">{{ auth()->user()->name }}</div>
                    <!-- number-->
                    <div class="text-light">{{ auth()->user()->mobile ? auth()->user()->mobile : auth()->user()->email }}</div>
                    <!-- edit--><a class="btn btn-sm btn-light" href="{{ route('user.profile.edit', auth()->user()->id) }}"><i
                            class="ti ti-user-edit fs-5"></i>ویرایش حساب</a>
                </div>
            </div>
            <ul class="list-group w-100">
                <!-- wallet-->
                <li class="list-group-item nt-flex-between-start">
                    <div class="nt-flex-column py-1">
                        <div class="text-body-emphasis nt-flex nt-fw-500 mb-2"><i
                                class="ti ti-wallet fs-4 text-primary"></i>کیف پول</div><a
                            class="icon-link icon-link-hover small" href="#">افزایش موجودی<i
                                class="ti ti-chevron-left bi"></i></a>
                    </div>
                    <div class="nt-flex">
                        <div class="text-body-emphasis nt-flex-start-center py-1">
                            <div class="nt-fw-500">۰</div>
                            <div class="small">تومان</div>
                        </div>
                    </div>
                </li>
            </ul>
        </header>
        <!-- mobile nav-->
        <div class="d-grid d-lg-none p-4">
            <button class="btn btn-lg btn-light" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasUserNav" aria-controls="offcanvasUserNav"><i
                    class="ti ti-menu-2 fs-2"></i>
                <div class="nt-fw-500">منو پروفایل</div>
            </button>
        </div>
        <div class="d-none d-lg-block">
            <!-- sidebar nav-->
            <nav class="profile-sidebar-nav bg-body"><a
                    class="btn btn-lg nt-fw-500 profile-sidebar-link {{ Route::is('user.dashbord.index') ? 'active' : '' }}"  href="{{ route('user.dashbord.index') }}"><i
                        class="ti ti-home-2 fs-3"></i>خلاصه فعالیت ها</a><a
                    class="btn btn-lg nt-fw-500 profile-sidebar-link {{ Route::is('user.dashbord.user-orders') ? 'active' : '' }}" href="{{ route('user.dashbord.user-orders') }}"><i
                        class="ti ti-shopping-bag fs-3"></i>سفارش ها</a><a
                    class="btn btn-lg nt-fw-500 profile-sidebar-link" href="user-lists.html"><i
                        class="ti ti-heart fs-3"></i>لیست های من</a><a
                    class="btn btn-lg nt-fw-500 profile-sidebar-link {{ Route::is('user.dashbord.user-comments') ? 'active' : '' }}" href="{{ route('user.dashbord.user-comments') }}"><i
                        class="ti ti-message fs-3"></i>دیدگاه ها</a><a
                    class="btn btn-lg nt-fw-500 profile-sidebar-link {{ Route::is('user.dashbord.ticket.index') ? 'active' : '' }}" href="{{ route('user.dashbord.ticket.index') }}"><i
                        class="ti ti-ticket fs-3"></i>تیکت ها</a><a
                    class="btn btn-lg nt-fw-500 profile-sidebar-link {{ Route::is('user.dashbord.user-info') ? 'active' : '' }}" href="{{ route('user.dashbord.user-info') }}"><i
                        class="ti ti-user fs-3"></i>اطلاعات حساب کاربری</a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button
                            class="btn btn-lg nt-fw-500 profile-sidebar-link" type="submit"><i
                                class="ti ti-logout fs-3"></i>خروج</button>
                        </form>
            </nav>
        </div>
    </aside>
</div>
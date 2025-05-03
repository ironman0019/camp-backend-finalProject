<div class="offcanvas offcanvas-bottom" id="offcanvasUserNav" tabindex="-1" aria-labelledby="offcanvasUserNavLabel"
style="--bs-offcanvas-height:75vh">
<div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasUserNavLabel">منو پروفایل</h5>
    <button class="btn-close" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
</div>
<div class="offcanvas-body p-0">
    <nav class="h-100 profile-sidebar-nav bg-light-subtle p-3 rounded-bottom-4"><a
            class="btn btn-lg nt-fw-500 profile-sidebar-link {{ Route::is('user.dashbord.index') ? 'active' : '' }}" href="{{ route('user.dashbord.index') }}"><i
                class="ti ti-home-2 fs-3"></i>خلاصه فعالیت ها</a><a
            class="btn btn-lg nt-fw-500 profile-sidebar-link {{ Route::is('user.dashbord.user-orders') ? 'active' : '' }}" href="{{ route('user.dashbord.user-orders') }}"><i
                class="ti ti-shopping-bag fs-3"></i>سفارش ها</a><a
            class="btn btn-lg nt-fw-500 profile-sidebar-link {{ Route::is('user.dashbord.user-favourites') ? 'active' : '' }}" href="{{ route('user.dashbord.user-favourites') }}"><i
                class="ti ti-heart fs-3"></i>لیست های من</a><a class="btn btn-lg nt-fw-500 profile-sidebar-link {{ Route::is('user.dashbord.user-comments') ? 'active' : '' }}"
            href="{{ route('user.dashbord.user-comments') }}"><i class="ti ti-message fs-3"></i>دیدگاه ها</a><a
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
</div>
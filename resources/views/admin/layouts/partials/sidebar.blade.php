<aside id="sidebar" class="sidebar">
    <section class="sidebar-container">
        <section class="sidebar-wrapper">

            <a href="{{ route('admin.') }}" class="sidebar-link">
                <i class="fas fa-home"></i>
                <span>خانه</span>
            </a>

            <section class="sidebar-part-title">بخش فروشگاه</section>

            <a href="#" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>دسته ها</span>
            </a>


            <a href="#" class="sidebar-link">
                <i class="fas fa-box"></i>
                <span>محصولات</span>
            </a>

            <a href="{{ route('admin.market.tag.index') }}" class="sidebar-link">
                <i class="fas fa-tag"></i>
                <span>تگ ها</span>
            </a>

            <a href="#" class="sidebar-link">
                <i class="fas fa-dollar-sign"></i>
                <span>تخفیفات</span>
            </a>


            <a href="#" class="sidebar-link">
                <i class="fas fa-credit-card"></i>
                <span>پرداخت ها</span>
            </a>

            <section class="sidebar-part-title">بخش تیکت ها</section>

            <a href="{{ route('admin.tickets.ticket-category.index') }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>دسته بندی تیکت ها</span>
            </a>

            <a href="{{ route('admin.tickets.ticket.index') }}" class="sidebar-link">
                <i class="fas fa-ticket-alt"></i>
                <span>تیکت ها</span>
            </a>

            <section class="sidebar-part-title">بخش محتوی</section>


            <a href="#" class="sidebar-link">
                <i class="fas fa-question"></i>
                <span>سوالات متداول</span>
            </a>


            <a href="#" class="sidebar-link">
                <i class="fas fa-comment"></i>
                <span>کامنت ها</span>
            </a>

            <a href="#" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>منو ها</span>
            </a>

            <a href="#" class="sidebar-link">
                <i class="fas fa-chalkboard"></i>
                <span>بنر های اصلی</span>
            </a>


            <section class="sidebar-group-link">
                <section class="sidebar-dropdown-toggle">
                    <i class="fas fa-chart-bar icon"></i>
                    <span>نوشته ها</span>
                    <i class="fas fa-angle-left angle"></i>
                </section>
                <section class="sidebar-dropdown">
                    <a href="#">مقالات</a>
                    <a href="#">پست ها</a>
                    <a href="#">دوره ها</a>
                </section>
            </section>

            <section class="sidebar-part-title">بخش کاربران</section>

            <section class="sidebar-group-link">
                <section class="sidebar-dropdown-toggle">
                    <i class="fas fa-users icon"></i>
                    <span>کاربران</span>
                    <i class="fas fa-angle-left angle"></i>
                </section>
                <section class="sidebar-dropdown">
                    <a href="#">ادمین</a>
                    <a href="#">مدرس ها</a>
                    <a href="#">دانشجو </a>
                </section>
            </section>

            <section class="sidebar-part-title">بخش تنظیمات</section>

            <section class="sidebar-group-link">
                <section class="sidebar-dropdown-toggle">
                    <i class="fas fa-cogs icon"></i>
                    <span>تنظیمات سایت</span>
                    <i class="fas fa-angle-left angle"></i>
                </section>
                <section class="sidebar-dropdown">
                    <a href="#">تنظیمات اصلی</a>
                </section>
            </section>


        </section>
    </section>
</aside>

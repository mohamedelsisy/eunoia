<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class="nav-item {{ request()->routeIs('admin.dashboard*') ? 'active' : '' }}">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="la la-home"></i>
                    <span class="menu-title" data-i18n="nav.add_on_drag_drop.main">الرئيسية </span>
                </a>
            </li>


            <li class="nav-item  {{ request()->routeIs('admin.admins*') ? 'active open' : '' }}">
                <a href=""><i class="la la-user-secret"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> المسؤولين </span>
                    <span class="badge badge badge-info badge-pill float-right mr-2">
                        {{ App\Models\Admin::count() }}
                    </span>
                </a>
                <ul class="menu-content">
                    <li class="">
                        <a class="menu-item" href="{{ route('admin.admins') }}" data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{ route('admin.admins.create') }}" data-i18n="nav.dash.crypto">إضافة   مسؤول جديد </a>
                    </li>
                </ul>
            </li>


            <li class="nav-item  {{ request()->routeIs('admin.categories*') ? 'active open' : '' }}">
                <a href=""><i class="la la-list"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> الأقسام  </span>
                    <span class="badge badge badge-success badge-pill float-right mr-2">
                        {{ App\Models\Category::count() }}
                    </span>
                </a>
                <ul class="menu-content">
                    <li class="">
                        <a class="menu-item" href="{{ route('admin.categories') }}" data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{ route('admin.categories.create') }}" data-i18n="nav.dash.crypto">إضافة قسم  جديد  </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item  {{ request()->routeIs('admin.users*') ? 'active open' : '' }}">
                <a href=""><i class="la la-users"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> المستخدمين  </span>
                    <span class="badge badge badge-primary badge-pill float-right mr-2">
                        {{ App\Models\User::count() }}
                    </span>
                </a>
                <ul class="menu-content">
                    <li class="">
                        <a class="menu-item" href="{{ route('admin.users') }}" data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{ route('admin.users.create') }}" data-i18n="nav.dash.crypto">إضافة مستخدم  جديد  </a>
                    </li>
                </ul>
            </li>


            <li class="nav-item  {{ request()->routeIs('admin.products*') ? 'active open' : '' }}">
                <a href=""><i class="la  la-picture-o"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> المنتجات  </span>
                    <span class="badge badge badge-dark badge-pill float-right mr-2">
                        {{ App\Models\Product::count() }}
                    </span>
                </a>
                <ul class="menu-content">
                    <li class="">
                        <a class="menu-item" href="{{ route('admin.products') }}" data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>

                </ul>
            </li>

            <li class="nav-item  {{ request()->routeIs('admin.comments*') ? 'active open' : '' }}">
                <a href=""><i class="la la-comment"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> التعليقات  </span>
                    <span class="badge badge badge-warning badge-pill float-right mr-2">
                        {{ App\Models\Comment::count() }}
                    </span>
                </a>
                <ul class="menu-content">
                    <li class="">
                        <a class="menu-item" href="{{ route('admin.comments') }}" data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>

                </ul>
            </li>



            <li class="nav-item  {{ request()->routeIs('admin.contacts*') ? 'active' : '' }}">
                <a href="{{ route('admin.contacts') }}">
                    <i class="la la-envelope"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">تذاكر المراسلات   </span>
                    <span class="badge badge badge-danger  badge-pill float-right mr-2">
                        {{ \App\Models\Contact::count() }}
                    </span>
                </a>

            </li>





        </ul>
    </div>
</div>

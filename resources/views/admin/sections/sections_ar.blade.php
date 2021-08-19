<!--- Sidemenu -->
<div id="sidebar-menu">
    <!-- Left Menu Start -->
    <ul class="metismenu list-unstyled" id="side-menu">
        <li class="menu-title">لوحة التحكم</li>
        <li>
            <a href="javascript: void(0);" class="has-arrow">
                <i class="fas fa-users"></i>
                <span> المسؤلين </span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{route('admins.index')}}">عرض الكل</a></li>
                <li><a href="{{route('admins.create')}}">اضافة مسؤول جديد</a></li>
            </ul>
        </li>
        <li>
            <a href="javascript: void(0);" class="has-arrow">
                <i class="fas fa-users"></i>
                <span> الادارات </span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{route('admin-sectors.index')}}">عرض الكل</a></li>
                <li><a href="{{route('admin-sectors.create')}}">اضافة ادارة جديد</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);" class="has-arrow">
                <i class="fas fa-users"></i>
                <span> المديرين </span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{route('admin-managers.index')}}">عرض الكل</a></li>
                <li><a href="{{route('admin-managers.create')}}">اضافة مدير جديد</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);" class="has-arrow">
                <i class="fas fa-school"></i>
                <span> الموظفين </span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{route('admin-employees.index')}}">عرض الكل</a></li>
                <li><a href="{{route('admin-employees.create')}}">اضافة موظف جديد</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);" class="has-arrow">
                <i class="fas fa-blog"></i>
                <span> التقارير </span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{route('admin-reports.index')}}">عرض الكل</a></li>
                <li><a href="{{route('admin-reports.create')}}">اضافة تقرير جديد</a></li>
            </ul>
        </li>
        <li>
            <a href="{{route('evaluations.create')}}">
                <i class="fas fa-address-book"></i>
                <span> تقييم موظف جديد </span>
            </a>

        </li>
        <li>
            <a href="{{ LaravelLocalization::getLocalizedURL('ar') }}">
                <i class="fas fa-language"></i>
                <span> العربية </span>
            </a>

        </li>
        <li>
            <a href="{{ LaravelLocalization::getLocalizedURL('en') }}">
                <i class="fas fa-language"></i>
                <span> الانجليزية </span>
            </a>

        </li>

    </ul>
</div>
<!-- Sidebar -->

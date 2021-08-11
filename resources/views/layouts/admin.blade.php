<!doctype html>
<html lang="en">

<head>
    @if(LaravelLocalization::getCurrentLocale() == 'ar')
        {{-- <style>
            *{
                text-align:right;
                direction:rtl;
                font-size:20px;
                font-weight:bolder
            }
            .vertical-menu{
                right: 11px;
            }
            .list-unstyled {
                padding-right: 0;
                list-style: none;
            }
        </style> --}}
    @endif
    <meta charset="utf-8"/>
    <title>@yield("title", "Ejada")</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @yield('styleChart')
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset("assets/admin/images/icon.png")}}">
    <!-- Bootstrap Css -->
    <link href="{{asset("assets/admin/css/bootstrap.min.css")}}" id="bootstrap-style" rel="stylesheet" type="text/css"/>
    <!-- Icons Css -->
    <link href="{{asset("assets/admin/css/icons.min.css")}}" rel="stylesheet" type="text/css"/>
    <!-- App Css-->
    @yield("style")
    @if(LaravelLocalization::getCurrentLocale() == 'ar')

    <link href="{{asset("assets/admin/css/app-rtl.css")}}" rel="stylesheet" type="text/css"/>
    @else
    <link href="{{asset("assets/admin/css/app.css")}}" rel="stylesheet" type="text/css"/>

    @endif

</head>

<body data-sidebar="dark">

<!-- Loader -->
<div id="preloader">
    <div id="status">
        <div class="spinner"></div>
    </div>
</div>

<!-- Begin page -->
<div id="layout-wrapper">

    <header id="page-topbar">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box">
                    <a href="#" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="{{asset("assets/admin/images/logo_small.jpg")}}" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="{{asset("assets/admin/images/logo.jpg")}}" alt="" height="36">
                        </span>
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect"
                        id="vertical-menu-btn">
                    <i class="mdi mdi-menu"></i>
                </button>

                <div class="d-none d-sm-block ml-2">
                    <h4 class="page-title">@yield("pageTitle")</h4>
                </div>
            </div>

            <div class="d-flex">

                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="rounded-circle header-profile-user" src="{{asset('assets/admin/images/logo.jpg')}}"
                             alt="Header Avatar">
                    </button>
                    <div class="dropdown-menu dropdown-menu-center">
                        <!-- item-->
                        <form action="" method="post">
                            @csrf
                            <input type="submit" value="logout" class="btn btn-danger bx bx-power-off font-size-16 align-middle mr-1">
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- ========== Left Sidebar Start ========== -->
    <div class="vertical-menu">

        <div data-simplebar class="h-100">
            @if(LaravelLocalization::getCurrentLocale() == 'ar')
                @include('admin.sections.sections_ar')
            @else
                @include('admin.sections.sections_en')
            @endif

        </div>
    </div>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->

    @if($errors->any())
        <center><div class="col-sm-12 btn btn-success">{{ implode('', $errors->all()) }}</div></center>
    @endif
    @if(LaravelLocalization::getCurrentLocale() == 'ar')
        <div class="main-content" style="margin-right: 240px; margin-left: 0%">

            <div class="page-content">
                <div class="container-fluid">

                    @yield("content")

                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <footer class="footer" style="left: 0; right: 240px;">
                <div class="container-fluid">
                    <div class="row">

                    </div>
                </div>
            </footer>
        </div>
    @else
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    @yield("content")

                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->


            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">

                    </div>
                </div>
            </footer>
        </div>
    @endif

    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- JAVASCRIPT -->
<script src="{{asset("assets/admin/libs/jquery/jquery.min.js")}}"></script>
<script src="{{asset("assets/admin/libs/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
<script src="{{asset("assets/admin/libs/metismenu/metisMenu.min.js")}}"></script>
<script src="{{asset("assets/admin/libs/simplebar/simplebar.min.js")}}"></script>
<script src="{{asset("assets/admin/libs/node-waves/waves.min.js")}}"></script>

@yield("script")
<script src="{{asset("assets/admin/js/app.js")}}"></script>

</body>
</html>

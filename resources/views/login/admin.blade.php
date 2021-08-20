<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Register | Admiria - Responsive Bootstrap 4 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets/admin/images/favicon.ico')}}">

    <!-- Bootstrap Css -->
    <link href="{{asset('assets/admin/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('assets/admin/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('assets/admin/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
    <script>
        function checkUser(){
            var val = document.getElementById('menu').value;
            if(val === 'admin'){
                window.location.href = '{{route('admin.login')}}';
            }else if(val === 'employee'){
                window.location.href = '{{route('employee.login')}}';
            }else if (val === 'manager'){
                window.location.href = '{{route('manager.login')}}';

            }
        }
    </script>
</head>

<body>

<!-- Loader -->
<div id="preloader"><div id="status"><div class="spinner"></div></div></div>

<!-- Begin page -->
<div class="accountbg" style="background: url('{{asset('assets/admin/images/bg.jpg')}}');background-size: cover;background-position: center;"></div>

<div class="account-pages mt-5 pt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center mt-4">
                            <div class="mb-3">
                                <a href=""><img src="{{asset('assets/admin/images/logo.png')}}" height="30" alt="logo"></a>
                            </div>
                        </div>
                        <div class="p-3" style="text-align:right;direction:rtl">
                            <h4 class="font-size-18 mt-2 text-center">تسجيل الدخول</h4>

                            <form method="POST" action="{{ route('admin.login.submit') }}">
                                @csrf
                                <label for="useremail">نوع المستخدم</label>
                                <div class="form-group">
                                    <select name="type" id="menu" class="form-control" onchange="checkUser()">
                                        <option value="admin">مسئول</option>
                                        <option value="manager">مدير</option>
                                        <option value="employee">موظف</option>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="useremail">البريد الإلكتروني</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="username">كلمة المرور</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>



                                <div class="form-group">
                                    <div class="text-right">
                                        <button class="btn btn-primary w-md waves-effect waves-light" type="submit">تسجيل دخول</button>
                                    </div>
                                </div>


                            </form>

                        </div>

                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

<script>

</script>

<!-- JAVASCRIPT -->
<script src="{{asset('assets/admin/libs/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/admin/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/admin/libs/metismenu/metisMenu.min.js')}}"></script>
<script src="{{asset('assets/admin/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('assets/admin/libs/node-waves/waves.min.js')}}"></script>
<script src="{{asset('assets/admin/js/app.js')}}"></script>

</body>
</html>

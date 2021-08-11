<html lang="en" class="no-js">
<head>
    <title>Ejada</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="{{asset('assets/site/bootstrap-4.5.0-dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/site/css/style.css')}}">
    <!-- Fontawsome style -->
    <link rel="stylesheet" href="{{asset('assets/site/css/all.min.css')}}">

</head>
<body>

<!-- Container -->
<div id="container" class="bb" style="z-index: -1">

    @if($errors->any())
        <center><div class="col-sm-12 btn btn-success">{{ implode('', $errors->all()) }}</div></center>
    @endif
    @if(session()->has('message'))
        <center><div class="col-sm-12 btn btn-success">
                {{ session()->get('message') }}
            </div>
        </center>
    @endif
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif

    @yield('container')


</div>

@extends('site.includes.footer')

<!-- End Container -->

</body>
<script src="{{asset('assets/site/js/jquery-3.4.1.slim.min.js')}}"></script>
<script src="{{asset('assets/site/js/popper.min.js')}}"></script>
<script src="{{asset('assets/site/bootstrap-4.5.0-dist/js/bootstrap.min.js')}}"></script>
<script>

    // $(function () {
    //     $('[data-toggle="popover"]').popover()
    // })




    // $('#exampleModal').on('show.bs.modal', function (event) {
    //     var button = $(event.relatedTarget)
    //     var recipient = button.data('whatever')
    //     var modal = $(this)
    //     // modal.find('.modal-title').text('تواصل معنا ')
    //     modal.find('.modal-body input').val(recipient)
    // })


</script>
</html>

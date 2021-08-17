@extends("layouts.admin")
@section("pageTitle", "Koala Web Libraries")
@section("content")


    @if(LaravelLocalization::getCurrentLocale() == 'ar')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif
                    @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif
                    <h5 class="mb-5 mt-3">تعديل بيانات الادارة</h5>

                    <form method="post" action="{{route('admin-sectors.update',['admin_sector'=>$blog->id])}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">الادارة باللغة العربية</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="example-text-input" name="name_ar" value="{{$blog->name_ar}}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">المدينة</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="example-text-input" name="city" value="{{$blog->city}}" required>
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-dark w-25">تعديل</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endif
@endsection


@section("script")
<script src="{{asset("assets/admin/libs/tinymce/tinymce.min.js")}}"></script>
<script src="{{asset("assets/admin/js/pages/form-editor.init.js")}}"></script>
@endsection

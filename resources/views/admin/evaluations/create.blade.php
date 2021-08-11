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
                    <h5 class="mb-5 mt-3">اضافة سوال جديد</h5>

                    <form method="post" action="{{route('report.question.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">السوال باللغة الانجليزية</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="example-text-input" name="name_en">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">السوال باللغة العربية</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="example-text-input" name="name_ar">
                            </div>
                        </div>

                        <input class="form-control" type="hidden" id="example-text-input" name="report_id" value="{{$id}}">


                        <div class="form-group row">
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-dark w-25">Add</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@else
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
                    <h5 class="mb-5 mt-3">Add New Blog</h5>

                    <form method="post" action="{{route('blogs.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Title In English</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="example-text-input" name="title_en">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Title In Arabic</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="example-text-input" name="title_ar">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Writer</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="example-text-input" name="writer">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="exampleFormControlTextarea1" class="col-sm-2 col-form-label">Description In English</label>
                            <div class="col-sm-10">
                                <textarea id="elm1" class="elm1" name="description_en"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleFormControlTextarea1" class="col-sm-2 col-form-label">Description In Arabic</label>
                            <div class="col-sm-10">
                                <textarea id="elm1" class="elm1" name="description_ar"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Image</label>
                            <div class="custom-file col-sm-10">
                                <input name="image" type="file" class="custom-file-input" id="customFileLangHTML" required>
                                <label class="custom-file-label" for="customFileLangHTML" data-browse="Upload Image"></label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-dark w-25">Add</button>
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

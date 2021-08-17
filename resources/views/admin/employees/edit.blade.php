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

                    <form method="post" action="{{route('admin-employees.update',['admin_employee'=>$blog->id])}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">الاسم الاول</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="example-text-input" name="fname" required value="{{$blog->fname}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">الاسم الاخير</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="example-text-input" name="lname" required value="{{$blog->lname}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">الادارة</label>
                            <div class="col-sm-5">

                                <select class="form-control"  name="sector_id" required>
                                    <option value="{{$blog->sector->id}}" selected>{{$blog->sector->name_ar}}</option>
                                @foreach($sectors as $sector)
                                    @if($sector->id != $blog->sector->id)
                                        <option value="{{$sector->id}}">{{$sector['name_'.LaravelLocalization::getCurrentLocale()]}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">البريد الإلكتروني</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="email" id="example-text-input" name="email" required value="{{$blog->email}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">الرقم السري </label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="example-text-input" name="password" required value="{{$blog->password}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> رقم الهاتف </label>
                            <div class="col-sm-10">
                                <input class="form-control" type="number" id="example-text-input" name="phone" required value="{{$blog->phone}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> تاريخ الميلاد</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="date" id="example-text-input" name="birthdate" required value="{{$blog->birthdate}}">
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
                <h5 class="mb-5 mt-3">تعديل {{$blog->title_ar}}</h5>

                <form method="post" action="{{route('blogs.update',['blog'=>$blog->id])}}">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Title In English</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="example-text-input" name="title_en" value="{{$blog->title_en}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Title In Arabic</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="example-text-input" name="title_ar" value="{{$blog->title_ar}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Writer</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="example-text-input" name="writer" value="{{$blog->writer}}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleFormControlTextarea1" class="col-sm-2 col-form-label">Description In English</label>
                        <div class="col-sm-10">
                            <textarea id="elm1" class="elm1" name="description_en" required><?php $x = html_entity_decode($blog->description_en); echo $x ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleFormControlTextarea1" class="col-sm-2 col-form-label">Description In Arabic</label>
                        <div class="col-sm-10">
                            <textarea id="elm1" class="elm1" name="description_ar" required><?php $x = html_entity_decode($blog->description_ar); echo $x ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Image</label>
                        <div class="custom-file col-sm-10">
                            <input name="image" type="file" class="custom-file-input" id="customFileLangHTML">
                            <label class="custom-file-label" for="customFileLangHTML" data-browse="Update Image"></label>
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

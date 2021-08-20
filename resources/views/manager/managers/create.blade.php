@extends("layouts.admin")
@section("pageTitle", "Koala Web Libraries")
@section("content")
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
                        <h5 class="mb-5 mt-3">اضافة موظف جديد</h5>

                        <form method="post" action="{{route('admin-managers.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">الاسم الاول</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="example-text-input" name="fname" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">الاسم الاخير</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="example-text-input" name="lname" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">الادارة</label>
                                <div class="col-sm-5">
                                    <select class="form-control"  name="sector_id" required>
                                        @foreach($sectors as $sector)
                                            <option value="{{$sector->id}}">{{$sector['name_'.LaravelLocalization::getCurrentLocale()]}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">البريد الإلكتروني</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="email" id="example-text-input" name="email" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">الرقم السري </label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="example-text-input" name="password" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label"> رقم الهاتف </label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="number" id="example-text-input" name="phone" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label"> تاريخ الميلاد</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="date" id="example-text-input" name="birthdate" required>
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



@endsection

@section("script")
    <script src="{{asset("assets/admin/libs/tinymce/tinymce.min.js")}}"></script>
    <script src="{{asset("assets/admin/js/pages/form-editor.init.js")}}"></script>
@endsection

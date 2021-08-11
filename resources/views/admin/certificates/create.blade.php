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
                        <h5 class="mb-5 mt-3">اضافة مستخدم جديد</h5>
                            <form action="{{route('import')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                        <div class="col-sm-4">
                                            استيراد من ملف excel
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="file" name="file">
                                        </div>
                                        <div class="col-sm-4">
                                            <button type="submit" class="btn btn-dark">
                                                استيراد
                                            </button>
                                        </div>
                                </div>
                                <br><br><br>
                            </form>
                        <form method="post" action="{{route('certificates.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">الرقم</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="number" id="example-text-input" name="number" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">الاسم العربي</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="example-text-input" name="name_ar" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">الاسم الانجليزي</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="example-text-input" name="name_en" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-dark w-25">اضافة</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h5 class="">المستخدمين</h5>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap text-center" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                            <thead>
                            <tr>
                                <th> الرقم</th>
                                <th>الاسم العربي</th>
                                <th>الاسم الانجليزي</th>

                                <th>التحكم</th>
                            </tr>
                            </thead>
                            <?php $counter =1; ?>
                            <tbody>
                            @foreach($certificates as $bloggg)
                                <tr>
                                    <th>{{$bloggg->number}}</th>
                                    <th>{{$bloggg->name_ar}}</th>
                                    <th>{{$bloggg->name_en}}</th>

                                    <th>
                                        <center>
                                            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">

                                                <div class="btn-group" role="group">
                                                    <button id="btnGroupDrop1" type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        التحكم
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                        <a class="btn btn-dark col-sm-12"  href="{{route('certificates.edit',['certificate'=>$bloggg->id])}}">تعديل</a>
                                                        <form method="post" action="{{route('certificates.destroy',['certificate'=>$bloggg->id])}}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-dark col-sm-12" >حذف</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </center>
                                    </th>
                                </tr>
                                <?php $counter++; ?>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div>

    @else
    @endif


@endsection

@section("script")
    <script src="{{asset("assets/admin/libs/tinymce/tinymce.min.js")}}"></script>
    <script src="{{asset("assets/admin/js/pages/form-editor.init.js")}}"></script>
@endsection

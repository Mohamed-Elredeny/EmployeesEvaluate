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
                    <h5 class="mb-5 mt-3">اضافة تقرير جديد</h5>

                    <form method="post" action="{{route('admin-reports.store')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">الاسم باللغة العربية</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="example-text-input" name="name_ar">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">من تاريخ  </label>
                            <div class="col-sm-10">
                                <input class="form-control" type="date" id="example-text-input" name="from">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">الي تاريخ  </label>
                            <div class="col-sm-10">
                                <input class="form-control" type="date" id="example-text-input" name="to">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">الاقسام</label>
                            <div class="custom-file col-sm-10">
                                @if(count($real_sectors) > 0)
                                @foreach($real_sectors as $sector)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{$sector->id}}" name="flexCheckDefault[]">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        {{$sector['name_ar']}}
                                    </label>
                                </div>
                                    @endforeach
                                @else
                                    <h6 class="btn-danger text-center">There is no sectors yet</h6>
                                    <a href="{{route('admin-sectors.create')}}">Add New Sector</a>
                                @endif
                            </div>
                        </div>
                        <br><br>
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

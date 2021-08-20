@extends("layouts.admin")
@section("pageTitle", "Ejada")
{{-- @section("style")
    <link href="{{asset("assets/admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css")}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset("assets/admin/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css")}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset("assets/admin/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css")}}" rel="stylesheet" type="text/css"/>

@endsection --}}
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
                    <h5 class="">التقرير {{$report->name_ar}} بتاريخ {{date('Y-m-d')}}</h5>
                    <form method="post" action="{{route('admin.storeEvaluate')}}" enctype="multipart/form-data">
                        @csrf
                        <table id="" class="table table-bordered mb-0  text-center" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                            <thead>
                            <tr>
                                <th>السؤال</th>
                                @foreach($answers as $answer)
                                <th>
                                    {{$answer->name_ar}}
                                    <br>
                                    من {{$answer->from}}
                                    الي {{$answer->to}}
                                </th>
                                @endforeach
                            </tr>
                            </thead>
                            <?php $counter =1; ?>
                            <tbody>
                                @foreach($questions as $question)
                                <tr>
                                <th style="width: 50%">{{$question->name_ar}}</th>
                                @for($i=0; $i <count($answers); $i++)
                                <th>
                                    <center>
                                        <input type="radio" id="switch3{{$question->id}}{{$i}}" name="question{{$question->id}}" value="{{$question->id}}|{{$answers[$i]->id}}" switch="success" checked/>
                                        <label for="switch3{{$question->id}}{{$i}}" data-on-label="نعم" data-off-label="لا"></label>
                                    </center>
                                </th>
                                @endfor
                                </tr>
                                    <?php $counter++; ?>
                                @endforeach
                            </tbody>
                        </table>
                        <input type="hidden" value="{{$employee_id}}" name="employee_id">
                        <input type="hidden" value="{{$report->id}}" name="report_id">
                        <br><br>
                        <div class="form-group row">
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-dark w-25">حفظ </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div>


    @endsection
{{-- @section("script")
<script src="{{asset("assets/admin/libs/datatables.net/js/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("assets/admin/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js")}}"></script>
<script src="{{asset("assets/admin/libs/datatables.net-buttons/js/dataTables.buttons.min.js")}}"></script>
<script src="{{asset("assets/admin/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js")}}"></script>
<script src="{{asset("assets/admin/libs/jszip/jszip.min.js")}}"></script>
<script src="{{asset("assets/admin/libs/pdfmake/build/pdfmake.min.js")}}"></script>
<script src="{{asset("assets/admin/libs/pdfmake/build/vfs_fonts.js")}}"></script>
<script src="{{asset("assets/admin/libs/datatables.net-buttons/js/buttons.html5.min.js")}}"></script>
<script src="{{asset("assets/admin/libs/datatables.net-buttons/js/buttons.print.min.js")}}"></script>
<script src="{{asset("assets/admin/libs/datatables.net-buttons/js/buttons.colVis.min.j")}}"></script>
<script src="{{asset("assets/admin/libs/datatables.net-responsive/js/dataTables.responsive.min.js")}}"></script>
<script src="{{asset("assets/admin/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js")}}"></script>
<script src="{{asset("assets/admin/js/pages/datatables.init.js")}}"></script>
@endsection --}}

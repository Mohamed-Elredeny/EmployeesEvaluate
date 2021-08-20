@extends("layouts.admin")
@section("pageTitle", "Ejada")
@section("style")
    <link href="{{asset("assets/admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css")}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset("assets/admin/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css")}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset("assets/admin/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css")}}" rel="stylesheet" type="text/css"/>

@endsection
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
                        <h5 class="">التقرير {{$reportEmployee->report->name_ar}} بتاريخ {{$reportEmployee->created_at}}</h5>
                        <table dir="rtl" id="datatable" class="table table-bordered mb-0  text-center" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                            <thead>
                            <tr>
                                <th style="width: 50% !important">السؤال</th>
                                <th>
                                    التقييم
                                </th>
                                <th>
                                    النسبة
                                </th>
                            </tr>
                            </thead>
                            <?php $counter =1; $total = 0; ?>
                            <tbody>

                            @foreach($reportEmployee->userReport as $question)
                                <tr>
                                    <th style="width: 50%">{{$question->question->name_ar}}</th>
                                    <th >{{$question->answer->name_ar}}</th>
                                    <th >{{$question->answer->from}}</th>
                                    <?php $total += $question->answer->from; ?>
                                </tr>
                                <?php $counter++; ?>
                            @endforeach

                            </tbody>
                            <tbody>

                            <tr>
                                <th>
                                    التقييم الكلي
                                </th>
                                <th colspan="2">
                                    {{$total}}
                                </th>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div> <!-- end col -->
        </div>

@endsection


@section("script")
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'csv', 'excel', 'print',
                ]
            } );
        } );
    </script>
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
@endsection

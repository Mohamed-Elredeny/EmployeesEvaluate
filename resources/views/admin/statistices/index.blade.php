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
                        <div id="report">
                            <center>
                                <h5 class="">{{$sector->name_ar}}</h5>
                            </center>
                            <h5 class="">عدد المديرين {{count($managers)}} </h5>
                            <table class="table table-bordered dt-responsive nowrap text-center" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>الرقم</th>
                                    <th>الاسم الاول</th>
                                    <th>الاسم الاخير</th>
                                    <th>البريد الإلكتروني</th>
                                    <th>رقم الهاتف</th>
                                    <th>تاريخ الميلاد</th>
                                </tr>
                                </thead>
                                <?php $counter =1; ?>
                                <tbody>
                                @foreach($managers as $manager)
                                <tr>
                                    <th>{{$counter}}</th>
                                    <th>{{$manager->fname}}</th>
                                    <th>الاسم الاخير</th>
                                    <th>البريد الإلكتروني</th>
                                    <th>رقم الهاتف</th>
                                    <th>تاريخ الميلاد</th>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <h5 class="">عدد الموظفين {{count($managers)}}</h5>
                            <table class="table table-bordered dt-responsive nowrap text-center" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>الاسم الاول</th>
                                    <th>الاسم الاخير</th>
                                    <th>البريد الإلكتروني</th>
                                    <th>رقم الهاتف</th>
                                    <th>تاريخ الميلاد</th>
                                </tr>
                                </thead>
                                <?php $counter =1; ?>
                                <tbody>
                                </tbody>
                            </table>
                           @if(count($sectorsReports))
                            <center>
                                <h5 class="">تقييمات الموظفين </h5>
                            </center>
                            @foreach($sectorsReports as $report)
                            <h5 class="">{{$report->name_ar}}</h5>
                            <table class="table table-bordered dt-responsive nowrap text-center" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>الاسم الاول</th>
                                    <th>الاسم الاخير</th>
                                    <th>البريد الإلكتروني</th>
                                    <th>رقم الهاتف</th>
                                    <th>تاريخ الميلاد</th>
                                    <th>الادارة</th>
                                    <th>عرض التقارير</th>
                                </tr>
                                </thead>
                                <?php $counter =1; ?>
                                <tbody>
                                </tbody>
                            </table>
                            @endforeach
                            @else
                               <center>
                                   <h5 class=" btn-danger" style="padding: 20px"> لا يوجد تقارير بعد لهذه الادارة</h5>
                               </center>
                            @endif
                        </div>

                </div>
            </div>
        </div> <!-- end col -->
    </div>

@endsection
@section("script")
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

@extends("layouts.admin")
@section("pageTitle", "Koala Web Libraries")
@section('styleChart')
    <link href="{{asset("assets/admin/libs/c3/c3.min.css")}}" id="bootstrap-style" rel="stylesheet" type="text/css"/>
@endsection
@section("content")

    <div class="row">
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="mini-stat">
                        <span class="mini-stat-icon bg-primary float-left"><i class="fas fa-code-branch"></i></span>
                        <div class="mini-stat-info text-right">
                            <span class="counter text-primary">{{$sectorsNum}}</span>
                            عدد الإدارت
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="mini-stat clearfix">
                        <span class="mini-stat-icon bg-success float-left"><i class=" fas fa-users-cog"></i></span>
                        <div class="mini-stat-info text-right">
                            <span class="counter text-success">{{$managerNum}}</span>
                            عدد المديرين
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="mini-stat clearfix">
                        <span class="mini-stat-icon bg-warning float-left"><i class=" fas fa-users"></i></span>
                        <div class="mini-stat-info text-right">
                            <span class="counter text-warning">{{$employeesNum}}</span>
                            عدد الموظفين
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="mini-stat clearfix">
                        <span class="mini-stat-icon bg-pink float-left"><i class="ti-pencil-alt"></i></span>
                        <div class="mini-stat-info text-right">
                            <span class="counter text-pink">{{$reportNum}}</span>
                            عدد التقارير
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title mb-4">اجمالي التقيمات لكل إداره</h4>

                    <div id="chart" dir="ltr" style="height: 400px !important"></div>
                </div>
            </div>
        </div> <!-- end col -->

    </div> <!-- end row -->

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title mb-4">عدد الموظفين لكل ادارة</h4>

                    <div id="pie-chart" dir="ltr"></div>

                </div>
            </div>
        </div> <!-- end col -->

        @foreach($employeeSector as $sector)
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title mb-4">تقييم الموظفين {{$sector->name_ar}}</h4>

                        <div id="donut-chart{{$sector->id}}" dir="ltr"></div>


                    </div>
                </div>
            </div> <!-- end col -->
        @endforeach
    </div> <!-- end row -->

    <div class="row">
        <div class="col-xl-6" >
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mb-4">الإدارت</h4>
                        <a class="btn btn-success waves-effect waves-light" style="color: white !important">عرض الكل</a>
                    </div>
                    <br>

                    <div class="table-responsive">
                        <table class="table table-centered table-vertical table-nowrap mb-0">
                            <tbody>
                            @foreach($sectors as $sector)
                                <tr>
                                    <td><i class="mdi mdi-checkbox-blank-circle text-success"></i> {{$sector->name_ar}} </td>
                                    <td>
                                        {{$sector->city}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6" >
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mb-4">المديرين</h4>
                        <a class="btn btn-warning waves-effect waves-light" style="color: white !important">عرض الكل</a>
                    </div>
                    <br>

                    <div class="table-responsive">
                        <table class="table table-centered table-vertical table-nowrap mb-0">
                            <tbody>
                            @foreach($managers as $manager)
                                <tr>
                                    <td><i class="mdi mdi-checkbox-blank-circle text-warning"></i> {{$manager->fname}} {{$manager->lname}} </td>
                                    <td>
                                        {{$manager->email}}
                                    </td>
                                    <td>
                                        {{$manager->phone}}
                                    </td>
                                    <td>
                                        {{$manager->sector->name_ar}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mb-4">الموظفين</h4>
                        <a class="btn btn-pink waves-effect waves-light" style="color: white !important">عرض الكل</a>
                    </div>
                    <br>

                    <div class="table-responsive">
                        <table class="table table-centered table-vertical table-nowrap mb-0">
                            <tbody>
                            @foreach($employees as $employee)
                                <tr>
                                    <td><i class="mdi mdi-checkbox-blank-circle text-pink"></i> {{$employee->fname}} {{$employee->lname}} </td>
                                    <td>
                                        {{$employee->email}}
                                    </td>
                                    <td>
                                        {{$employee->phone}}
                                    </td>
                                    <td>
                                        {{$employee->sector->name_ar}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mb-4">التقارير</h4>
                        <a class="btn btn-purple waves-effect waves-light" style="color: white !important">عرض الكل</a>
                    </div>
                    <br>

                    <div class="table-responsive">
                        <table class="table table-centered table-vertical table-nowrap mb-0">
                            <tbody>
                            @foreach($reports as $report)
                                <tr>
                                    <td><i class="mdi mdi-checkbox-blank-circle text-purple"></i> {{$report->name_ar}} </td>
                                    <td>
                                        {{$report->from}}
                                    </td>
                                    <td>
                                        {{$report->to}}
                                    </td>
                                    <td>
                                        <a class="btn btn-purple waves-effect waves-light" style="color: white !important" data-toggle="modal" data-target="#advandage{{$report->id}}">عرض التقرير</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @foreach($reports as $reportt)
        <div class="modal fade" id="advandage{{$reportt->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="advandageLabel{{$reportt->id}}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header backgroundColor text-white" style="border:none">
                        <h5 class="modal-title" style="color: black" id="advandageLabel{{$reportt->id}}">عرض التقرير</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body backgroundColorSec p-5">
                        <table id="" class="table table-bordered mb-0  text-center" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                            <thead>
                            <tr>
                                <th>السؤال</th>
                                @foreach($answers as $answer)
                                    <th>
                                        {{$answer->name_ar}}
                                        <br>
                                        من {{$answer->from}}
                                    </th>
                                @endforeach
                            </tr>
                            </thead>
                            <?php $counter =1; ?>
                            <tbody>
                            @foreach($reportt->questions as $question)
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

                    </div>

                </div>
            </div>
        </div>
    @endforeach
@endsection

@section("script")
    <script src="{{asset("assets/admin/libs/d3/d3.min.js")}}"></script>
    <script src="{{asset("assets/admin/libs/c3/c3.min.js")}}"></script>
    {{-- <script src="{{asset("assets/admin/js/pages/c3-chart.init.js")}}"></script> --}}
    <script>
        var yarab = [];
        var ii = 0;
        @foreach( $employeeSector as $course)
            yarab[ii] = "{{$course['name_ar']}}" ;
        ii++;
        @endforeach
        console.log(yarab);

        !function(e){"use strict";
            function a(){}

            a.prototype.init=function()
            {
                c3.generate({bindto:"#chart",
                    data:{
                        columns:[["ممتاز"{{$aa}}],["جيد جدا"{{$bb}}],["جيد"{{$cc}}],["مقبول"{{$dd}}],["ضعيف"{{$ff}}]],
                        type:"bar",
                        colors:{Desktop:"#5468da",Mobile:"#fb8c00",Tablet:"#3bc3e9"}},
                    tooltip: {
                        contents: function (d, defaultTitleFormat, defaultValueFormat, color) {
                            var $$ = this, config = $$.config,
                                titleFormat = config.tooltip_format_title || defaultTitleFormat,
                                nameFormat = config.tooltip_format_name || function (name) { return name; },
                                valueFormat = config.tooltip_format_value || defaultValueFormat,
                                text, i, title, value, name, bgcolor;
                            for (i = 0; i < d.length; i++) {
                                var y =0;
                                if (! (d[i] && (d[i].value || d[i].value === 0))) { continue; }

                                if (! text) {
                                    title = titleFormat ? titleFormat(d[i].x) : d[i].x;
                                    var list = document.getElementsByClassName("c3-axis")[0];
                                    list.getElementsByTagName("tspan")[title].innerHTML = yarab[title];
                                    text = "<table class='" + $$.CLASS.tooltip + "'>" + (title || title === 0 ? "<tr><th colspan='2'>"  + yarab[title] + "</th></tr>" : "");
                                }

                                name = nameFormat(d[i].name);
                                value = valueFormat(d[i].value, d[i].ratio, d[i].id, d[i].index);
                                bgcolor = $$.levelColor ? $$.levelColor(d[i].value) : color(d[i].id);

                                text += "<tr class='" + $$.CLASS.tooltipName + "-" + d[i].id + "'>";
                                text += "<td class='name'><span style='background-color:" + bgcolor + "'></span>" + name + "</td>";
                                text += "<td class='value'>" + value + "</td>";
                                text += "</tr>";
                                y++;
                            }
                            return text + "</table>";
                        }}}),

                    @for($m = 0; $m < count($employeeSector); $m++)
                    c3.generate({bindto:"#donut-chart{{$employeeSector[$m]['id']}}",data:{columns:[
                                ["ممتاز",{{$sectorEvaluate[$employeeSector[$m]['name_ar']][0]}}],
                                ["جيد جدا",{{$sectorEvaluate[$employeeSector[$m]['name_ar']][1]}}],
                                ["جيد",{{$sectorEvaluate[$employeeSector[$m]['name_ar']][2]}}],
                                ["مقبول",{{$sectorEvaluate[$employeeSector[$m]['name_ar']][3]}}],
                                ["ضعيف",{{$sectorEvaluate[$employeeSector[$m]['name_ar']][4]}}],
                            ],type:"donut"},donut:{title:"{{$employeeSector[$m]['name_ar']}}",width:30,label:{show:!1}},color:{pattern:["#f06292","#6d60b0","#5468da","#009688"]}}),
                    @endfor

                    c3.generate({bindto:"#pie-chart",data:{columns:
                                [
                                        @foreach($employeeSector as $sectorr)
                                    ["{{$sectorr['name_ar']}}",{{count($sectorr['employee'])}}],
                                    @endforeach

                                ],type:"pie"},color:{pattern:["#afb42b","#fb8c00","#8d6e63","#90a4ae"]},pie:{label:{show:!1}}})

            },
                e.ChartC3=new a,e.ChartC3.Constructor=a
        }
        (window.jQuery),
            function(){"use strict";window.jQuery.ChartC3.init()}();






        //     var list = document.getElementsByClassName("c3-axis")[0];
        // list.getElementsByTagName("tspan")[0].innerHTML = "Milk";
    </script>
@endsection

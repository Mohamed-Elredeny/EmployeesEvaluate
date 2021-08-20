@extends("layouts.employee")
@section("pageTitle", "عرض تقارير الموظف")

@section("content")
    <?php   $user_id = Auth::guard('employee')->user()->id;
            $sector_id = Auth::guard('employee')->user()->sector_id ;
              $sector_reports = \App\models\admin\ReportSector::where('sector_id',$sector_id)->get();
    ?>
    @if(count($sector_reports) > 0)
        @foreach($sector_reports as $report)
            <?php // Report id                   $report_id - $report->report->id ?>
            <center>
                <h1>
                    {{ ' ادارة'. ' '.\App\models\admin\Sector::find($sector_id)->name_ar  }}
                </h1>
            </center>
            <table class="table ">

                <tr>
                    <th class="text-left col-sm-12 btn btn-dark">
                        <h5 class="">التقرير {{$report->report->name_ar}} بتاريخ {{$report->created_at}}</h5>
                    </th>
                </tr>
                <?php $report_emps = \App\models\admin\ReportEmployee::where('employee_id',$user_id)->where('report_id',$report->report->id)->get() ?>
                @if(count($report_emps) > 0)
                @foreach($report_emps as $reportEmployee)
                <tr>
                    <th>
                        <table dir="rtl"  class="table table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr class="h4" style="font-weight:bolder">
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
                                    <th >{{$question->answer->from}} % </th>
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
                                    {{$total}} %
                                </th>
                            </tr>
                            </tbody>
                        </table>
                    </th>
                </tr>
                @endforeach
                @else
                    <tr>
                        <th>
                            <center>
                                <h2>لم يتم التقييم بعد ! </h2>
                            </center>
                        </th>
                    </tr>

                @endif


            </table>
        @endforeach
    @else
        <h2 class="text-center">لا يوجد تقارير بعد</h2>
    @endif

@endsection

@section("script")
<script src="{{asset("assets/admin/libs/d3/d3.min.js")}}"></script>
<script src="{{asset("assets/admin/libs/c3/c3.min.js")}}"></script>
{{-- <script src="{{asset("assets/admin/js/pages/c3-chart.init.js")}}"></script> --}}
{{--<script>
    var yarab = [];
    var ii = 0;
    @foreach( $courses as $course)
     yarab[ii] = "{{$course['name']}}" ;
     ii++;
    @endforeach
    console.log(yarab);
    !function(e){"use strict";
function a(){}

a.prototype.init=function()
{
    c3.generate({bindto:"#chart",
    data:{
        columns:[["Online Payment"{{$xx}}],["Trasfear Bank"{{$yy}}],["By Hand"{{$zz}}]],
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
    c3.generate({bindto:"#chart1",
    data:{
        columns:[["Attend"{{$aa}}],["Asbect"{{$bb}}]],
        type:"bar",
        colors:{Desktop:"#5468da",Mobile:"#fb8c00"}},

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
    c3.generate({bindto:"#donut-chart",data:{columns:[["Online Payment",{{$sumOnline}}],["Trasfear Bank",{{$sumBank}}],["By Hand",{{$sumHand}}]],type:"donut"},donut:{title:"Candidates",width:30,label:{show:!1}},color:{pattern:["#f06292","#6d60b0","#5468da","#009688"]}}),
    c3.generate({bindto:"#pie-chart",data:{columns:[["Attend",{{$sumAttend}}],["Absent",{{$sumAbsent}}]],type:"pie"},color:{pattern:["#afb42b","#fb8c00","#8d6e63","#90a4ae"]},pie:{label:{show:!1}}})},
    e.ChartC3=new a,e.ChartC3.Constructor=a
}
(window.jQuery),
    function(){"use strict";window.jQuery.ChartC3.init()}();






//     var list = document.getElementsByClassName("c3-axis")[0];
// list.getElementsByTagName("tspan")[0].innerHTML = "Milk";
</script>--}}
@endsection

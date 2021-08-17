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
                    <h5 class="mb-5 mt-3">اضافة تقيم جديد</h5>
{{-- {{dd($sectors)}} --}}
                    <form method="post" action="{{route('admin.makeEvaluate')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">الادارة</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="sector_id" name="sector_id" required>
                                    <option >اختر الادارة</option>
                                    @foreach($sectors as $sector)
                                        <option value="{{$sector->id}}">{{$sector->name_ar}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
    
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">الموظف</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="employee_id" name="employee_id" required>
                                    
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">اسم التقرير</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="report_id" name="report_id" required>
                                    
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-dark w-25">انشاء تقييم</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@else
@endif


@endsection

<script
        src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
        crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        // var test ;
        $(document).ready(function(){
            $('#sector_id').on('change', function() {
               var id = $(this).val();
               console.log(id);
               $.ajax({
               url:'http://127.0.0.1:8000/admin/getSectorEmployee',
                   method:"get",
                   data:{sector_id:id},
                   dataType:"json",
                   headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   },
                   success:function(data){ 
                    
                    var employees = document.getElementById('employee_id');
                    
                    employees.innerHTML = "<option value='0'>اختر الموظف</option>";

                    for(var i = 0; i < data['employees'].length; i++)
                    {
                        console.log(data['employees'][i]['report'].length);
                        if (data['employees'][i]['report'].length != data['reports']) {
                            employees.innerHTML += "<option value="+data['employees'][i].id+">"+data['employees'][i].fname+" " +data['employees'][i].lname+"</option>"
                        }
                    }
                    // test = data;
                    //console.log(typeof data);

                   // console.log(data);
                   }
               });
   
           });
       });

       $(document).ready(function(){
            $('#employee_id').on('change', function() {
               var id = $(this).val();
               var sector_id = document.getElementById('sector_id').value;
            //    var sector_id = document.getElementById('sector_id').value;
               console.log(id);
               $.ajax({
               url:'http://127.0.0.1:8000/admin/getSectorEmployeeReport',
                   method:"get",
                   data:{employee_id:id,sector_id:sector_id},
                   dataType:"json",
                   headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   },
                   success:function(data){ 
                    
                    var reports = document.getElementById('report_id');
                    
                    reports.innerHTML = "<option >اختر التقرير</option>";

                    // for(var i = 0; i < data['reports'].length; i++)
                    // {
                    //     // console.log(data['employees'][i]['report'].length);
                    //     // for(var y = 0; y <= data['reportsEmployee'].length; y++)
                    //     // {
                    //         if (!data['reportsEmployee'][i]) 
                    //         {
                    //             reports.innerHTML += "<option value="+data['reports'][i].id+">"+data['reports'][i].name_ar+"</option>"
                    //         }
                    //         else
                    //         {

                    //         }
                    //     // }
                        
                    // }

    //                 var a = [], diff = [];

    // for (var i = 0; i < data['reports'].length; i++) {
    //     a[data['reports'][i]] = true;
    // }

    // for (var i = 0; i < data['reportsEmployee'].length; i++) {
    //     if (a[data['reportsEmployee'][i]]) {
    //         delete a[data['reportsEmployee'][i]];
    //     } else {
    //         a[data['reportsEmployee'][i]] = true;
    //     }
    // }

    // for (var k in a) {
    //     diff.push(k);
    // }

    // console.log(diff);
    if (id != 0) {
        data.forEach(report => reports.innerHTML += "<option value="+report.id+">"+report.name_ar+"</option>");
    }
                    // data.forEach(report => reports.innerHTML += "<option value="+report.id+">"+report.name_ar+"</option>");
                    
                    //console.log(typeof data);

                   // console.log(data);
                   }
               });
   
           });
       });
   </script>
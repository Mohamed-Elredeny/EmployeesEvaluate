<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\models\admin\Employee;
use App\models\admin\Question;
use App\models\admin\Report;
use App\models\admin\ReportEmployee;
use App\models\admin\Sector;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\ToArray;

class EvaluationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $blogs = Question::where('report_id',$id)->get();
        return view('admin.evaluations.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sectors = Sector::get();
        return view('admin.evaluations.create',compact('sectors'));
        // return $sectors;
    }

    public function getSectorEmployee(Request $request)
    {
        $employees = Employee::where('sector_id', $request->sector_id)->with('report')->get();
        $reports = Report::where('sector_id', $request->sector_id)->count();
        //return $employees ;
        return response()->json(['employees' => $employees , 'reports' => $reports]);
    }

    public function getSectorEmployeeReport(Request $request)
    {
        $reportsEmployee = ReportEmployee::select('report_id')->where('employee_id', $request->employee_id)->get();
        $reports =Report::where('sector_id', $request->sector_id)
                        ->whereNotIn(
                            'id',
                            $reportsEmployee
                        )
                        ->get();
        return $reports;
    //     $reports = Report::where('sector_id', $request->sector_id)->get();
    //     $reportsEmployee = ReportEmployee::where('employee_id', $request->employee_id)->get();
    //     // $result = array_diff($reports, $reportsEmployee);
    //     $diff = $reports->diffUsing($reportsEmployee, function($a, $b) {
    //         return $a->id === $b->id;
    //    });
        // return response()->json(['reportsEmployee' => $reportsEmployee , 'reports' => $reports]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

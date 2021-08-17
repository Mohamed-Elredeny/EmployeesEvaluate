<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\models\admin\Answer;
use App\models\admin\Employee;
use App\models\admin\Question;
use App\models\admin\Report;
use App\models\admin\ReportEmployee;
use App\models\admin\Sector;
use App\models\admin\UserAnswer;
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
        $today = date('Y-m-d');

        $reportsEmployee = ReportEmployee::select('report_id')->where('employee_id', $request->employee_id)->get();
        $reports =Report::where('sector_id', $request->sector_id)
                        ->whereDate('from','<=', $today)
                        ->whereDate('to','>=', $today)
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

    public function makeEvaluate(Request $request)
    {
        $questions = Question::where('report_id', $request->report_id)->get();
        $answers = Answer::get();
        $report =Report::find($request->report_id);
        // $report_id = $request->report_id;
        $employee_id = $request->employee_id;
        // return $request;
        return view('admin.evaluations.makeEvaluate', compact('employee_id','questions','answers','report'));
    }

    public function storeEvaluate(Request $request)
    {
        $reportEmployeeId = ReportEmployee::insertGetId([
            'employee_id' => $request->employee_id,
            'report_id' => $request->report_id,
        ]);

        $questions = Question::where('report_id', $request->report_id)->get();

        for($i = 0; $i < count($questions); $i++)
        {
            $arr = explode("|", $request['question'.$questions[$i]['id']]);
            UserAnswer::create([
                'report_employee_id' => $reportEmployeeId,
                'question_id' => (int)$arr[0],
                'answer_id' => (int)$arr[1]
            ]);
        }

        // return $arr;
        return redirect()->route('evaluations.create')->with('success', 'تم اضافة التقيم بنجاح ');
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

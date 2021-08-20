<?php

namespace App\Http\Controllers\admin;

use App\models\admin\Sector;
use Illuminate\Http\Request;
use App\models\admin\Employee;
use App\Http\Controllers\Controller;
use App\models\admin\Answer;
use App\models\admin\Manager;
use App\models\admin\Report;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employeesNum = Employee::count();
        $sectorsNum = Sector::count();
        $managerNum = Manager::count();
        $reportNum = Report::count();

        $employees = Employee::limit(7)->get();
        $managers = Manager::limit(7)->get();
        $reports = Report::limit(7)->get();
        $sectors = Sector::limit(7)->get();
        $answers = Answer::get();

        // الاجمالي بتاع كل التقيمات لكل تقيم في التقارير بتاعه الادارة الواحده
        // الاداره كل التقارير اللي فيها
        // اجمالي كل تقيم

        //الادارات
        // الموظفين لكل اداره
        // نسبة التقيمات لكل موظف
        // اجمع النسب


        $sectors = Sector::with('reportSector')->get();
        $employeeSector = Sector::with('employee')->get();

        $a = 0;
        $b = 0;
        $c = 0;
        $d = 0;
        $f = 0;

        $aa = '';
        $bb = '';
        $cc = '';
        $dd = '';
        $ff = '';

        foreach ($employeeSector as $sector) {

            for($i = 0; $i < count($sector->employee); $i++ )
            {
                for($y=0; $y < count($sector->employee[$i]->report); $y++)
                {
                    for($z=0; $z < count($sector->employee[$i]->report[$y]->userReport); $z++)
                    {
                        if($sector->employee[$i]->report[$y]->userReport[$z]->answer_id == 1)
                        {
                            $a += 1;
                        }
                        elseif($sector->employee[$i]->report[$y]->userReport[$z]->answer_id == 2)
                        {
                            $b += 1;
                        }
                        elseif($sector->employee[$i]->report[$y]->userReport[$z]->answer_id == 3)
                        {
                            $c += 1;
                        }
                        elseif($sector->employee[$i]->report[$y]->userReport[$z]->answer_id == 4)
                        {
                            $d += 1;
                        }
                        elseif($sector->employee[$i]->report[$y]->userReport[$z]->answer_id == 5)
                        {
                            $f += 1;
                        }
                        // return $sector->employee[$i]->report[$y]->userReport;
                    }
                }
            }
            $sectorEvaluate[$sector->name_ar][0] = $a;
            $sectorEvaluate[$sector->name_ar][1] = $b;
            $sectorEvaluate[$sector->name_ar][2] = $c;
            $sectorEvaluate[$sector->name_ar][3] = $d;
            $sectorEvaluate[$sector->name_ar][4] = $f;

            $aa .= ',' . $a;
            $bb .= ',' . $b;
            $cc .= ',' . $c;
            $dd .= ',' . $d;
            $ff .= ',' . $f;

            $a = 0;
            $b = 0;
            $c = 0;
            $d = 0;
            $f = 0;
        }


        return view('admin.home', compact('employeesNum','sectorsNum', 'managerNum', 'reportNum','sectorEvaluate','employeeSector','aa','bb','cc','dd','ff', 'employees', 'managers', 'reports', 'sectors','answers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

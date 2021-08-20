<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\models\admin\Employee;
use App\models\admin\Manager;
use App\models\admin\ReportSector;
use App\models\admin\Sector;
use Illuminate\Http\Request;

class StatisticesController extends Controller
{
    //To Do
    /*
     * 1. Employees in one sector
     * 2. Managers
     * 3. Evaluation for each report for each student
     */

    protected $employees;
    protected $managers;

    protected $sector_id;
    protected $sector;
    protected $sectorsReports;

    protected $reports;


    public function index($sector_id){
        $this->sector_id = $sector_id;
        $this->sector = Sector::find($this->sector_id);
        $this->reports();
        $employees = $this->employees;
        $managers = $this->employees;
        $sectorsReports = $this->employees;
        $sector = $this->sector;
        return view('admin.statistices.index',compact('employees','managers','sectorsReports','sector'));
    }
    public function employees(){
        $this->employees = Employee::where('sector_id',$this->sector_id)->get();
    }
    public function managers(){
        $this->managers = Manager::where('sector_id',$this->sector_id)->get();
    }
    public function sectorsReports(){
        $this->sectorsReports = ReportSector::where('sector_id',$this->sector_id)->get();
    }

    public function reports(){
        $this->employees();
        $this->managers();
        $this->sectorsReports();
    }

}

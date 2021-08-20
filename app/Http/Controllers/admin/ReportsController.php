<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\models\admin\Employee;
use App\models\admin\Manager;
use App\models\admin\Report;
use App\models\admin\ReportSector;
use App\models\admin\Sector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Report::get();
        return view('admin.reports.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sectors = Report::get();
        $real_sectors = Sector::get();
        return view('admin.reports.create',compact('sectors','real_sectors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [

        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInputs($request->all());
        } else {
            // $sectors = implode(',',$request->flexCheckDefault);
            $report_id = Report::insertGetId([
                'name_ar' => $request->name_ar,
                'from' => $request->from,
                'to' => $request->to,
                // 'sectors' =>$sectors,
            ]);

            for($i = 0; $i< count($request->flexCheckDefault); $i++)
            {
                ReportSector::create([
                    'report_id' => $report_id,
                    'sector_id' => $request->flexCheckDefault[$i],
                ]);
            }
            return redirect()->route('admin-reports.index')->with('success', 'The Manger has created successfully.');
        }
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
        $sectors = Sector::get();
        $blog = Report::find($id);
        return view('admin.reports.edit', compact('blog','sectors'));
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
        $currentBlog = Report::find($id);
        $rules = [

        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {

            $currentBlog->update([
                'name_ar' => $request->name_ar,
                'from' => $request->from,
                'to' => $request->to,
            ]);
        }
        return redirect()->back()->with('success', 'تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $old = Report::find($id);
        $old->delete();
        return redirect()->back()->with('success', 'تم الحذف بنجاح');
    }
    public function deleteReportSector($id){
        $old = ReportSector::find($id);
        $old->delete();
        return redirect()->back()->with('success', 'تم الحذف بنجاح');
    }
}

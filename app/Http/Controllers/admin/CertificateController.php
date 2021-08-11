<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Imports\UsersImport;
use App\models\admin\Certificate;
use App\models\admin\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;


class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function import(Request $request)
    {
        $request->validate([
        ]);

        $path = $request->file('file')->getRealPath();

         Excel::import(new UsersImport, $path);
        return redirect()->back()->with('success', 'updated successfully.');

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $certificates = Certificate::get();
        return view('admin.certificates.create',compact('certificates'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $program_ar ='برنامج جديد جدا';
        $program_en ='very new program';
        $date= '1999-12-27';
        Certificate::create([
            'name_ar' =>$request->name_ar,
            'name_en' =>$request->name_ar,
            'program_ar' =>$program_ar,
            'program_en'=>$program_en,
            'date'=>$date,
            'number'=>$request->number
        ]);
        return redirect()->back()->with('success', 'The Employee has updated successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        return view('admin.certificates.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $blog = Certificate::find($id);
        return view('admin.certificates.edit', compact('blog'));
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
        $currentBlog = Certificate::find($id);
        $rules = [

        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {

            $currentBlog->update([
                'name_ar' => $request->name_ar,
                'name_en' => $request->name_en,
                'number' => $request->number,
            ]);
        }
        return redirect()->back()->with('success', 'The Employee has updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $old = Certificate::find($id);
        $old->delete();
        return redirect()->back()->with('success', 'Deleted successfully');
    }
    public function delete_all(){
       $all= Certificate::get();
       foreach($all as $a){
           $old = Certificate::find($a->id);
           $old->delete();
       }
        return redirect()->back()->with('success', 'Deleted successfully');
    }
}

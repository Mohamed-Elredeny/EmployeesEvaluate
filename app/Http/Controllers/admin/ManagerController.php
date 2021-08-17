<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\models\admin\Employee;
use App\models\admin\Manager;
use App\models\admin\Sector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Manager::get();
        return view('admin.managers.index',compact('blogs'));
    }
    public function index_filter($filter)
    {
        $blogs = Manager::where('sector_id',$filter)->get();
        return view('admin.managers.index',compact('blogs'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sectors = Sector::get();
        return view('admin.managers.create',compact('sectors'));

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


            Manager::create([
                'fname' => $request->fname,
                'lname' => $request->lname,
                'email' => $request->email,
                'password' =>$request->password,
                'phone' => $request->phone,
                'birthdate' =>$request->birthdate,
                'sector_id' => $request->sector_id,
            ]);
            return redirect()->route('admin-managers.index')->with('success', 'تمت الاضافة بنجاح');
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
        $blog = Manager::find($id);
        return view('admin.managers.show',compact('blog'));
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
        $blog = Manager::find($id);
        return view('admin.managers.edit', compact('blog','sectors'));
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
        $currentBlog = Manager::find($id);
        $rules = [

        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $currentBlog->update([
                'fname' => $request->fname,
                'lname' => $request->lname,
                'email' => $request->email,
                'password' => $request->password,
                'phone' => $request->phone,
                'birthdate' => $request->birthdate,
                'sector_id' => $request->sector_id,
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
        $old = Manager::find($id);
        $old->delete();
        return redirect()->back()->with('success', 'تم الحذف بنجاح');
    }
}

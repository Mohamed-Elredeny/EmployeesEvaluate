<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\models\admin\Employee;
use App\models\admin\Sector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Employee::get();
        return view('admin.employees.index',compact('blogs'));
    }
     public function index_filter($filter)
    {
        $blogs = Employee::where('sector_id',$filter)->get();
        return view('admin.employees.index',compact('blogs'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sectors = Sector::get();
        return view('admin.employees.create',compact('sectors'));
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
            $fileName = $request->image->getClientOriginalName();
            $imageName = time() . '_' . $fileName ;
            $request->image->move(public_path('assets/site/images/employees'), $imageName);

            Employee::create([
                'fname' => $request->fname,
                'lname' => $request->lname,
                'email' => $request->email,
                'password' =>$request->password,
                'phone' => $request->phone,
                'birthdate' =>$request->birthdate,
                'sector_id' => $request->sector_id,
                'image'=> $imageName,
            ]);
            return redirect()->route('admin-employees.index')->with('success', 'The Employees has created successfully.');
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
        $blog = Employee::find($id);
        return view('admin.employees.show',compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Employee::find($id);
        return view('admin.employees.edit', compact('blog'));
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
        $currentBlog = Employee::find($id);
        $rules = [
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required',
            'password' => 'required',
            'phone' => 'required',
            'birthdate' => 'required',
            'image' => 'required',
            'sector_id ' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            if ($request->image) {
                unlink(public_path('assets/site/images/employees') .'/' . $currentBlog->image);

                $fileName = $request->image->getClientOriginalName();
                $imageName = time() . '_' . $fileName ;
                $request->image->move(public_path('assets/site/images/employees'), $imageName);

            }
            else{
                $imageName = $currentBlog->image;
            }
            $currentBlog->update([
                'fname' => $request->fname,
                'lname' => $request->lname,
                'email' => $request->email,
                'password' => $request->password,
                'phone' => $request->phone,
                'birthdate' => $request->birthdate,
                'sector_id ' => $request->sector_id,
                'image'=> $imageName,
            ]);
        }
        return redirect()->route('admin-employees.index')->with('success', 'The Employee has updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $old = Employee::find($id);
        $old->delete();
        return redirect()->route('admin-employees.index')->with('success', 'Deleted successfully');
    }
}

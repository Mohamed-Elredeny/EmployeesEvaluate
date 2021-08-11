<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\models\admin\Sector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Sector::get();
        return view('admin.sectors.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sectors.create');

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
            'name_ar' => 'required',
            'name_en' => 'required',
            'city' => 'required',
            'image' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInputs($request->all());
        } else {
            $imageName = $request->image->getClientOriginalExtension();
            $request->image->move(public_path('assets/site/images/sectors'), $imageName);

            Sector::create([
                'name_ar'=> $request->name_ar,
                'name_en'=> $request->name_en,
                'city'=> $request->city,
                'image'=> $imageName,
            ]);
            return redirect()->route('admin-sectors.index')->with('success', 'The Sector has created successfully.');
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
        $blog = Sector::find($id);
        return view('admin.sectors.show',compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Sector::find($id);
        return view('admin.sectors.edit', compact('blog'));
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
        $currentBlog = Sector::find($id);
        $rules = [];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            if ($request->image) {
                //unlink(public_path('assets/site/images/sectors') .'/' . $currentBlog->image);
                $imageName = time() . '.' . $request->image->getClientOriginalExtension();
                $request->image->move(public_path('/assets/site/images/sectors'), $imageName);
            }
            else{
                $imageName = $currentBlog->image;
            }
            $currentBlog->update([
                'name_ar'=> $request->name_ar,
                'name_en'=> $request->name_en,
                'city'=> $request->city,
                'image'=> $imageName,
            ]);

        }
        return redirect()->route('admin-sectors.index')->with('success', 'The Sector has updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $old = Sector::find($id);
        $old->delete();
        return redirect()->route('admin-sectors.index')->with('success', 'Deleted successfully');
    }
}

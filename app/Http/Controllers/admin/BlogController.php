<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if(Auth::guard('subadmin')->user())
            {
                foreach(Auth::guard('subadmin')->user()->subadminRoles as $role)
                {
                    if($role->role == 'blogs')
                    {
                        return $next($request);
                    }
                }
                return redirect()->route('home')->withFlashMessage('You are not authorized to access that page.')->withFlashType('warning');

            }
            elseif(Auth::guard('admin')->user())
            {
                return $next($request);
            }
            else
            {
                return redirect()->route('home')->withFlashMessage('You are not authorized to access that page.')->withFlashType('warning');
            }
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::get();
        return view('admin.blogs.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blogs.create');
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
            'title_ar' => 'required',
            'title_en' => 'required',
            'writer' => 'required',
            'description_ar' => 'required',
            'description_en' => 'required',
            'image' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInputs($request->all());
        } else {
            $imageName = $request->image->getClientOriginalExtension();
            $request->image->move(public_path('assets/images/blogs'), $imageName);

            Blog::create([
                'title_ar'=> $request->title_ar,
                'title_en'=> $request->title_en,
                'writer'=> $request->writer,
                'description_ar'=> htmlspecialchars($request->description_ar),
                'description_en'=> htmlspecialchars($request->description_en),
                'image'=> $imageName,
            ]);
            return redirect()->route('blogs.index')->with('success', 'The Blog has created successfully.');
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
        $blog = Blog::find($id);
        return view('admin.blogs.show',compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::find($id);
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
        $currentBlog = Blog::find($id);
        $rules = [
            'title_ar' => 'required',
            'title_en' => 'required',
            'writer' => 'required',
            'description_ar' => 'required',
            'description_en' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            if ($request->image) {
                unlink(public_path('assets/images/blogs') .'/' . $currentBlog->image);

                $imageName = time() . '.' . $request->image->getClientOriginalExtension();
                $request->image->move(public_path('/assets/images/blogs'), $imageName);
            }
            else{
                $imageName = $currentBlog->image;
            }
            $currentBlog->update([
                'title_ar'=> $request->title_ar,
                'title_en'=> $request->title_en,
                'writer'=> $request->writer,
                'description_ar'=> htmlspecialchars($request->description_ar),
                'description_en'=> htmlspecialchars($request->description_en),
                'image'=> $imageName,
            ]);

        }
        return redirect()->route('blogs.index')->with('success', 'The Blog has updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $old = Blog::find($id);
        $old->delete();
        return redirect()->route('blogs.index')->with('success', 'Deleted successfully');
    }
}

<?php

namespace App\Http\Controllers\Auth\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:employee')->except('logout');
    }

    public function showLoginForm()
    {
        return view('login.employee');
    }

    public function login(Request $request)
    {
        // Validate form data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Attempt to log the user in
        if(Auth::guard('employee')->attempt(['email' => $request->email, 'password' => $request->password]))
        {
            return redirect()->intended(route('employee.dashboard'));
        }

        // if unsuccessful
        return redirect()->back()->withErrors($request->only('email','remember'));
    }

}

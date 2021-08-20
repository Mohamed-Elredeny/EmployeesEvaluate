<?php

namespace App\Http\Controllers\Auth\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagerLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:manager')->except('logout');
    }

    public function showLoginForm()
    {
        return view('login.manager');
    }

    public function login(Request $request)
    {
        // Validate form data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Attempt to log the user in
        if(Auth::guard('manager')->attempt(['email' => $request->email, 'password' => $request->password]))
        {
            return redirect()->intended(route('manager.dashboard'));
        }

        // if unsuccessful
        return redirect()->back()->withErrors($request->only('email','remember'));
    }

}

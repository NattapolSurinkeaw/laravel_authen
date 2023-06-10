<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{

    public function checkLogin(Request $request)
    {
        $input = $request->all();

        $this->validate($request,[
            'email' => 'required',
            'password' => 'required|min:6',
        ]); 

        if (Auth::guard('admin')->attempt(['email' => $input['email'], 'password' => $input['password']])) {
            return redirect('/');
        }else {
            return redirect()-> back()->with('error','username and password incorrect');
        }
    }

    public function logOut()
    {
        Auth::guard('admin')->logout();
        return view('pages.adminlogin');
    }


    
}

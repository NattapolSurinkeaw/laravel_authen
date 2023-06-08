<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserLoginController extends Controller
{
    //
    public function showForm(){
        return view('pages.userlogin');
    }

    public function checkLogin(Request $request)
    {
        $input = $request->all();

        $this->validate($request,[
            'email' => 'required',
            'password' => 'required|min:6',
        ]); 

        if (Auth::guard('users')->attempt(['email' => $input['email'], 'password' => $input['password']])) {
            return redirect('/');
        }else {
            return redirect()-> back()->with('error','username and password incorrect');
        }
    }

    public function logOut()
    {
        Auth::guard('users')->logout();
        return view('pages.userlogin');
    }
}

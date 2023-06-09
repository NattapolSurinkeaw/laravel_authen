<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function homePage() {
        return view('pages.homepage');
    }

    public function loginPage() {
        return view('pages.loginpage');
    }

    public function adminDashBoard() {
        return view('pages.admindashboard');
    }
}

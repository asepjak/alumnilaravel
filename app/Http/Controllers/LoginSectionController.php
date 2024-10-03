<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginSectionController extends Controller
{
    function indexLogin() {
        return view("loginsesi/indexLogin");
    }

    function login() {
        return view("");
}
}



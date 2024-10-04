<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginSectionController extends Controller
{
    function index() {
        return view("loginsesi.asep");
    }

    function login() {
        return view("");
}
}

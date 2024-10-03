<?php

use App\Http\Controllers\LoginSectionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/loginsesi', [LoginSectionController::class, 'indexLogin'] );



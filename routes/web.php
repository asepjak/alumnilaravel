<?php

use App\Http\Controllers\LoginSectionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/regist', function () {
//     return view('loginsesi/asep');
// });


Route::get('/login', [LoginSectionController::class, 'index'] );
// Route::post('/loginsesi/login', [LoginSectionController::class, 'indexLogin'] );


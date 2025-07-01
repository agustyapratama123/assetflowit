<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return redirect('/dashboard/login'); // atau '/dashboard/login' tergantung versi Filament-mu
});
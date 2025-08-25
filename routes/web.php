<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProcessorController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/process', function () {
    return view('process');
});

Route::post('/process', [ProcessorController::class, 'processFile']);

Route::post('/login', function (Request $request) {
    $auth_attempt_params = $request->only('email', 'password');

    if (Auth::attempt($auth_attempt_params, false)) {
        return redirect('/');
    } else {
        return redirect('/process');
    }
});

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
});
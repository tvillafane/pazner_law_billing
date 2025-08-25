<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProcessorController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
})->name('login');

Route::middleware('auth')->group(function() {
    Route::post('/process', [ProcessorController::class, 'processFile']);

    Route::get('/process', function () {
        return view('process');
    });
});

Route::post('/login', function (Request $request) {
    $auth_attempt_params = $request->only('email', 'password');

    if (!Auth::attempt($auth_attempt_params, false)) {
        return redirect('/')->with('error', 'Failed to sign in, please try again.');
    } else {
        return redirect('/process')->with('success', 'Successfully logged in.');
    }
});

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
});
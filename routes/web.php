<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProcessorController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/process', function () {
    return view('process');
});

Route::post('/process', [ProcessorController::class, 'processFile']);

Route::get('/test', function () {
    $file_path     = storage_path('app/test.xlsx');
    $download_name = 'test.xlsx';

    abort_unless(is_file($file_path), 404);

    if (app()->bound('debugbar')) app('debugbar')->disable();

    return response()->download(
        $file_path,
        $download_name,
        [
            'Content-Type'           => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'X-Content-Type-Options' => 'nosniff',
        ]
    );
});

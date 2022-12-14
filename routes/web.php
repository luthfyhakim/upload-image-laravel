<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/upload', [UploadController::class, 'upload']);
Route::post('/upload/proses', [UploadController::class, 'prosesUpload']);
Route::get('/upload/edit/{id}', [UploadController::class, 'edit']);
Route::put('/upload/update/{id}', [UploadController::class, 'update']);
Route::get('/upload/delete/{id}', [UploadController::class, 'delete']);

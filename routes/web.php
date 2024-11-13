<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/feedbacks', [FeedbackController::class, 'index']); 
Route::post('/feedbacks/store', [FeedbackController::class, 'store'])->name('feedback.store');
Route::resource('users', UserController::class);
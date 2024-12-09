<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\GenreController;
use App\Http\Controllers\Api\HistoryExpressionController;
use App\Http\Controllers\Api\SongRecommendationController;
use App\Http\Controllers\Api\UserGenreController;

// Store & Update User
Route::post('users', [UserController::class, 'store']);
// Get User by Id
Route::get('users', [UserController::class, 'index']);
// Get all genres by default masukan id untuk mendapatkan spesifik genre
Route::get('genres', [GenreController::class, 'index']);
// Get history expressions
Route::get('history-expressions', [HistoryExpressionController::class, 'index']);
// Get last history expressions
Route::get('last-history-expressions', [HistoryExpressionController::class, 'getLastExpression']);
// Store history expressions
Route::post('history-expressions', [HistoryExpressionController::class, 'store']);
// Get song recomendations
Route::get('song-recommendations', [SongRecommendationController::class, 'index']);
// Store song recomendations
Route::post('song-recommendations', [SongRecommendationController::class, 'store']);
// Get User Genre
Route::get('user-genres', [UserGenreController::class, 'index']);
// Store User Genre
Route::post('user-genres', [UserGenreController::class, 'store']);

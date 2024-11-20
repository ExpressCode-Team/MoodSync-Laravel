<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SpotifyController;
use App\Services\SpotifyServices;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// Route::group([
//     'middleware' => 'api',
//     'prefix' => 'auth'
// ], function ($router) {
//     Route::post('/register', [AuthController::class, 'register'])->name('register');
//     Route::post('/login', [AuthController::class, 'login'])->name('login');
//     Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api')->name('logout');
//     Route::post('/refresh', [AuthController::class, 'refresh'])->middleware('auth:api')->name('refresh');
//     Route::post('/me', [AuthController::class, 'me'])->middleware('auth:api')->name('me');
// });

Route::get('/login', function (SpotifyServices $spotifyService) {
    return redirect($spotifyService->getAuthorizationUrl());
});
Route::get('/callback', [SpotifyController::class, 'handleCallback']);
Route::get('/spotify/access-token', [SpotifyController::class, 'getAccessToken']);
Route::get('/spotify/artist/{id}', [SpotifyController::class, 'getArtistData']);
Route::get('/playlists', [SpotifyController::class, 'getUserPlaylists']);


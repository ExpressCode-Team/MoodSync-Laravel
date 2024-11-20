<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\SpotifyController;
use App\Services\SpotifyServices;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return redirect('/admin');
});

Route::get('/login', function (SpotifyServices $spotifyService) {
    return redirect($spotifyService->getAuthorizationUrl());
});
Route::get('/callback', [SpotifyController::class, 'handleCallback']);
Route::get('/spotify/access-token', [SpotifyController::class, 'getAccessToken']);
Route::get('/spotify/artist/{id}', [SpotifyController::class, 'getArtistData']);
Route::get('/playlists', [SpotifyController::class, 'getUserPlaylists']);
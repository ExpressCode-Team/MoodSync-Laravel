<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Services\SpotifyServices;
use GuzzleHttp\Client;

class SpotifyController extends Controller
{

    protected $spotifyService;
    public function getAccessToken()
    {
        $clientId = env('SPOTIFY_CLIENT_ID');
        $clientSecret = env('SPOTIFY_CLIENT_SECRET');

        // Spotify token URL
        $url = 'https://accounts.spotify.com/api/token';

        // Request the access token using client credentials
        $response = Http::asForm()->post($url, [
            'grant_type' => 'client_credentials',
            'client_id' => $clientId,
            'client_secret' => $clientSecret,
        ]);

        // Get the access token from the response
        $accessToken = $response->json()['access_token'];

        return $accessToken;
    }

    public function getArtistData($artistId)
    {
        $accessToken = $this->getAccessToken();

        $url = "https://api.spotify.com/v1/artists/{$artistId}";

        // Fetch artist data
        $response = Http::withToken($accessToken)->get($url);

        return response()->json($response->json());
    }

    public function __construct(SpotifyServices $spotifyService)    
    {
        $this->spotifyService = $spotifyService;
    }

    public function redirectToSpotify()
    {
        return redirect($this->spotifyService->getAuthorizationUrl());
    }

    public function handleCallback(Request $request)
    {
        $code = $request->query('code');

        if (!$code) {
            return redirect('/login')->with('error', 'Authorization failed');
        }

        $tokenData = $this->spotifyService->getAccessToken($code);

        session(['spotify_token' => $tokenData['access_token']]);

        return response()->json($tokenData);
    }

    // Method untuk mendapatkan playlist pengguna
    public function getUserPlaylists()
    {
        // Ambil token akses dari session
        $accessToken = session('spotify_token');

        if (!$accessToken) {
            // Jika token tidak ada, kembalikan error
            return response()->json(['error' => 'You need to log in with Spotify'], 401);
        }

        // Panggil layanan untuk mengambil data playlist
        $playlists = $this->spotifyService->getUserPlaylists($accessToken);

        if (!$playlists) {
            // Jika respons kosong atau gagal, kembalikan error
            return response()->json(['error' => 'Failed to fetch playlists from Spotify'], 500);
        }

        // Kembalikan daftar playlist dalam format JSON
        return response()->json($playlists);
    }

    public function getUserProfile()
    {
        $accessToken = session('spotify_token');

        if (!$accessToken) {
            return response()->json(['error' => 'You need to log in with Spotify'], 401);
        }

        $profile = $this->spotifyService->getUserProfile($accessToken);

        return response()->json($profile);
    }
}

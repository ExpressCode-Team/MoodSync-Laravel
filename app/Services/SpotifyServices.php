<?php

namespace App\Services;

use GuzzleHttp\Client;

class SpotifyServices 
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://accounts.spotify.com/',
            'timeout'  => 10.0,
        ]);
    }

    public function getAuthorizationUrl()
    {
        $query = http_build_query([
            'client_id'     => env('SPOTIFY_CLIENT_ID'),
            'response_type' => 'code',
            'redirect_uri'  => env('SPOTIFY_REDIRECT_URI'),
            'scope'         => 'user-read-private user-read-email',
        ]);

        return "https://accounts.spotify.com/authorize?$query";
    }

    public function getAccessToken($authorizationCode)
    {
        $response = $this->client->post('api/token', [
            'form_params' => [
                'grant_type'    => 'authorization_code',
                'code'          => $authorizationCode,
                'redirect_uri'  => env('SPOTIFY_REDIRECT_URI'),
                'client_id'     => env('SPOTIFY_CLIENT_ID'),
                'client_secret' => env('SPOTIFY_CLIENT_SECRET'),
            ],
        ]);

        return json_decode($response->getBody(), true);
    }

    public function refreshAccessToken($refreshToken)
    {
        $response = $this->client->post('api/token', [
            'form_params' => [
                'grant_type'    => 'refresh_token',
                'refresh_token' => $refreshToken,
                'client_id'     => env('SPOTIFY_CLIENT_ID'),
                'client_secret' => env('SPOTIFY_CLIENT_SECRET'),
            ],
        ]);

        return json_decode($response->getBody(), true);
    }

    public function getUserPlaylists($accessToken)
    {
        $client = new Client();

        // Permintaan ke Spotify API untuk mendapatkan daftar playlist
        $response = $client->get('https://api.spotify.com/v1/me/playlists', [
            'headers' => [
                'Authorization' => 'Bearer ' . $accessToken,
            ],
        ]);

        // Mengembalikan hasil respons JSON
        return json_decode($response->getBody()->getContents(), true);
    }

    public function getUserProfile($accessToken)
    {
        $response = $this->client->get('https://api.spotify.com/v1/me', [
            'headers' => [
                'Authorization' => 'Bearer ' . $accessToken,
            ],
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }
}

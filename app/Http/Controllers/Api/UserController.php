<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    /**
     * Store a newly created user or update existing user based on data from Spotify API.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Get the access token from request header
        $accessToken = $request->header('access_token');
        if (!$accessToken) {
            return response()->json([
                'message' => 'Access token is required.',
                'status' => 400
            ], 400);
        }

        // Fetch data from Spotify API
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
        ])->get('https://api.spotify.com/v1/me');

        if ($response->failed()) {
            return response()->json([
                'message' => 'Failed to retrieve data from Spotify.',
                'status' => 400
            ], 400);
        }

        $spotifyData = $response->json();

        // Ensure Spotify data exists
        if (!isset($spotifyData['id'])) {
            return response()->json([
                'message' => 'Invalid Spotify data.',
                'status' => 400
            ], 400);
        }

        // Check if the user already exists in the database based on Spotify ID
        $user = User::where('spotify_id', $spotifyData['id'])->first();

        if ($user) {
            // Update existing user
            $user->update([
                'name' => $spotifyData['display_name'] ?? $user->name,
                'email' => $spotifyData['email'] ?? $user->email,
                'images' => isset($spotifyData['images'][0]['url']) ? $spotifyData['images'][0]['url'] : $user->images,
                'external_urls' => $spotifyData['external_urls']['spotify'] ?? $user->external_urls,
                'followers' => $spotifyData['followers']['total'] ?? $user->followers,
                'role' => $request->role ?? $user->role,
                'country' => $request->country ?? $user->country,
                'product' => $request->product ?? $user->product,
            ]);

            return response()->json([
                'message' => 'User updated successfully.',
                'status' => 200,
                'user' => $user,
            ], 200);
        } else {
            // Create new user if not found
            $user = User::create([
                'spotify_id' => $spotifyData['id'],
                'name' => $spotifyData['display_name'] ?? 'Unknown',
                'email' => $spotifyData['email'] ?? 'unknown@example.com',
                'images' => isset($spotifyData['images'][0]['url']) ? $spotifyData['images'][0]['url'] : null,
                'external_urls' => $spotifyData['external_urls']['spotify'] ?? null,
                'followers' => $spotifyData['followers']['total'] ?? 0,
                'role' => $request->role ?? 0,
                'country' => $request->country ?? 'ID',  // Default to 'ID' if not provided
                'product' => $request->product ?? 'Free', // Default to 'Free' if not provided
            ]);

            return response()->json([
                'message' => 'User created successfully.',
                'status' => 201,
                'user' => $user,
            ], 201);
        }
    }

    /**
     * Retrieve user data by Spotify ID.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $spotifyId = $request->query('id');
    
        if (!$spotifyId) {
            return response()->json([
                'message' => 'Spotify ID (id) is required.',
                'status' => 400
            ], 400);
        }
    
        $user = User::where('spotify_id', $spotifyId)->first();
    
        if (!$user) {
            return response()->json([
                'message' => 'User not found.',
                'status' => 404
            ], 404);
        }

        return response()->json([
            'message' => 'User retrieved successfully.',
            'status'=> 200,
            'user' => [
                'user_id' => $user->id,
                'id' => $user->spotify_id,
                'name' => $user->name,
                'email' => $user->email,
                'images' => $user->images,
                'external_urls' => $user->external_urls,
                'followers' => $user->followers,
                'role' => $user->role,
                'country' => $user->country,
                'product' => $user->product,
                'created_at' => $user->created_at,
                'updated_at' => $user->updated_at,
            ],
        ], 200);
    }
}
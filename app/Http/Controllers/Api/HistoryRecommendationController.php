<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\HistoryRecommendation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;  // Import the HTTP facade for making HTTP requests

class HistoryRecommendationController extends Controller
{
    /**
     * Get history recommendations for a user using the Spotify access_token.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        // Get the access_token from the Authorization header
        $accessToken = $request->header('access_token'); // Use 'access_token' header

        // Check if access token is provided
        if (!$accessToken) {
            return response()->json([
                'message' => 'access_token is required.',
                'status' => 400,
            ], 400);
        }

        // Call Spotify API to get user data
        $spotifyResponse = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken
        ])->get('https://api.spotify.com/v1/me');

        // Check if Spotify API request was successful
        if ($spotifyResponse->failed()) {
            return response()->json([
                'message' => 'Failed to fetch user data from Spotify.',
                'status' => 401,
            ], 401);
        }

        // Extract the spotify_id from the response
        $spotifyId = $spotifyResponse->json()['id'];

        // Find the user by spotify_id
        $user = User::where('spotify_id', $spotifyId)->first();

        // If user not found, return an error message
        if (!$user) {
            return response()->json([
                'message' => 'User with the given Spotify ID not found.',
                'status' => 404,
            ], 404);
        }

        // Fetch all history recommendations for the found user, in reverse chronological order
        $historyRecommendations = HistoryRecommendation::where('id_user', $user->id)->orderBy('created_at', 'desc')->get();

        return response()->json([
            'message' => 'History recommendations retrieved successfully.',
            'status' => 200,
            'data' => $historyRecommendations,
        ], 200);
    }

    /**
     * Store a newly created history recommendation.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */ public function store(Request $request)
    {
        // Validate the input data for POST request
        $validator = Validator::make($request->all(), [
            'type' => 'required|in:song,playlist',
            'recommendation_id' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Get the access_token from the Authorization header
        $accessToken = $request->header('access_token'); // Use 'access_token' header

        // Check if access token is provided
        if (!$accessToken) {
            return response()->json([
                'message' => 'access_token is required.',
                'status' => 400,
            ], 400);
        }

        // Call Spotify API to get user data
        $spotifyResponse = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken
        ])->get('https://api.spotify.com/v1/me');

        // Check if Spotify API request was successful
        if ($spotifyResponse->failed()) {
            return response()->json([
                'message' => 'Failed to fetch user data from Spotify.',
                'status' => 401,
            ], 401);
        }

        // Extract the spotify_id from the response
        $spotifyId = $spotifyResponse->json()['id'];

        // Find the user by spotify_id
        $user = User::where('spotify_id', $spotifyId)->first();

        // If user not found, return an error message
        if (!$user) {
            return response()->json([
                'message' => 'User with the given Spotify ID not found.',
                'status' => 404,
            ], 404);
        }

        // Create a new history recommendation entry
        $historyRecommendation = HistoryRecommendation::create([
            'id_user' => $user->id,  // Using user_id from the found user
            'type' => $request->type,
            'recommendation_id' => $request->recommendation_id,
        ]);

        return response()->json([
            'message' => 'History recommendation created successfully.',
            'status' => 201,
            'data' => $historyRecommendation,
        ], 201);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\HistoryExpression;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HistoryExpressionController extends Controller
{
    /**
     * Get history expressions for a user using id (spotify_id).
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        // Get the id (spotify_id) from the query parameters
        $spotifyId = $request->query('id');

        // Check if id (spotify_id) is provided
        if (!$spotifyId) {
            return response()->json([
                'message' => 'Spotify ID (id) is required.',
                'status' => 400,
            ], 400);
        }

        // Find the user by spotify_id
        $user = User::where('spotify_id', $spotifyId)->first();

        // If user not found, return an error message
        if (!$user) {
            return response()->json([
                'message' => 'User with the given Spotify ID not found.',
                'status' => 404,
            ], 404);
        }

        // Fetch all history expressions for the found user
        $historyExpressions = HistoryExpression::where('user_id', $user->id)->get();

        return response()->json([
            'message' => 'History expressions retrieved successfully.',
            'status' => 200,
            'data' => $historyExpressions,
        ], 200);
    }

    /**
     * Store a newly created history expression.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        // Validate the input data for POST request
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:users,spotify_id',  // id is now spotify_id
            'expression_id' => 'required|exists:expressions,expression_id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Find the user by spotify_id
        $user = User::where('spotify_id', $request->id)->first();

        // Create a new history expression entry
        $historyExpression = HistoryExpression::create([
            'user_id' => $user->id,  // Using user_id from the found user
            'expression_id' => $request->expression_id,
        ]);

        return response()->json([
            'message' => 'History expression created successfully.',
            'status' => 201,
            'data' => $historyExpression,
        ], 201);
    }
}

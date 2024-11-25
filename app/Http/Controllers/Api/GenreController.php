<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GenreController extends Controller
{
    /**
     * Retrieve genres.
     * If `id` is provided, fetch a single genre; otherwise, fetch all genres.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        // Check for `id` query parameter
        $genreId = $request->query('id');

        if ($genreId) {
            // Fetch a single genre by ID
            $genre = Genre::find($genreId);

            if (!$genre) {
                return response()->json([
                    'message' => 'Genre not found.',
                    'status' => 404,
                ], 404);
            }

            return response()->json([
                'message' => 'Genre retrieved successfully.',
                'status' => 200,
                'data' => $genre,
            ], 200);
        }

        // Fetch all genres if no `id` is provided
        $genres = Genre::all();

        return response()->json([
            'message' => 'Genres retrieved successfully.',
            'status' => 200,
            'data' => $genres,
        ], 200);
    }   
}

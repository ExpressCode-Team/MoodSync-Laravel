<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SongRecommendation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SongRecommendationController extends Controller
{
    /**
     * Get song recommendations for a user by their spotify_id (id in query).
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        // Ambil parameter 'id' dari query (spotify_id)
        $spotifyId = $request->query('id');

        // Jika 'id' tidak diberikan, kembalikan respons error
        if (!$spotifyId) {
            return response()->json([
                'message' => 'Spotify ID (id) is required.',
                'status' => 400,
            ], 400);
        }

        // Cari pengguna berdasarkan spotify_id
        $user = User::where('spotify_id', $spotifyId)->first();

        // Jika pengguna tidak ditemukan, kembalikan respons error
        if (!$user) {
            return response()->json([
                'message' => 'User with the given Spotify ID not found.',
                'status' => 404,
            ], 404);
        }

        // Ambil semua rekomendasi lagu untuk pengguna tersebut
        $songRecommendations = SongRecommendation::where('user_id', $user->id)->get();

        // Kembalikan respons sukses dengan data rekomendasi lagu
        return response()->json([
            'message' => 'Song recommendations retrieved successfully.',
            'status' => 200,
            'data' => $songRecommendations,
        ], 200);
    }

    /**
     * Store a newly created song recommendation.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        // Validasi input data
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:users,spotify_id', // Validasi spotify_id
            'song_id' => 'required|string|max:255',
            'like' => 'required|integer|min:0|max:1', 
            'recommendation_date' => 'date',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Cari pengguna berdasarkan spotify_id
        $user = User::where('spotify_id', $request->id)->first();

        // Jika pengguna tidak ditemukan
        if (!$user) {
            return response()->json([
                'message' => 'User with the given Spotify ID not found.',
                'status' => 404,
            ], 404);
        }

        // Simpan rekomendasi lagu
        $songRecommendation = SongRecommendation::create([
            'user_id' => $user->id,
            'song_id' => $request->song_id,
            'like' => $request->like,
            'recommendation_date'=> now(),
        ]);

        return response()->json([
            'message' => 'Song recommendation created successfully.',
            'status' => 201,
            'data' => $songRecommendation,
        ], 201);
    }
}

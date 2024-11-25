<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserGenre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserGenreController extends Controller
{
    /**
     * Get all genres for a user by spotify_id.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        // Ambil parameter `id` dari query (spotify_id pada database)
        $spotifyId = $request->query('id');

        // Validasi spotify_id
        if (!$spotifyId) {
            return response()->json([
                'message' => 'Spotify ID is required.',
                'status' => 400
            ], 400);
        }

        // Cari user berdasarkan spotify_id
        $user = \App\Models\User::where('spotify_id', $spotifyId)->first();

        // Jika user tidak ditemukan
        if (!$user) {
            return response()->json([
                'message' => 'User not found.',
                'status' => 404
            ], 404);
        }

        // Ambil semua genre yang terkait dengan user tanpa menggunakan relasi
        $userGenres = UserGenre::where('user_id', $user->id)->get();

        return response()->json([
            'message' => 'User genres retrieved successfully.',
            'status' => 200,
            'data' => $userGenres,
        ], 200);
    }

    /**
     * Store a new user genre.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function store(Request $request)
    {
        // Tentukan input genres (dapat berasal dari query params atau JSON body)
        $genres = $request->query('genres') ?: $request->input('genres');

        // Validasi input data
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:users,spotify_id', // Validasi spotify_id
            'genres' => 'required|array', // Harus berupa array
            'genres.*' => 'required|exists:genres,genre_id', // Setiap genre_id harus ada dalam tabel genres
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Cari pengguna berdasarkan spotify_id
        $user = \App\Models\User::where('spotify_id', $request->id)->first();

        // Jika pengguna tidak ditemukan
        if (!$user) {
            return response()->json([
                'message' => 'User with the given Spotify ID not found.',
                'status' => 404,
            ], 404);
        }

        // Array untuk menyimpan data user genre yang akan dimasukkan
        $userGenresData = [];
        foreach ($genres as $genreId) {
            $userGenresData[] = [
                'user_id' => $user->id,
                'genre_id' => $genreId,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Simpan semua genre dalam satu transaksi
        UserGenre::insert($userGenresData);

        return response()->json([
            'message' => 'User genres created successfully.',
            'status' => 201,
        ], 201);
    }
}

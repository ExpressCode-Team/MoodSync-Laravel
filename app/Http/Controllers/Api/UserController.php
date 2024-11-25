<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Store a newly created user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'id' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'nullable|string|min:8|confirmed',
            'images' => 'nullable|string',
            'external_urls' => 'nullable|string',
            'followers' => 'nullable|integer',
            'role' => 'nullable|integer',
            'country' => 'required|string|max:2',
            'product' => 'required|string|max:255',
        ]);
    
        // Jika validasi gagal
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
    
        // Cari user berdasarkan spotify_id
        $user = User::where('spotify_id', $request->id)->first();
    
        if ($user) {
            // Update user jika spotify_id sudah ada
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'images' => $request->images ?? $user->images,
                'external_urls' => $request->external_urls ?? $user->external_urls,
                'followers' => $request->followers ?? $user->followers,
                'role' => $request->role ?? $user->role,
                'country' => $request->country,
                'product' => $request->product,
            ]);
    
            return response()->json([
                'message' => 'User updated successfully',
                'status' => 200,
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
        } else {
            // Buat user baru jika spotify_id belum ada
            $user = User::create([
                'id' => $request->user_id,
                'spotify_id' => $request->id,
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password ? Hash::make($request->password) : null,
                'images' => $request->images,
                'external_urls' => $request->external_urls,
                'followers' => $request->followers ?? 0,
                'role' => $request->role ?? 0,
                'country' => $request->country,
                'product' => $request->product,
            ]);
    
            return response()->json([
                'message' => 'User created successfully',
                'status' => 201,
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
            ], 201);
        }
    }    

    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Ambil parameter `id` dari request (spotify_id pada database)
        $spotifyId = $request->query('id');
    
        // Jika `id` tidak diberikan, kembalikan respons error
        if (!$spotifyId) {
            return response()->json([
                'message' => 'Spotify ID (id) is required.',
                'status' => 400
            ], 400);
        }
    
        // Query user berdasarkan `spotify_id`
        $user = User::where('spotify_id', $spotifyId)->first();
    
        // Jika user tidak ditemukan, kembalikan respons not found
        if (!$user) {
            return response()->json([
                'message' => 'User not found.',
                'status' => '404'
            ], 404);
        }

        // Respone berhasil
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
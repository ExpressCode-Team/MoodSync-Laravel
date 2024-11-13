<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use Carbon\Carbon;

class FeedbackController extends Controller
{
    public function index(Request $request)
    {
        // Filter Harian
        $daily = Feedback::whereDate('created_at', Carbon::today())->get();
        $daily_avg = $daily->avg('rating');
        $daily_counts = $daily->groupBy('rating')->map->count();
        $daily_total = $daily->count(); // Total feedback harian
    
        // Filter Mingguan
        $weekly = Feedback::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
        $weekly_avg = $weekly->avg('rating');
        $weekly_counts = $weekly->groupBy('rating')->map->count();
        $weekly_total = $weekly->count(); // Total feedback mingguan
    
        // Filter Bulanan
        $monthly = Feedback::whereMonth('created_at', Carbon::now()->month)->get();
        $monthly_avg = $monthly->avg('rating');
        $monthly_counts = $monthly->groupBy('rating')->map->count();
        $monthly_total = $monthly->count(); // Total feedback bulanan
    
        // Perhitungan untuk keseluruhan
        $all_feedback = Feedback::all();
        $overall_avg = $all_feedback->avg('rating');
        $overall_counts = $all_feedback->groupBy('rating')->map->count();
        $overall_total = $all_feedback->count(); // Total feedback keseluruhan
    
        return view('feedback.index', compact(
            'daily_avg', 'daily_counts', 'daily_total',
            'weekly_avg', 'weekly_counts', 'weekly_total',
            'monthly_avg', 'monthly_counts', 'monthly_total',
            'overall_avg', 'overall_counts', 'overall_total'
        ));
    }    
    
     // Fungsi untuk menyimpan data feedback baru
     public function store(Request $request)
     {
         // Validasi input (opsional)
         $request->validate([
             'rating' => 'required|integer|between:1,5',  // Rating harus angka 1-5
             'comment' => 'nullable|string|max:255',  // Komentar opsional
         ]);
 
         // Simpan data feedback
         $feedback = Feedback::create([
             'rating' => $request->rating,
             'comment' => $request->comment,
         ]);
 
         // Response JSON jika berhasil
         return response()->json([
             'message' => 'Feedback berhasil disimpan!',
             'feedback' => $feedback,
         ], 201);
     }
}
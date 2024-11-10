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
    
        // Filter Mingguan
        $weekly = Feedback::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
        $weekly_avg = $weekly->avg('rating');
        $weekly_counts = $weekly->groupBy('rating')->map->count();
    
        // Filter Bulanan
        $monthly = Feedback::whereMonth('created_at', Carbon::now()->month)->get();
        $monthly_avg = $monthly->avg('rating');
        $monthly_counts = $monthly->groupBy('rating')->map->count();
    
        // Perhitungan untuk keseluruhan
        $all_feedback = Feedback::all();
        $overall_avg = $all_feedback->avg('rating');
        $overall_counts = $all_feedback->groupBy('rating')->map->count();
    
        return view('feedback.index', compact( 'daily_avg', 'daily_counts', 'weekly_avg', 'weekly_counts', 'monthly_avg', 'monthly_counts', 'overall_avg', 'overall_counts'));
    }    
}

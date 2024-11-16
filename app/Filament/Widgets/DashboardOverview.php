<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Feedback;
use App\Models\User;
use Carbon\Carbon;
use Filament\Widgets\Concerns\InteractsWithPageFilters;

class DashboardOverview extends BaseWidget
{
    use InteractsWithPageFilters;

    protected function getStats(): array
    {   
        // Get start and end dates from filters, using the filter method provided by the InteractsWithPageFilters trait
        $startDate = $this->filters['startDate'];
        $endDate = $this->filters['endDate'];

        // If no filters are set, we fallback to a default range (for example, the last 30 days)
        $startDate = $startDate ? Carbon::parse($startDate) : Carbon::now()->subDays(30);
        $endDate = $endDate ? Carbon::parse($endDate)->endOfDay() : Carbon::now()->endOfDay();

        // Get filtered feedback count based on startDate and endDate
        $filteredFeedbackCount = Feedback::whereBetween('created_at', [$startDate, $endDate])->count();

        // Get filtered average rating based on startDate and endDate
        $filteredAverageRating = Feedback::whereBetween('created_at', [$startDate, $endDate])->avg('rating');

        // Get the total user count created within the date range
        $filteredUserCount = User::whereBetween('created_at', [$startDate, $endDate])->count();

        // Get the total user count (regardless of the date filter)
        $totalUserCount = User::count();

        return [
            Stat::make('Total Rating', $filteredFeedbackCount),
            Stat::make('Average Rating', round($filteredAverageRating, 2)),
            // Stat::make('Total User Created', $filteredUserCount),
            Stat::make('Total Users', $totalUserCount),
        ];
    }
}

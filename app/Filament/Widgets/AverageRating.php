<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Feedback;
use Carbon\Carbon;
use Filament\Widgets\Concerns\InteractsWithPageFilters;

class AverageRating extends ChartWidget
{
    use InteractsWithPageFilters;

    protected static ?string $heading = 'Average Rating';
    protected static string $color = 'success';
    protected static ?int $sort = 3;

    // Get the chart data
    protected function getData(): array
    {
        // Get start and end dates from filters
        $startDate = $this->filters['startDate'];
        $endDate = $this->filters['endDate'];

        // If no filters are set, we fallback to a default range (e.g., the last 5 months)
        $startDate = $startDate ? Carbon::parse($startDate) : Carbon::now()->subMonths(5);
        $endDate = $endDate ? Carbon::parse($endDate)->endOfDay() : Carbon::now()->endOfDay();

        // Get feedback data with average ratings per month within the filtered date range
        $feedbackData = Feedback::selectRaw('
                DATE_FORMAT(created_at, "%Y-%m") as month, AVG(rating) as avg_rating
            ')
            ->whereBetween('created_at', [$startDate, $endDate]) // Apply the date filter
            ->groupBy('month')
            ->orderByDesc('month')
            ->get();

        $labels = [];
        $data = [];

        // Loop through the results and prepare the labels and data
        foreach ($feedbackData as $feedback) {
            $labels[] = Carbon::parse($feedback->month)->format('M Y');
            // Add the average rating for that month
            $data[] = round($feedback->avg_rating, 2);
        }

        // Return the chart data in the expected format
        return [
            'datasets' => [
                [
                    'label' => 'Average Rating',
                    'data' => $data,
                    'lineTension' => 0.1,
                ],
            ],
            'labels' => $labels, // X-axis labels for the chart
        ];
    }

    protected function getType(): string
    {
        return 'line'; // Line chart to show the trend of ratings
    }
}

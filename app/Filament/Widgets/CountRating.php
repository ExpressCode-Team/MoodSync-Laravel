<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Feedback;
use Carbon\Carbon;
use Filament\Widgets\Concerns\InteractsWithPageFilters;

class CountRating extends ChartWidget
{
    use InteractsWithPageFilters;

    protected static ?string $heading = 'Rating Count';
    protected static string $color = 'success';
    protected static ?int $sort = 2;

    // Get the chart data
    protected function getData(): array
    {
        // Get start and end dates from filters
        $startDate = $this->filters['startDate'];
        $endDate = $this->filters['endDate'];
        // If no filters are set, we fallback to a default range (e.g., the last 30 days)
        $startDate = $startDate ? Carbon::parse($startDate) : Carbon::now()->subDays(30);
        $endDate = $endDate ? Carbon::parse($endDate)->endOfDay() : Carbon::now()->endOfDay();

        // Count the number of ratings for each value (1, 2, 3, 4, 5) within the selected date range
        $feedbackData = Feedback::selectRaw('rating, COUNT(id) as rating_count')
            ->whereBetween('created_at', [$startDate, $endDate]) // Apply the date filter
            ->groupBy('rating')
            ->pluck('rating_count', 'rating') // Retrieve counts grouped by rating
            ->toArray();

        // Ensure all ratings (1 to 5) are included in the data, even if some have 0 counts
        $data = [];
        for ($i = 1; $i <= 5; $i++) {
            $data[] = $feedbackData[$i] ?? 0; // If no ratings for a specific value, set count to 0
        }

        // Labels for the x-axis (showing rating values 1 to 5)
        $labels = ['1', '2', '3', '4', '5'];

        // Calculate the minimum y-axis value dynamically, avoiding 0 if possible
        // Check if the $data array has any non-zero elements
        $nonZeroData = array_filter($data);
        $minY = !empty($nonZeroData) ? min($nonZeroData) : 0; // Ensure $minY defaults to 0 if $data is empty

        // Return the chart data in the expected format
        return [
            'datasets' => [
                [
                    'label' => 'Rating Count',
                    'data' => $data,
                    'borderWidth' => 1, // Border width for bars
                ],
            ],
            'labels' => $labels, // X-axis labels showing the rating values
            'options' => [
                'scales' => [
                    'y' => [
                        'beginAtZero' => true, // Ensure chart starts at zero
                        'min' => $minY, // Set the minimum value to the smallest rating count or 0
                    ],
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'bar'; // Bar chart to show the count as a bar
    }
}

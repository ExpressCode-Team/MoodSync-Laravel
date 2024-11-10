<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback List</title>
</head>
<body>
    <!-- Bagian Harian -->
    <h1>Daily Feedbacks</h1>
    <table border="1">
        <tr>
            <th>Rating Value</th>
            <th>Count</th>
        </tr>
        @for ($i = 1; $i <= 5; $i++)
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $daily_counts->get($i, 0) }}</td>
            </tr>
        @endfor
    </table>
    <p>Average Rating: {{ number_format($daily_avg, 2) }}</p>

    <!-- Bagian Mingguan -->
    <h1>Weekly Feedbacks</h1>
    <table border="1">
        <tr>
            <th>Rating Value</th>
            <th>Count</th>
        </tr>
        @for ($i = 1; $i <= 5; $i++)
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $weekly_counts->get($i, 0) }}</td>
            </tr>
        @endfor
    </table>
    <p>Average Rating: {{ number_format($weekly_avg, 2) }}</p>

    <!-- Bagian Bulanan -->
    <h1>Monthly Feedbacks</h1>
    <table border="1">
        <tr>
            <th>Rating Value</th>
            <th>Count</th>
        </tr>
        @for ($i = 1; $i <= 5; $i++)
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $monthly_counts->get($i, 0) }}</td>
            </tr>
        @endfor
    </table>
    <p>Average Rating: {{ number_format($monthly_avg, 2) }}</p>

    <!-- Bagian Keseluruhan -->
    <h1>Overall Feedbacks</h1>
    <table border="1">
        <tr>
            <th>Rating Value</th>
            <th>Count</th>
        </tr>
        @for ($i = 1; $i <= 5; $i++)
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $overall_counts->get($i, 0) }}</td>
            </tr>
        @endfor
    </table>
    <p>Average Rating: {{ number_format($overall_avg, 2) }}</p>
</body>
</html>

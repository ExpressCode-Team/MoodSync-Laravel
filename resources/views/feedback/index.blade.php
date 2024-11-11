<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback List</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #121212; /* Dark background */
            color: #FFFFFF; /* White text */
        }
        h1 {
            color: #3ae075; /* Spotify green */
            font-size: 1.5rem; /* Smaller heading */
        }
        table {
            background-color: #1f1f1f; /* Darker table background */
            font-size: 0.9rem; /* Smaller font size */
            width: 100%; /* Full width for tables */
        }
        th, td {
            text-align: center;
            border: 1px solid #3ae075; /* Green borders */
        }
        th {
            background-color: #3ae075; /* Green header */
            color: #FFFFFF; /* White text for header */
        }
        p {
            color: #FFFFFF; /* White text for paragraphs */
        }
        .table-container {
            margin: 10px; /* Add some margin around tables */
        }
        .stars {
            color: #FFD700; /* Gold color for stars */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <!-- Bagian Harian -->
            <div class="col-md-3 table-container">
                <h1>Daily Feedbacks</h1>
                <table class="table table-dark table-bordered">
                    <thead>
                        <tr>
                            <th>Rating Value</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1 <span class="stars">★</span></td>
                            <td>{{ $daily_counts->get(1, 0) }}</td>
                        </tr>
                        <tr>
                            <td>2 <span class="stars">★</span></td>
                            <td>{{ $daily_counts->get(2, 0) }}</td>
                        </tr>
                        <tr>
                            <td>3 <span class="stars">★</span></td>
                            <td>{{ $daily_counts->get(3, 0) }}</td>
                        </tr>
                        <tr>
                            <td>4 <span class="stars">★</span></td>
                            <td>{{ $daily_counts->get(4, 0) }}</td>
                        </tr>
                        <tr>
                            <td>5 <span class="stars">★</span></td>
                            <td>{{ $daily_counts->get(5, 0) }}</td>
                        </tr>
                    </tbody>
                </table>
                <p>Average Rating: {{ number_format($daily_avg, 2) }}</p>
            </div>

            <!-- Bagian Mingguan -->
            <div class="col-md-3 table-container">
                <h1>Weekly Feedbacks</h1>
                <table class="table table-dark table-bordered">
                    <thead>
                        <tr>
                            <th>Rating Value</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1 <span class="stars">★</span></td>
                            <td>{{ $weekly_counts->get(1, 0) }}</td>
                        </tr>
                        <tr>
                            <td>2 <span class="stars">★</span></td>
                            <td>{{ $weekly_counts->get(2, 0) }}</td>
                        </tr>
                        <tr>
                            <td>3 <span class="stars">★</span></td>
                            <td>{{ $weekly_counts->get(3, 0) }}</td>
                        </tr>
                        <tr>
                            <td>4 <span class="stars">★</span></td>
                            <td>{{ $weekly_counts->get(4, 0) }}</td>
                        </tr>
                        <tr>
                            <td>5 <span class="stars">★</span></td>
                            <td>{{ $weekly_counts->get(5, 0) }}</td>
                        </tr>
                    </tbody>
                </table>
                <p>Average Rating: {{ number_format($weekly_avg, 2) }}</p>
            </div>

            <!-- Bagian Bulanan -->
            <div class="col-md-3 table-container">
                <h1>Monthly Feedbacks</h1>
                <table class="table table-dark table-bordered">
                    <thead>
                        <tr>
                            <th>Rating Value</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1 <span class="stars">★</span></td>
                            <td>{{ $monthly_counts->get(1, 0) }}</td>
                        </tr>
                        <tr>
                            <td>2 <span class="stars">★</span></td>
                            <td>{{ $monthly_counts->get(2, 0) }}</td>
                        </tr>
                        <tr>
                            <td>3 <span class="stars">★</span></td>
                            <td>{{ $monthly_counts->get(3, 0) }}</td>
                        </tr>
                        <tr>
                            <td>4 <span class="stars">★</span></td>
                            <td>{{ $monthly_counts->get(4, 0) }}</td>
                        </tr>
                        <tr>
                            <td>5 <span class="stars">★</span></td>
                            <td>{{ $monthly_counts->get(5, 0) }}</td>
                        </tr>
                    </tbody>
                </table>
                <p>Average Rating: {{ number_format($monthly_avg, 2) }}</p>
            </div>

            <!-- Bagian Keseluruhan -->
            <div class="col-md-3 table-container">
                <h1>Overall Feedbacks</h1>
                <table class="table table-dark table-bordered">
                    <thead>
                        <tr>
                            <th>Rating Value</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1 <span class="stars">★</span></td>
                            <td>{{ $overall_counts->get(1, 0) }}</td>
                        </tr>
                        <tr>
                            <td>2 <span class="stars">★</span></td>
                            <td>{{ $overall_counts->get(2, 0) }}</td>
                        </tr>
                        <tr>
                            <td>3 <span class="stars">★</span></td>
                            <td>{{ $overall_counts->get(3, 0) }}</td>
                        </tr>
                        <tr>
                            <td>4 <span class="stars">★</span></td>
                            <td>{{ $overall_counts->get(4, 0) }}</td>
                        </tr>
                        <tr>
                            <td>5 <span class="stars">★</span></td>
                            <td>{{ $overall_counts->get(5, 0) }}</td>
                        </tr>
                    </tbody>
                </table>
                <p>Average Rating: {{ number_format($overall_avg, 2) }}</p>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
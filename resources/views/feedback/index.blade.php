@extends('layouts.app')

@section('title', 'Feedbacks Overview')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Bagian Harian -->
        <div class="col-md-4 table-container">
            <h1 class="text-black">Daily Feedbacks</h1> <!-- Ubah warna judul -->
            <div class="table-responsive">
                <table class="table table-bordered border-3">
                    <thead>
                        <tr>
                            <th>Rating Value</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach([1, 2, 3, 4, 5] as $rating)
                            <tr>
                                <td>{{ $rating }} <span class="stars">★</span></td>
                                <td>{{ $daily_counts->get($rating, 0) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <p class="text-black">Average Rating: {{ number_format($daily_avg, 2) }}</p> <!-- Ubah warna Average Rating -->
            <p class="text-black">Total Feedbacks: {{ $daily_total }}</p> <!-- Tambahkan total feedback -->
        </div>

        <!-- Bagian Mingguan -->
        <div class="col-md-4 table-container">
            <h1 class="text-black">Weekly Feedbacks</h1> <!-- Ubah warna judul -->
            <div class="table-responsive">
                <table class="table table-bordered border-3">
                    <thead>
                        <tr>
                            <th>Rating Value</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach([1, 2, 3, 4, 5] as $rating)
                            <tr>
                                <td>{{ $rating }} <span class="stars">★</span></td>
                                <td>{{ $weekly_counts->get($rating, 0) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <p class="text-black">Average Rating: {{ number_format($weekly_avg, 2) }}</p> <!-- Ubah warna Average Rating -->
            <p class="text-black">Total Feedbacks: {{ $weekly_total }}</p> <!-- Tambahkan total feedback -->
        </div>
    </div>

    <div class="row">
        <!-- Bagian Bulanan -->
        <div class="col-md-4 table-container">
            <h1 class="text-black">Monthly Feedbacks</h1> <!-- Ubah warna judul -->
            <div class="table-responsive">
                <table class="table table-bordered border-3">
                    <thead>
                        <tr>
                            <th>Rating Value</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach([1, 2, 3, 4, 5] as $rating)
                            <tr>
                                <td>{{ $rating }} <span class="stars">★</span></td>
                                <td>{{ $monthly_counts->get($rating, 0) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <p class="text-black">Average Rating: {{ number_format($monthly_avg, 2) }}</p> <!-- Ubah warna Average Rating -->
            <p class="text-black">Total Feedbacks: {{ $monthly_total }}</p> <!-- Tambahkan total feedback -->
        </div>

        <!-- Bagian Total Keseluruhan -->
        <div class="col-md-4 table-container">
            <h1 class="text-black">Overall Feedbacks</h1> <!-- Ubah warna judul -->
            <div class="table-responsive">
                <table class="table table-bordered border-3">
                    <thead>
                        <tr>
                            <th>Rating Value</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach([1, 2, 3, 4, 5] as $rating)
                            <tr>
                                <td>{{ $rating }} <span class="stars">★</span></td>
                                <td>{{ $overall_counts->get($rating, 0) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <p class="text-black">Average Rating: {{ number_format($overall_avg, 2) }}</p> <!-- Ubah warna Average Rating -->
            <p class="text-black">Total Feedbacks: {{ $overall_total }}</p> <!-- Tambahkan total feedback -->
        </div>
    </div>
</div>
@endsection

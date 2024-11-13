<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Feedback List')</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tambahkan link CSS di dalam <head> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">

    <!-- Tambahkan script JS sebelum penutupan tag </body> -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
    <style>
        /* Warna tambahan untuk tabel dan elemen lain */
        .bg-dark-custom {
            background-color: #ffffff !important;
        }

        .text-green {
            color: #3ae075 !important;
        }

        .bg-green {
            background-color: #3ae075 !important;
        }

        .star-gold {
            color: #FFD700 !important;
        }
    </style>
</head>

<body class="bg-dark-custom text-white">

    <!-- Sidebar -->
    <div class="d-flex">
        <div class="sidebar bg-dark text-white p-3" style="width: 250px; height: 100vh;">
            <h3 class="text-green">MoodSync</h3>
            <ul class="nav flex-column">
                <li class="nav-item mb-2">
                    <a class="nav-link text-white" href="/dashboard">Dashboard</a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link text-white" href="/users">User Accounts</a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link text-white" href="/feedbacks">Feedbacks</a>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content flex-grow-1 d-flex justify-content-center align-items-center"
            style="min-height: 100vh;">
            <div class="container">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Toggle sidebar on smaller screens (example for expanding/collapsing sidebar)
        document.querySelector('.navbar-toggler').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('d-none');
        });
    </script>
</body>

</html>

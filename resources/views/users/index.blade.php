@extends('layouts.app')

@section('content')
<h1>Users List</h1>

<!-- Tombol "Create User" di sebelah kanan -->
<a href="{{ route('users.create') }}" class="btn btn-primary mb-3 float-right">Create User</a>

<!-- Menambahkan pesan jika tidak ada pengguna -->
@if ($users->isEmpty())
    <div class="alert alert-warning">No users found.</div>
@else
    <table id="usersTable" class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <!-- Tautan untuk mengedit pengguna -->
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <!-- Form untuk menghapus pengguna -->
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this user?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

@endif

@endsection

@section('scripts')
<!-- Inisialisasi DataTables -->
<script>
    $(document).ready(function() {
        // Menginisialisasi DataTables untuk tabel dengan ID "usersTable"
        $('#usersTable').DataTable({
            "responsive": true,  // Membuat tabel responsif
            "paging": true,      // Menambahkan pagination
            "searching": true,   // Menambahkan fitur pencarian
            "ordering": true,    // Mengaktifkan fitur urutkan
            "lengthChange": false // Menonaktifkan fitur perubahan jumlah baris per halaman
        });
    });
</script>
@endsection

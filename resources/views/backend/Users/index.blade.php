<!-- resources/views/backend/users/index.blade.php -->
@extends('backend.layouts.index')
{{-- @extends('layouts.app') --}}

@section('content-header', 'Users')
@section('content')
    <div class="container">

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>User Type</th>
                    <th>Password</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->usertype }}</td>
                        <td>{{ $user->password ? 'Password diset' : '' }}</td>
                        {{-- <td>{{ $user->password }}</td> --}}
                        {{-- <td>Password diset</td> <!-- Menampilkan pesan teks -->
                        <!-- <td>{{ str_repeat('*', 8) }}</td> Menampilkan password dalam bentuk masked --> --}}
                        <td>
                            <a href="{{ route('backend.users.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

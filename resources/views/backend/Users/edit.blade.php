@extends('backend.layouts.index')

@section('content-header', 'Edit User')
@section('content')
    <div class="container">
        <h2>Edit User Type</h2>
        <form action="{{ route('backend.users.update', $user->id) }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" value="{{ $user->name }}" disabled>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" value="{{ $user->email }}" disabled>
            </div>

            <div class="form-group">
                <label for="usertype">User Type</label>
                <select class="form-control" id="usertype" name="usertype" required>
                    <option value="user" {{ $user->usertype == 'user' ? 'selected' : '' }}>User</option>
                    <option value="admin" {{ $user->usertype == 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('backend.users.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection

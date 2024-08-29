<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        // users = tabel yang ada ditabase, sedangkan User itu model nya
        // Mengambil semua data dari tabel users melalui model User
        $users = User::all();

        // Mengirim data users ke view backend/Users/index
        return view('backend.Users.index', compact('users'));
    }

    public function edit(User $user)
    {
        // Mengirim data user yang akan diedit ke view backend/Users/edit
        return view('backend.Users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        // Validasi input
        $request->validate([
            'usertype' => 'required|in:user,admin',
        ]);

        // Update usertype
        $user->usertype = $request->usertype;
        $user->save();

        // Redirect kembali ke halaman daftar user dengan pesan sukses
        return redirect()->route('backend.users.index')->with('success', 'User type updated successfully.');
    }
}

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
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Egulias\EmailValidator\Validation\DNSCheckValidation;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Egulias\EmailValidator\EmailValidator;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    
    public function store(Request $request): RedirectResponse
    {
        // Validasi input standar terlebih dahulu
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Validasi DNS untuk email
        $emailValidator = new EmailValidator();
        if (!$emailValidator->isValid($request->email, new DNSCheckValidation())) {
            Log::info('Email tidak valid: ' . $request->email);
            return redirect()->back()->withErrors(['email' => 'Email domain tidak valid.']);
        }

        // Lanjutkan proses pendaftaran jika validasi berhasil
        $usertype = $request->input('usertype', 'user');

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'usertype' => $usertype,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        // Kirim email verifikasi
        $user->sendEmailVerificationNotification();

        // Redirect ke halaman verifikasi
        return redirect()->route('verification.notice');
    }  


}

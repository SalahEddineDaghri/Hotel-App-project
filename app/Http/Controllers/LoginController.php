<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        return view('login.index');
    }

    public function register()
    {
        return view('login.register');
    }

    public function authenticate(Request $request)
    {
        // Validation simple ديال الحقول
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // تشيك واش الإيميل موجود فالداتاباز
        $userExists = \App\Models\User::where('email', $request->email)->exists();
        if (!$userExists) {
            return redirect('/login')->with('email_error', 'This email does not exist.');
        }

        $remember = $request->has('remember') ? true : false;
        $minutes = 1440;

        // محاولة تسجيل الدخول
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $remember)) {
            if ($request->has('remember')) {
                Cookie::queue('email', $request->email, $minutes);
                Cookie::queue('password', $request->password, $minutes);
            }
            return redirect()->intended('/')->with('success', 'Logged in successfully.');
        } else {
            // كلمة السر خطأ
            return redirect('/login')->with('password_error', 'Incorrect password.');
        }
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'username' => ['required', 'min:3', 'max:255'],
            'password' => ['required', 'min:3', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
        ]);

        if ($request->confirmation_password != $request->password) {
            return redirect('/register')->with('password_error', 'Password confirmation does not match.');
        }

        $p = Customer::create([
            'name' => $request->name
        ]);

        User::create([
            'username' => $request->username,
            'email' => $request->email, // ✅ Added
            'c_id' => $p->id,
            'password' => bcrypt($request->password)
        ]);

        // Alert::success('Success', "Let's Login!");
        return redirect('/login')->with('success', 'Registration successful. Please login.');
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login');
    }
}

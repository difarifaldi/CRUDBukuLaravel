<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function admin()
    {
        return view('login.admin', [
            'title' => 'Login Admin'
        ]);
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([ //nama credentials bebas
            'username' => 'required',
            'password' => 'required'
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();
            $isAdmin = false;
            foreach ($user->role as $role) {
                if ($role->nama == "Admin" || $role->nama == "admin") {
                    $isAdmin = true;
                    break;
                }
            }
            if ($isAdmin) {
                return redirect('/profile')->with('success', 'Login Berhasil');
            } else {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return redirect('/loginAdmin')->with('loginError', 'Khusus Role Admin !');
            }
        }

        return back()->with('loginError', 'Login Gagal !');
        dd("berhasil login");
    }


    public function user()
    {
        return view('login.user', [
            'title' => 'Login User'
        ]);
    }
    public function authenticate2(Request $request)
    {
        $credentials = $request->validate([ //nama credentials bebas
            'username' => 'required',
            'password' => 'required'
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();
            $isMahasiswa = false;
            foreach ($user->role as $role) {
                if ($role->nama == "User" || $role->nama == "user") {
                    $isMahasiswa = true;
                    break;
                }
            }

            if ($isMahasiswa) {
                return redirect('/allPost')->with('success', 'Login Berhasil');
            } else {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return redirect('/loginUser')->with('loginError', 'Khusus Role User !');
            }
        }

        return back()->with('loginError', 'Login Gagal !');
        dd("berhasil login");
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Berhasil Logout');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    function login()
    {
        return view('login');
    }


    function loginProcess(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect('admin/user')->with('success', 'Selamat Datang AdminFes');
        }
        return back()->with('danger', 'Login Gagal Silahkan Cek Email dan Password Anda Kembali');
    }




    function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        // Auth::guard('ketua')->logout();

        $request->session()->invalidate();

        return redirect('login')->with('warning', 'Anda Telah Keluar');
    }
}

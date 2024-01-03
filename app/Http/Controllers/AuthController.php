<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index(){
        if (Auth::check()) {
            return redirect('/pesanan');
        } else {   
            return view('auth.login');
        }

    }
    public function ceklogin(Request $request){
        Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ])->validate();
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember'); 
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            Session::put('id_user', Auth::user()->id_user);
            return redirect()->route('produk')->with('success', 'Berhasil Login');
        } else {
            return redirect()->back()->with('alert', 'Email atau Password salah');
        }
    }
    public function register(){
        return view('auth.register');
    }

    public function daftar(Request $request){
        Validator::make($request->all(), [
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
        ])->validate();

        $existingUser = User::where('name', $request->username)->first();
        if ($existingUser) {
            return redirect()->back()->with('alert', 'Username sudah digunakan. Pilih username lain.');
        } else{
            User::create([
                'name' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            return redirect()->route('login')->with('success', 'Akun berhasil dibuat');
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'Berhasil Logout');
    }
}

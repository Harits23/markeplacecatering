<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Validation\Factory as ValidatorFactory;

class LoginController extends Controller
{
    public function login()
    {
        // Periksa apakah pengguna sudah terautentikasi
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('login');
    }

    public function actionlogin(Request $request, ValidatorFactory $validatorFactory)
    {
        // Validasi input
        $validator = $validatorFactory->make($request->all(), [
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->route('login')
                ->withErrors($validator)
                ->withInput();
        }

        // Ambil user berdasarkan username
        $user = User::where('username', $request->input('username'))->first();

        if ($user) {
            // Cek password menggunakan Hash
            if (Hash::check($request->input('password'), $user->password)) {
                Auth::login($user);

                // Redirect berdasarkan level user
                switch ($user->level) {
                    case 'admin':
                        return redirect()->route('admin.dashboard');
                    case 'user':
                        return redirect()->route('user.dashboard');
                    default:
                        return redirect()->route('dashboard'); // Tambahkan fallback jika level tidak dikenali
                }
            }
        }

        // Jika login gagal, berikan pesan kesalahan
        Session::flash('error', 'Username atau Password salah');
        return redirect()->route('login')->withInput();
    }

    public function actionlogout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Library
use DB;
use Illuminate\Support\Facades\Hash;
use Str;
use File;

use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        return view('page/auth/login',[
            'title' => 'Halaman Login',
        ]);
    }

    public function loginProses(Request $request)
    {
        $kredensial = $request->validate([
            'username'  => 'required',
            'password'  => 'required'
        ]);

        $userLogin = User::where('username',$request->username)->first();
        
        if ($userLogin == null){
            return redirect()->back()->with('gagal','pengguna tidak ditemukan');
        }

        if(Hash::check($request->password,$userLogin->password) == false){
            return redirect()->back()->with('gagal','katasandi salah');
        }


        if($userLogin->role == 1){
            $session = [
                'id'    => $userLogin->id,
                'nama'  => $userLogin->nama,
                'role'  => $userLogin->role,
                'isLogin'   => true 
            ];

            session($session);
            return redirect('admin/dashboard')->with('sukses','selamat datang kembali');
        }
    }
}

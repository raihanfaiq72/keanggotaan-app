<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Library
use DB;
use Illuminate\Support\Facades\Hash;
use Str;
use File;

use App\Models\UsersModel;

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

        $userLogin = UsersModel::where('username',$request->username)->first();
        
        if ($userLogin == null){
            return redirect()->back()->with('gagal','pengguna tidak ditemukan');
        }

        if(Hash::check($request->password,$userLogin->password) == false){
            return redirect()->back()->with('gagal','katasandi salah');
        }


        if($userLogin->role == 1){
            $session = [
                'id'            => $userLogin->id,
                'role'          => $userLogin->role,
                'isLogin'       => true 
            ];

            session($session);
            return redirect('admin/dashboard')->with('sukses','selamat datang kembali');
        }elseif($userLogin->role == 2){
            $session = [
                'id'            => $userLogin->id,
                'role'          => $userLogin->role,
                'isLogin'       => true 
            ];

            session($session);
            return redirect('sekretaris/dashboard')->with('sukses','selamat datang kembali');
        }
    }

    public function register()
    {
        return view('page/auth/register',[
            'title' => 'Halaman Register',
        ]);
    }

    public function registerProses(Request $request)
    {
        $request->validate([
            'username'      => 'required',
            'password'      => 'required',
            'role'          => 'required'
        ]);

        $data = [
            'username'      => $request->username,
            'password'      => Hash::make($request->password),
            'role'          => $request->role,
            'katasandi'     => $request->password
        ];

        // dd($data);

        UsersModel::create($data);

        return redirect('/')->with('sukses','berhasil register silahkan login');
    }


    public function logout()
    {
        session()->flush();
        return redirect('login');
    }
}

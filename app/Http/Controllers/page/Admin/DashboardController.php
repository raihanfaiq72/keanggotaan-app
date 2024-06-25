<?php

namespace App\Http\Controllers\page\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\UsersModel;
use App\Models\AnggotaModel;
use App\Models\Jabatan;

class DashboardController extends Controller
{
    private $url = '/';
    private $views = 'page/admin/dashboard';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pesan          = $this->pesan();
        $jabAll         = jabatan::get();
        $userJabHitung  = [];
        foreach($jabAll as $p ){
            $hitung = AnggotaModel::where('idJabatan',$p->id)->count();
            $userJabHitung[$p->nama] = $hitung;
        }
        return view("$this->views"."/index",[
            'title'           => 'Admin | Dashboard',
            'data'            => $pesan,
            'pegawai'         => AnggotaModel::count(),
            'userJabHitung'   => $userJabHitung
        ]);
    }

   private function pesan()
   {
        $user = AnggotaModel::where('id',session()->get('id'))->first(['created_at']);
        if($user){
            $tanggaltambah = Carbon::parse($user->created_at);
            $tambah6bulan  = $tanggaltambah->addMonths(6);

            if (carbon::now()->greaterThanOrEqualTo($tambah6bulan)){
                return "pesan anda 6 bulan";
            }else{
                return "tidak ada pesan";
            }
        }

   }
}

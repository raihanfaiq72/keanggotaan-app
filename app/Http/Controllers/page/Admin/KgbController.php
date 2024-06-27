<?php

namespace App\Http\Controllers\Page\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kgb;
use DB;
use Str;

class KgbController extends Controller
{
    private $views = 'page/admin/kgb';
    private $url = 'admin/kgb';

    public function index()
    {
       return view("$this->views"."/index", [
        'data' => Kgb::get(),
        'title' => 'Admin | KGB',
        'page' => 'KGB ALL'
       ]);
    }

    public function create()
    {
        return view("$this->views"."/create",[
            'title' => 'Admin | Tambah KGB',
            'page' => 'Tambah KGB'
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'tmt_akhir' => 'required|date',
            'masa_kerja_tahun' => 'required|string',
            'masa_kerja_bulan' => 'required|string',
        ]);

        Kgb::create([
            'tmt_akhir'        => $request->tmt_akhir,
            'masa_kerja_tahun' => $request->masa_kerja_tahun,
            'masa_kerja_bulan' => $request->masa_kerja_bulan,
        ]);
        return redirect($this->url)->with('sukses', 'Data KGB Berhasil Ditambah');
    }
    public function show($id)
    {
        return view("$this->views/show", [
            'data' => Kgb::where('id', $id)->first(),
            'page' => 'show',
            'title' => 'Show'
        ]);
    }
    public function edit($id)
    {
        return view("$this->views/edit", [
            'data' => Kgb::where('id', $id)->first(),
            'page' => 'edit',
            'title' => 'Edit'
        ]);
    }
    public function update(Request $request)
    {
        $request->validate([
            'tmt_akhir' => 'required|date',
            'masa_kerja_tahun' => 'required|string',
            'masa_kerja_bulan' => 'required|string',
        ]);

        $dataKgb = [
            'tmt_akhir' => $request->tmt_akhir,
            'masa_kerja_tahun' => $request->masa_kerja_tahun,
            'masa_kerja_bulan' => $request->masa_kerja_bulan,
        ];

        Kgb::where('id', $request->id)->update($dataKgb);

        return redirect("$this->url")->with('sukses', 'Data KGB berhasil di edit');
    }
    public function destroy($id)
    {
        try {
            $kgb = Kgb::findOrFail($id);
            $kgb->delete();

            return redirect()->back()->with('sukses', 'Data KGB berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()->with('gagal', 'Gagal menghapus data KGB. Silakan coba lagi nanti.');
        }
    }
}

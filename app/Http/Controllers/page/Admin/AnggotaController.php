<?php

namespace App\Http\Controllers\Page\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\AnggotaModel;
use DB;
use Illuminate\Support\Facades\Hash;
use Str;
use File;
class AnggotaController extends Controller
{
    private $views = 'page/admin/anggota';
    private $url = 'admin/anggota';

    public function index()
    {
        return view("$this->views"."/index",[
            'data'  => AnggotaModel::get(),
            'title' => 'Admin | Anggota',
            'page'  => 'Anggota All'
        ]);
    }

    public function create()
    {
        return view("$this->views"."/create",[
            'title' => 'Admin | Tambah Anggota',
            'page'  => 'Tambah Anggota'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'      => 'required',
            'nip'       => 'required',
            'golongan'  => 'required',
            'pangkat'   => 'required',
            'status'    => 'required',
            'idJabatan' => 'required',
            // 'photo'     => 'required|file|mimes:jpeg,png,jpg,gif',
        ]);

        if ($request->hasFile('photo')) {
            $file       = $request->file('photo');
            $fileName   = Str::uuid() . "-" . time() . "." . $file->extension();
            $file->move("Upload/", $fileName);
        }

        AnggotaModel::create([
            'nama'      => $request->nama,
            'nip'       => $request->nip,
            'golongan'  => $request->golongan,
            'pangkat'   => $request->pangkat,
            'status'    => $request->status,
            'idJabatan' => $request->idJabatan,
            'foto'      => $fileName
        ]);

        return redirect("$this->url")->with('sukses','data anggota berhasil ditambah');
    }

    public function show($id)
    {
        return view("$this->views"."/show",[
            'data'  => AnggotaModel::where('id',$id)->first(),
            'page'  => 'show',
            'title' => 'show'
        ]);
    }

    public function edit($id)
    {
        return view("$this->views"."/edit",[
            'data'  => AnggotaModel::where('id',$id)->first(),
            'page'  => 'edit',
            'title' => 'edit'
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama'      => 'required',
            'nip'       => 'required',
            'golongan'  => 'required',
            'pangkat'   => 'required',
            'status'    => 'required',
            'idJabatan' => 'required',
        ]);

        if (isset($request->photo)) {
            if ($request->hasFile('photo')) {
                $file       = $request->file('photo');
                $fileName   = Str::uuid() . "-" . time() . "." . $file->extension();
                $file->move("Upload/", $fileName);
            }
            $dataUsers = [
                'foto'              => $fileName,
                'nama'      => $request->nama,
                'nip'       => $request->nip,
                'golongan'  => $request->golongan,
                'pangkat'   => $request->pangkat,
                'status'    => $request->status,
                'idJabatan' => $request->idJabatan,
            ];
            AnggotaModel::where('id', $request->id)->update($dataUsers);
            return redirect("$this->url")->with('sukses', 'Anggota berhasil di edit');
            // echo json_encode($dataUsers); die;
        } else {
            $dataUsers = [
                // 'foto'              => $fileName,
                'nama'      => $request->nama,
                'nip'       => $request->nip,
                'golongan'  => $request->golongan,
                'pangkat'   => $request->pangkat,
                'status'    => $request->status,
                'idJabatan' => $request->idJabatan,
            ];
                // dd($dataUsers);
                AnggotaModel::where('id', $request->id)->update($dataUsers);
            return redirect("$this->url")->with('sukses', 'Anggota berhasil di edit');
            // echo json_encode($dataInfo); die;
        }
    }

    public function destroy($id)
    {
        try {
            $transaction = AnggotaModel::findOrFail($id);
        
            $transaction->delete();
        
            return redirect()->back()->with('sukses', 'Item berhasil dihapus dari cart.');
        } catch (\Exception $e) {
            return redirect()->back()->with('gagal', 'Gagal menghapus item dari cart. Silakan coba lagi nanti.');
        }
    }
}

<?php

namespace App\Http\Controllers\Page\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Jabatan;
use DB;
use Illuminate\Support\Facades\Hash;
use Str;
use File;
class JabatanController extends Controller
{
    private $views = 'page/admin/jabatan';
    private $url = 'admin/jabatan';

    public function index()
    {
        return view("$this->views"."/index",[
            'data'  => Jabatan::get(),
            'title' => 'Admin | Anggota',
            'page'  => 'Anggota All'
        ]);
    }

    public function create()
    {
        return view("$this->views"."/create",[
            'title' => 'Admin | Tambah Jabatan',
            'page'  => 'Tambah Jabatan'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'      => 'required',
            
        ]);
    

        Jabatan::create([
            'nama'      => $request->nama,
 
        ]);

        return redirect("$this->url")->with('sukses','data anggota berhasil ditambah');
    }

    public function show($id)
    {
        return view("$this->views"."/show",[
            'data'  => Jabatan::where('id',$id)->first(),
            'page'  => 'show',
            'title' => 'show'
        ]);
    }

    public function edit($id)
    {
        return view("$this->views"."/edit",[
            'data'  => Jabatan::where('id',$id)->first(),
            'page'  => 'edit',
            'title' => 'edit'
        ]);
    }

    public function update(Request $request)
 {
        $request->validate([
            'nama'      => 'required',
      
        ]);

    
            
            $dataUsers = [
                'nama'      => $request->nama,
                
            ];
            Jabatan::where('id', $request->id)->update($dataUsers);
            return redirect("$this->url")->with('sukses', 'Anggota berhasil di edit');
            $dataUsers = [

                'nama'      => $request->nama,
                
            ];
                Jabatan::where('id', $request->id)->update($dataUsers);
            return redirect("$this->url")->with('sukses', 'Anggota berhasil di edit');
            
        }

        public function destroy($id)
        {
            try {
                $transaction = Jabatan::findOrFail($id);
            
                $transaction->delete();
            
                return redirect()->back()->with('sukses', 'Item berhasil dihapus dari cart.');
            } catch (\Exception $e) {
                return redirect()->back()->with('gagal', 'Gagal menghapus item dari cart. Silakan coba lagi nanti.');
            }
        }
    
}
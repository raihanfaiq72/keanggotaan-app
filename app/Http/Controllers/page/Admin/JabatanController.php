<?php

namespace App\Http\Controllers\page\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jabatan;

class JabatanController extends Controller
{
    private $views = 'page/admin/jabatan';
    private $url = 'admin/jabatan';

    public function index()
    {
        return view("$this->views"."/index",[
            'data'  => Jabatan::get(),
            'title' => 'Admin | jabatan',
            'page'  => 'Jabatan All'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("$this->views"."/create",[
            'title' => 'Admin | Tambah Jabatan',
            'page'  => 'Tambah Jabatan'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request -> validate([
            'nama' => 'required'
        ]);

        Jabatan::create([
            'nama'      => $request->nama,
        ]);

        return redirect("$this->url")->with('sukses','data jabatan berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view("$this->views"."/show",[
            'data'  => Jabatan::where('id',$id)->first(),
            'page'  => 'show',
            'title' => 'show'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view("$this->views"."/edit",[
            'data'  => Jabatan::where('id',$id)->first(),
            'page'  => 'edit',
            'title' => 'edit'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

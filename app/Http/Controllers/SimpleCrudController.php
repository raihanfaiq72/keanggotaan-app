<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\crudmodel;

class SimpleCrudController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    private $views  = 'page/crud';
    private $url    = 'admin/crud';

    public function index()
    {
        return view("$this->views"."/index",[
            'title'     => 'example of simple crud',
            'url'       => $this->url,
            'crudmodel' => crudmodel::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("$this->views"."/create",[
            'url'       => $this->url,
            'title'     => 'tambah data'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'      => 'required',
            'alamat'    => 'required',
            'pekerjaan' => 'required'
        ]);

        crudmodel::create([
            'nama'      => $request->nama,
            'alamat'    => $request->alamat,
            'pekerjaan' => $request->pekerjaan
        ]);

        // dd([
        //     'nama'      => $request->nama,
        //     'alamat'    => $request->alamat,
        //     'pekerjaan' => $request->pekerjaan
        // ]);

        return redirect("$this->url")->with('sukses','Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view("$this->views"."/show",[
            'url'       => $this->url,
            'crudmodel' => crudmodel::where('id',$id)->first()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view("$this->url"."/edit",[
            'url'       => $this->url,
            'crudmodel' => crudmodel::where('id',$id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama'      => 'required',
            'alamat'    => 'required',
            'pekerjaan' => 'required'
        ]);

        rudmodel::update([
            'nama'      => $request->nama,
            'alamat'    => $request->alamat,
            'pekerjaan' => $request->pekerjaan
        ]);

        return redirect("$this->url")->with('sukses','Data berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Edit Data KGB</h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> Ada kesalahan pada input data.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('kgb.update', $kgb->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="tmt_akhir">TMT Akhir:</label>
                    <input type="date" name="tmt_akhir" value="{{ $kgb->tmt_akhir }}" class="form-control" placeholder="TMT Akhir">
                </div>
                <div class="form-group">
                    <label for="masa_kerja_tahun">Masa Kerja Tahun:</label>
                    <input type="text" name="masa_kerja_tahun" value="{{ $kgb->masa_kerja_tahun }}" class="form-control" placeholder="Masa Kerja Tahun">
                </div>
                <div class="form-group">
                    <label for="masa_kerja_bulan">Masa Kerja Bulan:</label>
                    <input type="text" name="masa_kerja_bulan" value="{{ $kgb->masa_kerja_bulan }}" class="form-control" placeholder="Masa Kerja Bulan">
                </div>
                <button

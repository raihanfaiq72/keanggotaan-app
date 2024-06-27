@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Tambah Data KGB</h2>
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
            <form action="{{ route('kgb.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="tmt_akhir">TMT Akhir:</label>
                    <input type="date" name="tmt_akhir" class="form-control" placeholder="TMT Akhir">
                </div>
                <div class="form-group">
                    <label for="masa_kerja_tahun">Masa Kerja Tahun:</label>
                    <input type="text" name="masa_kerja_tahun" class="form-control" placeholder="Masa Kerja Tahun">
                </div>
                <div class="form-group">
                    <label for="masa_kerja_bulan">Masa Kerja Bulan:</label>
                    <input type="text" name="masa_kerja_bulan" class="form-control" placeholder="Masa Kerja Bulan">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection

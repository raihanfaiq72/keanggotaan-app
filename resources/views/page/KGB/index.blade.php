@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Data KGB</h2>
            <a href="{{ route('kgb.create') }}" class="btn btn-primary">Tambah Data</a>
            @if ($message = Session::get('success'))
                <div class="alert alert-success mt-2">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <table class="table table-bordered mt-3">
                <tr>
                    <th>No</th>
                    <th>TMT Akhir</th>
                    <th>Masa Kerja Tahun</th>
                    <th>Masa Kerja Bulan</th>
                    <th width="280px">Aksi</th>
                </tr>
                @foreach ($kgbs as $kgb)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $kgb->tmt_akhir }}</td>
                    <td>{{ $kgb->masa_kerja_tahun }}</td>
                    <td>{{ $kgb->masa_kerja_bulan }}</td>
                    <td>
                        <form action="{{ route('kgb.destroy',$kgb->id) }}" method="POST">
                            <a class="btn btn-info" href="{{ route('kgb.show',$kgb->id) }}">Show</a>
                            <a class="btn btn-primary" href="{{ route('kgb.edit',$kgb->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection

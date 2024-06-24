@extends($landing)

@section('css-library')
{{-- Tempat Ngoding Meletakkan css library --}}
@endsection

@section('css-custom')

@endsection

@section('main')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>{{$page}}</h3>
            </div>
            @if (session()->has('sukses'))
            <div class="alert alert-success" role="alert">
                {{ session('sukses') }}
            </div>
            @elseif (session()->has('gagal'))
            <div class="alert alert-danger" role="alert">
                {{ session('gagal') }}
            </div>
            @elseif (count($errors) > 0)
            <div class="alert alert-danger" role="alert">
                <strong>Terjadi kesalahan:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="title_right">
                <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>


        <div class="clearfix"></div>

        <div class="col-md-12 col-sm-12  ">
            <div class="x_panel">
                <div class="x_title">
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Settings 1</a>
                                <a class="dropdown-item" href="#">Settings 2</a>
                            </div>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content">

                    <div class="table-responsive">
                        <a href="{{url('admin/anggota')}}/create"><button>Tambah Anggota</button></a>
                        <table class="table table-striped jambo_table bulk_action">
                            <thead>
                                <tr class="headings">
                                    <th>
                                        <input type="checkbox" id="check-all" class="flat">
                                    </th>
                                    <th class="column-title"># </th>
                                    <th class="column-title">Foto </th>
                                    <th class="column-title">Nama </th>
                                    <th class="column-title">NIP </th>
                                    <th class="column-title">Golongan </th>
                                    <th class="column-title">Pangkat </th>
                                    <th class="column-title">Status </th>
                                    <th class="column-title">Jabatan </th>

                                    <th class="column-title no-link last"><span class="nobr">Lihat</span>
                                    <th class="column-title no-link last"><span class="nobr">Edit</span>
                                    <th class="column-title no-link last"><span class="nobr">Hapus</span>

                                    </th>
                                    <th class="bulk-actions" colspan="7">
                                        <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span
                                                class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                    </th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse($data as $p)
                                <tr class="odd pointer">
                                    <td class="a-center ">
                                        <input type="checkbox" class="flat" name="table_records">
                                    </td>
                                    <td class=" ">{{$loop->iteration}}</td>
                                    <td class=" "><img src="{{asset('Upload')}}/{{$p->foto}}" height="250" width="250">
                                    </td>
                                    <td class=" ">{{$p->nama}}</td>
                                    <td class=" ">{{$p->nip}}</td>
                                    <td class=" ">{{$p->golongan}}</td>
                                    <td class=" ">{{$p->pangkat}}</td>
                                    <td class="a-right a-right ">{{$p->status}}</td>
                                    <td class=" ">{{$p->idJabatan}}</td>
                                    <td class=" last"><a href="{{url('/admin/anggota/'.$p->id,[])}}">View</a>
                                    <td class=" last"><a href="{{url('/admin/anggota/'.$p->id,[])}}/edit">Edit</a>
                                    <td class="last">
                                        <form action="{{ url('delete-item/'.$p->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-link text-danger"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                        </form>
                                    </td>
                                    </td>
                                </tr>
                                @empty
                                <tr class="odd pointer">
                                    <h2>woops kosong</h2>
                                </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
</div>

@include('layout/footer')
@endsection

@section('js-library')
{{-- Tempat Ngoding Meletakkan js library --}}
@endsection

@section('js-custom')
@endsection
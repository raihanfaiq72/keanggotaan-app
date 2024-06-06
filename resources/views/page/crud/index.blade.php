@extends($landing)

@section('css-library')
{{-- Tempat Ngoding Meletakkan css library --}}
@endsection

@section('css-custom')

@endsection

@section('main')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Table <small>ini adalah contoh untuk crud dengan method `resource`</small></h3>
            </div>

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

            <div class="clearfix"></div>

            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Table design <small>Custom design</small></h2>
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

                        <!-- <p>Add class <code>bulk_action</code> to table for bulk actions options on row select</p> -->
                        <a href="{{ url("$url")}}/create"><button>Tambah Data </button></a>

                        <div class="table-responsive">
                            <table class="table table-striped jambo_table bulk_action">
                                <thead>
                                    <tr class="headings">
                                        <th>
                                            <input type="checkbox" id="check-all" class="flat">
                                        </th>
                                        <th class="column-title">Nama </th>
                                        <th class="column-title">Alamat </th>
                                        <th class="column-title">Pekerjaan </th>
                                        <th class="column-title no-link last"><span class="nobr">Action</span>
                                        </th>
                                        <th class="bulk-actions" colspan="7">
                                            <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span
                                                    class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($crudmodel as $p)
                                    <tr class="odd pointer">
                                        <td class="a-center ">
                                            <!-- <input type="checkbox" class="flat" name="table_records"> -->
                                            {{ $loop->iteration}}
                                        </td>
                                        <td class=" ">{{ $p->nama ?? 'nama belum diset'}}</td>
                                        <td class=" ">{{ $p->alamat ?? 'alamat belum diset'}}</td>
                                        <td class=" ">
                                            @if($p->pekerjaan == 1)
                                            Mahasiswa
                                            @else
                                            buruh pabrik pecinta gilga
                                            @endif
                                        </td>
                                        <td class=" last">
                                        <a href="{{url("$url")}}/{{$p->id}}/show">Show</a>
                                        <a href="{{url("$url")}}/{{$p->id}}/edit">Edit</a>
                                        <a href="#">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
<!-- footer content -->
<footer>
    <div class="pull-right">
        Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
    </div>
    <div class="clearfix"></div>
</footer>
<!-- /footer content -->
</div>
</div>

<!-- jQuery -->
<script src="{{url('')}}/assets/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="{{url('')}}/assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- FastClick -->
<script src="{{url('')}}/assets/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="{{url('')}}/assets/vendors/nprogress/nprogress.js"></script>
<!-- iCheck -->
<script src="{{url('')}}/assets/vendors/iCheck/icheck.min.js"></script>

<!-- Custom Theme Scripts -->
<script src="{{url('')}}/assets/build/js/custom.min.js"></script>
@endsection

@section('js-library')
{{-- Tempat Ngoding Meletakkan js library --}}
@endsection

@section('js-custom')
@endsection
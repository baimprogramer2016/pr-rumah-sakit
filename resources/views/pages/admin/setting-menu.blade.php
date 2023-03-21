@extends('layouts.main')
@push('style-bottom')
<link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
@endpush
@section('content')
<div class="row">
    <div class="col-sm-4 col-3">
        <h4 class="page-title">Pengaturan Menu</h4>
    </div>
    <div class="col-sm-8 col-9 text-right m-b-20">
        <a href="{{ route('setting-menu-add') }}" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Tambah Menu</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-lg-12 col-sm-12">
        @if (Session::has('message'))
        <div class="alert alert-{{ Session::get('color-alert') }} alert-dismissible fade show" role="alert">
            <strong>Pesan </strong>  {{ Session::get('message') }}
        </div>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            
            <table class="table table-border table-striped custom-table datatable mb-0">
                <thead>
                    <tr>
                        <th>Route</th>
                        <th>Nama Menu</th>
                        <th>Kategori</th>
                        <th>Icon</th>
                        <th>Parent</th>
                        <th class="text-right">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_menu as $item_menu)
                    <tr>
                        <td>{{ $item_menu->route }}</td>
                        <td>{{ $item_menu->route_name }}</td>
                        <td>{{ $item_menu->route_category }}</td>
                        <td>{{ $item_menu->route_icon }}</td>
                        <td>{{ $item_menu->route_parent }}</td>
                        <td class="text-right">
                            @if($item_menu->route != 'setting-menu')
                            <div class="dropdown dropdown-action">
                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{ route('setting-menu-edit', Enc($item_menu->id)) }}"><i class="fa fa-pencil m-r-5"></i> Ubah</a>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_menu_modal" onclick="return setDeleteId('{{ Enc($item_menu->id) }}','{{ $item_menu->route }}');"><i class="fa fa-trash-o m-r-5"></i> Hapus</a>
                                </div>
                            </div>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="delete_menu_modal" class="modal fade delete-modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <img src="assets/img/sent.png" alt="" width="50" height="46">
                <h3 id="title_delete"></h3>
                <form action="{{ route('setting-menu-delete') }}" method="POST" >
                <div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                    @csrf
                    <input type="hidden"  id="delete_menu" name="delete_menu">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script-bottom')
<script src="assets/js/select2.min.js"></script>
<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/js/moment.min.js"></script>
<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
<script>

    function setDeleteId(paramId, paramRoute)
    {
        document.getElementById("title_delete").innerHTML = 'Anda akan menghapus Route '+paramRoute;
        document.getElementById("delete_menu").value = paramId;
    }
</script>
@endpush



@extends('layouts.main')
@push('style-bottom')
<link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
@endpush
@section('content')

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
    <div class="col-sm-4 col-3">
        <h4 class="page-title">Pengaturan Role</h4>
    </div>
    <div class="col-sm-8 col-9 text-right m-b-20">
        @if(Auth::User()->user_id != 'superadmin')
        <a href="{{ route('setting-master') }}" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-arrow-left"></i> Kembali</a>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-sm-4 col-md-4 col-lg-4 col-xl-3">
        <a href="{{ route('setting-role-add') }}" class="btn btn-primary btn-block"><i class="fa fa-plus"></i> Tambah Role</a>
        <div class="roles-menu">
            <ul>
                @foreach ($data_role as $item_role)
                <li class="{{ $item_role->active }}">
                    <a href="{{ route('setting-role') }}?paramRole={{ Enc($item_role->role) }}">{{ $item_role->role_name }}</a>
                    <span class="role-action">
                        <a href="{{ route('setting-role-edit', Enc($item_role->id)) }}">
                            <span class="action-circle large">
                                <i class="material-icons text-secondary">edit</i>
                            </span>
                        </a>
                        <a href="#" data-toggle="modal" data-target="#delete_menu_modal" onclick="return setDeleteId('{{ Enc($item_role->id) }}','{{ $item_role->role }}');">
                            <span class="action-circle large delete-btn">
                                <i class="material-icons text-secondary">delete</i>
                            </span>
                        </a>
                    </span> 
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="col-sm-8 col-md-8 col-lg-8 col-xl-9">
        <h6 class="card-title m-b-20">Menu</h6>
        <div class="m-b-30">
            <ul class="list-group">
                @foreach ($data_menu as $item_menu)
                <li class="list-group-item">
                    {{ '('.Ucwords($item_menu->route_category).') '.$item_menu->route_name}}
                    <div class="material-switch float-right">
                        <input id="{{ $item_menu->route }}" type="checkbox" {{ ($item_menu->selected) ? "checked" : "" }} onClick="return setUpdateRoleMenu('{{ $role }}','{{ $item_menu->route }}')">
                        <label for="{{ $item_menu->route }}" class="badge-success"></label>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
      
    </div>
</div>

<div id="delete_menu_modal" class="modal fade delete-modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <img src="assets/img/sent.png" alt="" width="50" height="46">
                <h3 id="title_delete"></h3>
                <form action="{{ route('setting-role-delete') }}" method="POST" >
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

    function setDeleteId(paramId, paramRole)
    {
        console.log(paramId)
        document.getElementById("title_delete").innerHTML = 'Anda akan menghapus Role '+paramRole;
        document.getElementById("delete_menu").value = paramId;
    }

    function setUpdateRoleMenu(paramRole, paramRoute)
    {
        var checkedRoute = document.getElementById(paramRoute).checked;

        $.ajax({
            url: "{{ route('setting-role-update-role-menu') }}",
            type : "POST",
            _token : "",
            data:{
                    param_checked : (checkedRoute) ? 'yes': 'no',
                    param_role : paramRole,
                    param_route : paramRoute,
                    _token: "{{ csrf_token() }}"               
            },
            success: function(response)
            {
                
            }
        });
    }

    
</script>
@endpush



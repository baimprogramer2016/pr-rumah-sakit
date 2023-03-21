@extends('layouts.main')
@push('style-bottom')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/select2.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}">
@endpush
@section('content')
<div class="row">
    <div class="col-sm-4 col-3">
        <h4 class="page-title">User</h4>
    </div>
    <div class="col-sm-8 col-9 text-right m-b-20">
        <a href="{{ route('setting-user-add') }}" class="btn btn-primary float-right btn-rounded"><i class="fa fa-plus"></i> Tambah User</a>
        @if(Auth::User()->user_id != 'superadmin')
        <a href="{{ route('setting-master') }}" class="btn btn btn-primary btn-rounded float-right mr-3"><i class="fa fa-arrow-left"></i> Kembali</a>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-lg-12 col-sm-12">
        @if (Session::has('message'))
        <div class="alert alert-{{ Session::get('color-alert') }} alert-dismissible fade show" role="alert">
            <strong>  {{ Session::get('message') }}</strong>
        </div>
        @endif
    </div>
</div>
<form action="{{ route('setting-user') }}" method="GET">
<div class="row filter-row">
    <div class="col-sm-6 col-md-3">
        <div class="form-group form-focus">
            <label class="focus-label">User ID / Username</label>
            <input type="text" class="form-control floating" name="i" value="{{ $param_cari->cari_id }}">
        </div>
    </div>
    <div class="col-sm-6 col-md-3">
        <div class="form-group form-focus">
            <label class="focus-label">Nama</label>
            <input type="text" class="form-control floating" name="u" value="{{ $param_cari->cari_name }}">
        </div>
    </div>
    <div class="col-sm-6 col-md-3">
        <div class="form-group form-focus select-focus">
            <label class="focus-label">Role</label>
            <select class="select floating" name='r'>
                <option value="">Semua</option>
                @foreach ($data_role as $item_role)
                @if($item_role->role == $param_cari->cari_role)
                    <option selected value="{{ $item_role->role }}">{{ $item_role->role_name }}</option>
                @else 
                    <option value="{{ $item_role->role }}">{{ $item_role->role_name }}</option>                
                @endif
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-sm-6 col-md-3">
        <button type="submit" class="btn btn-success btn-block"> Cari  </button>
    </div>
</div>
</form>
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-striped custom-table">
                <thead>
                    <tr>
                        <th style="min-width:200px;">Nama</th>
                        <th>User ID / Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th class="text-right">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_user as $item_user)
                    <tr>
                        <td>
                            <img width="28" height="28" src="assets/img/user.jpg" class="rounded-circle" alt=""> <h2>{{ $item_user->user_name }}</h2>
                        </td>
                        <td>{{ $item_user->user_id }}</td>
                        <td>{{ $item_user->user_email }}</td>
                       
                        <td>
                            <span class="custom-badge status-green">{{ $item_user->user_role }}</span>
                        </td>
                        <td class="text-right">
                            <div class="dropdown dropdown-action">
                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{ route('setting-user-edit', Enc($item_user->id)) }}"><i class="fa fa-pencil m-r-5"></i> Ubah</a>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_user_modal" onclick="return setDeleteId('{{ Enc($item_user->id) }}','{{ $item_user->user_name }}');"><i class="fa fa-trash-o m-r-5"></i> Hapus</a>
                                </div>
                            </div>
                        </td>
                    </tr>   
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div id="delete_user_modal" class="modal fade delete-modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <img src="assets/img/sent.png" alt="" width="50" height="46">
                <h3 id="title_delete"></h3>
                <form action="{{ route('setting-user-delete') }}" method="POST" >
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
<script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('assets/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/js/moment.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>
<script>

    function setDeleteId(paramId, paramUser)
    {
        document.getElementById("title_delete").innerHTML = 'Anda akan menghapus User '+paramUser;
        document.getElementById("delete_menu").value = paramId;
    }
</script>
@endpush

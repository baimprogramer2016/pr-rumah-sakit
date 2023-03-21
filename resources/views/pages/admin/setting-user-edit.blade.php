
@extends('layouts.main')
@push('style-bottom')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/select2.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}">
@endpush
@section('content')
<div class="row">
    <div class="col-sm-4 col-3">
        <h4 class="page-title">Ubah User</h4>
    </div>
    <div class="col-sm-8 col-9 text-right m-b-20">
        <a href="{{ route('setting-user') }}" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-list"></i> Data User</a>
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
    <div class="card-box">
    <div class="col-lg-12">
        <form action="{{ route('setting-user-update', Enc($data_user->id)) }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>User ID / Username <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="user_id" value="{{ $data_user->user_id }}" id="user_id">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Nama</label>
                        <input class="form-control" type="text" name="user_name"  value="{{ $data_user->user_name }}" id="user_name" >
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Email <span class="text-danger">*</span></label>
                        <input class="form-control" type="email" name="user_email"  value="{{ $data_user->user_email }}">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Role</label>
                        <select class="select" name="user_role">
                            @foreach ($data_role as $item_role)
                                @if($item_role->role == $data_user->user_role)
                                <option selected value="{{ $item_role->role }}">{{ $item_role->role_name }}</option>
                                @else 
                                <option  value="{{ $item_role->role }}">{{ $item_role->role_name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Password</label>
                        <input class="form-control" type="password" name="password" id="password"  value="{{ $data_user->password }}">
                    </div>
                </div> 
            </div>
            <div class="m-t-20 text-center">
                <button class="btn btn-primary submit-btn" id="btnSave">Ubah Data</button>
            </div>
        </form>
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

@endpush
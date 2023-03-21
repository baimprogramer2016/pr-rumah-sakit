@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-sm-4 col-3">
        <h4 class="page-title">Ubah Role</h4>
    </div>
    <div class="col-sm-8 col-9 text-right m-b-20">
        <a href="{{ route('setting-role') }}" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-list"></i> Data Role</a>
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

    <div class="col-lg-12">
        <div class="card-box">
            <form action="{{ route('setting-role-update', Enc($data_role_edit->id)) }}" method="POST">
                @csrf
                <div class="form-group row">
                    <label class="col-form-label col-md-2">Role</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" readonly name="role" value="{{ $data_role_edit->role }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-2">Nama role</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="role_name" value="{{ $data_role_edit->role_name }}">
                    </div>
                </div>
                <div class="m-t-20 text-center">
                    <button class="btn btn-primary submit-btn">Ubah</button>
                </div>
            </form>
        </div>
      
    </div>
</div>
@endsection

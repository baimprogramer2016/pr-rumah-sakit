@extends('layouts.main')
@section('content')

<div class="row">
    <div class="col-sm-4 col-3">
        <h4 class="page-title">Pengaturan Icon dan Nama</h4>
    </div>
    <div class="col-sm-8 col-9 text-right m-b-20">
        @if(Auth::User()->user_id != 'superadmin')
        <a href="{{ route('setting-master') }}" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-arrow-left"></i> Kembali</a>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        @if (Session::has('message'))
        <div class="alert alert-{{ Session::get('color-alert') }} alert-dismissible fade show" role="alert">
            <strong>Pesan </strong>  {{ Session::get('message') }}
        </div>
        {{-- URL::previous()  --}}
        @endif
    </div>
    <div class="col-lg-12">
        <div class="card-box">
        <form action="{{ route('setting-icon-process') }}" method="POST" enctype="multipart/form-data">
            @csrf
           
            <div class="form-group row">
                <label class="col-lg-2 col-form-label">Nama Aplikasi</label>
                <div class="col-lg-8">
                    <input name="app_name" class="form-control" value="{{ $data_icon->app_name }}" type="text">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-2 col-form-label">Logo</label>
                <div class="col-lg-8">
                    <input class="form-control" type="file" name="icon" >
                    
                </div>
                <div class="col-lg-2">
                    <div class="img-thumbnail float-left"><img src="uploads/icons/{{ $data_icon->icon }}" alt="" width="30" height="30"></div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-2 col-form-label">Favicon</label>
                <div class="col-lg-8">
                    <input class="form-control" type="file" name="favicon"  >
                    
                </div>
                <div class="col-lg-2">
                    <div class="settings-image img-thumbnail float-left"><img src="uploads/icons/{{ $data_icon->favicon }}" class="img-fluid" width="30" height="30" alt=""></div>
                </div>
            </div>
            <div class="m-t-20 text-center">
                <button class="btn btn-primary submit-btn">Simpan</button>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection


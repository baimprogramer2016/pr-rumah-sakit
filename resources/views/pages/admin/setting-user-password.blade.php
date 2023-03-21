
@extends('layouts.main')
@push('style-bottom')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/select2.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}">
@endpush
@section('content')
<div class="row">
    <div class="col-sm-4 col-3">
        <h4 class="page-title">Ubah Password</h4>
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
    <div class="col-lg-8 offset-lg-2">
        <form action="{{ route('setting-user-update-password', Enc($data_user->id)) }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Password</label>
                        <input class="form-control" readonly type="password" name="password1" id="password1"  value="{{ $data_user->password }}">
                    </div>
                </div> 
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Password Baru</label>
                        <input class="form-control" type="password" name="password" id="password" >
                    </div>
                </div> 
            </div>
            <div class="m-t-20 text-center">
                <button class="btn btn-primary submit-btn" id="btnSave">Ubah</button>
            </div>
        </form>
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
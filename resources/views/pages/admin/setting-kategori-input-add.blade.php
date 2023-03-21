@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-sm-4 col-3">
        <h4 class="page-title">Input Kategori</h4>
    </div>
    <div class="col-sm-8 col-9 text-right m-b-20">
        <a href="{{ route('setting-kategori-input') }}" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-list"></i> Data Kategori</a>
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
            <form action="{{ route('setting-kategori-input-process') }}" method="POST">
                @csrf
                <div class="form-group row">
                    <label class="col-form-label col-md-2">Keterangan</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="keterangan" >
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-2">kategori</label>
                    <div class="col-md-10">
                        <select class="form-control" name="input">
                            @foreach ($data_menu_input as $item_kategori)
                                <option value="{{ $item_kategori->route_parent }}">{{ $item_kategori->route_name }}</option>
                            @endforeach
                        </select>
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

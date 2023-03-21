@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-sm-4 col-3">
        <h4 class="page-title">Master Input 5</h4>
    </div>
    <div class="col-sm-8 col-9 text-right m-b-20">
        <a href="#" class="btn btn btn-success btn-rounded float-right ml-3"><i class="fa fa-copy"></i> Copy Tahun Sebelum</a>
        <a href="{{ route('adm-master-input-5') }}" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-list"></i> Daftar Input</a>
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
            <form action="{{ route('adm-master-input-5-process') }}" method="POST">
                @csrf
                <div class="form-group row">
                    <label class="col-form-label col-md-2">Tahun</label>
                    <div class="col-md-10">
                        <select class="form-control" name="tahun">
                            
                            @foreach ($data_tahun as $item_tahun)
                                <option value="{{ $item_tahun }}">{{ $item_tahun }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-2">kategori</label>
                    <div class="col-md-10">
                        <select class="form-control" name="kategori_input_id">
                            @foreach ($data_kategori as $item_kategori)
                                <option value="{{ $item_kategori->id }}">{{ $item_kategori->keterangan }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-2">Jenis Insiden</label>
                    <div class="col-md-10">
                        <textarea class="form-control" rows="3" name="keterangan" required></textarea>
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

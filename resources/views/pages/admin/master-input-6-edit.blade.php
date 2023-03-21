@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-sm-4 col-3">
        <h4 class="page-title">Master Input 6</h4>
    </div>
    <div class="col-sm-8 col-9 text-right m-b-20">
        <a href="{{ route('adm-master-input-6') }}" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-list"></i> Data Input</a>
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
            <form action="{{ route('adm-master-input-6-update', Enc($data_edit->id)) }}" method="POST">
                @csrf
                <div class="form-group row">
                    <label class="col-form-label col-md-2">Tahun</label>
                    <div class="col-md-10">
                        <input type="hidden" name="kode" value="{{ $data_edit->kode }}">
                        <select class="form-control" name="tahun">
                            @foreach ($data_tahun as $item_tahun)
                            @if($data_edit->tahun == $item_tahun)
                                <option selected value="{{ $item_tahun }}">{{ $item_tahun }}</option>
                                @else
                                <option value="{{ $item_tahun }}">{{ $item_tahun }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-2">kategori</label>
                    <div class="col-md-10">
                        <select class="form-control" name="kategori_input_id">
                            @foreach ($data_kategori as $item_kategori)
                                @if($data_edit->kategori_input_id == $item_kategori->id)
                                <option selected value="{{ $item_kategori->id }}">{{ $item_kategori->keterangan }}</option>
                                @else
                                <option value="{{ $item_kategori->id }}">{{ $item_kategori->keterangan }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-2">Unit</label>
                    <div class="col-md-10">
                        <textarea class="form-control" rows="3" name="keterangan" >{{ $data_edit->keterangan }}</textarea>
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

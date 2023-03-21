@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-sm-4 col-3">
        <h4 class="page-title">Master Input 4</h4>
    </div>
    <div class="col-sm-8 col-9 text-right m-b-20">
        <a href="{{ route('adm-master-input-4') }}" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-list"></i> Data Input</a>
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
            <form action="{{ route('adm-master-input-4-update', Enc($data_edit->id)) }}" method="POST">
                @csrf
                <div class="form-group row">
                    <label class="col-form-label col-md-2">Tahun</label>
                    <div class="col-md-10">
                        <input type="hidden" name="kode" id="kode" value="{{ $data_edit->kode }}">
                        <select class="form-control" name="tahun" id="tahun">
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
                    <label class="col-form-label col-md-2">Pasien</label>
                    <div class="col-md-10">
                        <select class="form-control" name="pasien_id" id="pasien_id" onchange="return getTargetBl()">
                            @foreach ($data_pasien_id as $item_pasien)
                                @if($data_edit->pasien_id == $item_pasien->pasien_id)
                                <option selected value="{{ $item_pasien->pasien_id }}">{{ $item_pasien->pasien }}</option>
                                @else
                                <option value="{{ $item_pasien->pasien_id }}">{{ $item_pasien->pasien }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-2">Target BL</label>
                    <div class="col-md-10">
                        <div class="row">
                            <div class="col-md-2">
                                <input class="form-control" readonly type="number" name="bpjs_par" id="bpjs_par"  value="{{ $data_edit->bpjs_par }}">
                            </div>
                            <div class="col-md-1 col-form-label">BPJS </div>
                            <div class="col-md-2">
                                <input class="form-control" readonly type="number" name="tunai_par" id="tunai_par"  value="{{ $data_edit->tunai_par }}">
                            </div>
                            <div class="col-md-1 col-form-label">Tunai </div>
                            <div class="col-md-2">
                                <input class="form-control"readonly type="number" name="kredit_par" id="kredit_par"  value="{{ $data_edit->kredit_par }}">
                            </div>
                            <div class="col-md-1 col-form-label">Kredit </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-2">Uraian</label>
                    <div class="col-md-10">
                        <textarea class="form-control" rows="3" name="uraian" id="uraian">{{ $data_edit->uraian }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-2">Total BL</label>
                    <div class="col-md-10">
                        <input class="form-control" rows="3" type="number" name="total_bl" id="total_bl" value="{{ $data_edit->total_bl }}">
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
@push('script-bottom')
<script>
    function getTargetBl()
    {
        var paramId = $('#pasien_id').find(":selected").val();        
        var paramTahun = $('#tahun').find(":selected").val();     
        var body = {
                paramid : paramId,
                paramtahun : paramTahun,
                "_token": "{{ csrf_token() }}",
        }  
        
        console.log(body);
        $.ajax({
            url: "{{ route('adm-master-input-4-par-cari') }}",
            type : 'POST',
            data: body,
            success: function(response){
               console.log(response)
               $("#bpjs_par").val(response.bpjs);
               $("#tunai_par").val(response.tunai);
               $("#kredit_par").val(response.kredit);
            }
        });
    }
</script>
    
@endpush

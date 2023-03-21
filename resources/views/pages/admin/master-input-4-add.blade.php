@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-sm-4 col-3">
        <h4 class="page-title">Master Input 4</h4>
    </div>
    <div class="col-sm-8 col-9 text-right m-b-20">
        <a href="#" class="btn btn btn-success btn-rounded float-right ml-3"><i class="fa fa-copy"></i> Copy Tahun Sebelum</a>
        <a href="{{ route('adm-master-input-4') }}" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-list"></i> Daftar Input</a>
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
            <form action="{{ route('adm-master-input-4-process') }}" method="POST">
                @csrf
                <div class="form-group row">
                    <label class="col-form-label col-md-2">Tahun</label>
                    <div class="col-md-10">
                        <select class="form-control" name="tahun" id="tahun">
                            @foreach ($data_tahun as $item_tahun)
                                <option value="{{ $item_tahun }}">{{ $item_tahun }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-2">Kategori</label>
                    <div class="col-md-10">
                        <select class="form-control" name="kategori_input_id">
                            @foreach ($data_kategori as $item_kategori)
                                <option value="{{ $item_kategori->id }}">{{ $item_kategori->keterangan }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-2">Pasien</label>
                    <div class="col-md-10">
                        <select class="form-control" name="pasien_id" id="pasien_id" onchange="return getTargetBl()">
                            @foreach ($data_pasien_id as $item_pasien)
                                <option value="{{ $item_pasien->pasien_id }}">{{ $item_pasien->pasien }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-2">Target BL</label>
                    <div class="col-md-10">
                        <div class="row">
                            <div class="col-md-2">
                                <input class="form-control" readonly type="number" name="bpjs_par" id="bpjs_par"  value="{{ $data_pasien_first->bpjs }}">
                            </div>
                            <div class="col-md-1 col-form-label">BPJS </div>
                            <div class="col-md-2">
                                <input class="form-control" readonly type="number" name="tunai_par" id="tunai_par"  value="{{ $data_pasien_first->tunai }}">
                            </div>
                            <div class="col-md-1 col-form-label">Tunai </div>
                            <div class="col-md-2">
                                <input class="form-control"readonly type="number" name="kredit_par" id="kredit_par"  value="{{ $data_pasien_first->kredit }}">
                            </div>
                            <div class="col-md-1 col-form-label">Kredit </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-2">Uraian</label>
                    <div class="col-md-10">
                        <textarea class="form-control" rows="3" name="uraian" required></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-2">Total BL</label>
                    <div class="col-md-10">
                        <input class="form-control" rows="3" type="number" name="total_bl" required>
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
        
        $.ajax({
            url: "{{ route('adm-master-input-4-par-cari') }}",
            type : 'POST',
            data: body,
            success: function(response){
            //    console.log(response)
               $("#bpjs_par").val(response.bpjs);
               $("#tunai_par").val(response.tunai);
               $("#kredit_par").val(response.kredit);
            }
        });
    }
</script>
    
@endpush
@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-sm-4 col-3">
        <h4 class="page-title">Performance Report</h4>
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
<div class="card-box profile-header mb-3">
    <div class="row">
        {!! $petunjuk->keterangan !!}
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-lg-12 col-sm-12">
        <div class="form-group row">
            <div class="col-md-2">
                <form action="{{ route('menu-input-1') }}" method="GET">
                <select class="form-control" name="tahun" onchange="this.form.submit()">
                    <option value="">Pilih Tahun</option>
                    @foreach ($data_tahun as $item_tahun)
                        @if(request()->tahun == $item_tahun)
                        <option selected value="{{ $item_tahun }}">{{ $item_tahun }}</option>
                        @else 
                        <option value="{{ $item_tahun }}">{{ $item_tahun }}</option>
                        @endif
                    @endforeach
                </select>
            </form>
            </div>
            
        </div>
    </div>
</div>
@if($data_input->count() > 0 )
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="table-responsive">
            <table class="table table-hover table-white">
                <thead>
                    
                    <tr>
                        <th style="width: 20px">#</th>
                        <th class="col-md-6">Uraian</th>
                        
                        <th style="width:200px;">Status</th>
                        <th style="width:200px;">Bukti Verifikasi</th>
                        <th>Rencana Tindak Lanjut</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_input  as $item_input)
                    <tr>
                        <th colspan='6' class="text-primary"><b>{{ $item_input->keterangan }}</b></th>
                    </tr>
                        @foreach ($item_input->data_input as $key => $item_data_input)
                            <tr class="{{ ($item_data_input->jawaban1 != null)? 'bg-success':'' }}">
                                <td>{{ $key + 1 }}</td>
                                
                                <td>{{ $item_data_input->keterangan }}</td>                                                                       
                                <td>
                                    <select class="form-control select">
                                        <option value="">Pilih Status</option>
                                    @foreach ($status_performance as $item_status_performance)
                                        <option value="{{ $item_status_performance->kode }}">{{ $item_status_performance->keterangan }}</option>
                                    @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input class="form-control" type="file">
                                </td>
                                <td>
                                    <input class="form-control"  type="text">
                                </td>
                                
                                <td><a href="javascript:void(0)" class="{{ ($item_data_input->jawaban1 != null)? 'text-white':'text-primary' }} font-18" title="Add"><i class="fa fa-save"></i> </a>  
                                   
                                
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="text-center m-t-20">
    <button class="btn btn-primary submit-btn">Save</button>
</div>
@else
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong> </strong> Pilih Tahun yang sudah diinput
</div>
@endif

@endsection

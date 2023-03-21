@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-sm-4 col-3">
        <h4 class="page-title">Input Status Performance</h4>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-lg-12 col-sm-12">
        @if (Session::has('message'))
        <div class="alert alert-{{ Session::get('color-alert') }} alert-dismissible fade show" role="alert">
             {{ Session::get('message') }}
        </div>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
        <div class="card-box">
            <form action="{{ (request()->par !="") ? route('setting-status-performance-update',request()->par) : route('setting-status-performance-process') }}" method="POST">
                @csrf
                <div class="form-group row">
                    <label class="col-form-label col-md-2">Kode</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="kode" value="{{ $data_edit->kode }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-2">Keterangan</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="keterangan" value="{{ $data_edit->keterangan }}" >
                    </div>
                </div>
                <div class="m-t-20 text-center">
                    <button type="submit" class="btn btn-primary submit-btn">{{ (request()->par !="") ? "Ubah" : "Simpan" }}</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-sm-4 col-md-4 col-lg-4 col-xl-3">
        <p class="btn btn-primary btn-block"><i class="fa fa-list"></i> Daftar Status</p>
        <div class="roles-menu">
            <ul>
                @if($data_status->count() == null)
                    <li><a class="text-danger">Belum Ada Data</a></li>
                @else
                @foreach ($data_status as $item_status)
                <li class="">
                    <a>{{ $item_status->keterangan }}<br><code>{{ $item_status->kode }}</code></a>
                    <span class="role-action">
                        <a href="{{ route('setting-status-performance') }}?par={{ Enc($item_status->id) }}">
                            <span class="action-circle large">
                                <i class="material-icons text-secondary">edit</i>
                            </span>
                        </a>
                        <a data-toggle="modal" data-target="#delete_modal" onclick="return setDeleteId('{{ Enc($item_status->id) }}','{{ $item_status->keterangan }}');">
                            <span class="action-circle large delete-btn">
                                <i class="material-icons text-secondary">delete</i>
                            </span>
                        </a>
                    </span> 
                </li>
                @endforeach
                @endif
            </ul>
        </div>
    </div>
</div>

<div id="delete_modal" class="modal fade delete-modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <img src="assets/img/sent.png" alt="" width="50" height="46">
                <h3 id="title_delete"></h3>
                <form action="{{ route('setting-status-performance-delete') }}" method="POST" >
                <div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                    @csrf
                    <input type="hidden"  id="delete_menu" name="delete_menu">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script-bottom')
<script>

    function setDeleteId(paramId, paramRole)
    {
        console.log(paramId)
        document.getElementById("title_delete").innerHTML = 'Anda akan menghapus = '+paramRole;
        document.getElementById("delete_menu").value = paramId;
    }
</script>
    
@endpush

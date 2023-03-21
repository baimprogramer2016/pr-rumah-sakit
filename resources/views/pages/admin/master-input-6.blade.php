@extends('layouts.main')
@push('style-bottom')
<link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
@endpush
@section('content')
<div class="row">
    <div class="col-sm-4 col-3">
        <h4 class="page-title">Master Input 6</h4>
    </div>
    <div class="col-sm-8 col-9 text-right m-b-20">
        <a href="{{ route('adm-master-input-6-add') }}" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Tambah Data</a>
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
    <div class="col-md-12 col-lg-12 col-sm-12">
        
        <div class="form-group row">
            <div class="col-md-2">
                <form action="{{ route('adm-master-input-6') }}" method="GET">
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
            <div class="col-md-2">
                <form action="{{ route('adm-master-input-6') }}" method="GET">
                <input type="text" name='txt_cari' class="form-control" placeholder="Cari" value="{{ $txt_cari }}">
            </div>
            <div class="col-md-2">
                <button type="submit" name='cari' class="form-control btn btn-success">Cari</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-border table custom-table datatable mb-0">
                <thead>
                    <tr>
                        <th>Tahun</th>
                        <th>Unit</th>
                        
                        <th class="text-right">Action</th>
                    </tr>
                </thead>
                <tbody>
                   @foreach ($datamasterinput as $item_list)
                    <tr>
                        <td>{{ $item_list->tahun }}</td>
                        <td>{{ $item_list->keterangan }}</td>
                        
                        <td class="text-right">
                            
                            <div class="dropdown dropdown-action">
                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{ route('adm-master-input-6-edit', Enc($item_list->id)) }}"><i class="fa fa-pencil m-r-5"></i> Ubah</a>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_menu_modal" onclick="return setDeleteId('{{ Enc($item_list->id) }}','{{ $item_list->kode }}');"><i class="fa fa-trash-o m-r-5"></i> Hapus</a>
                                </div>
                            </div>
                            
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-3">
                {{ $datamasterinput->links() }}
            </div>
        </div>
    </div>
</div>

<div id="delete_menu_modal" class="modal fade delete-modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <img src="assets/img/sent.png" alt="" width="50" height="46">
                <h3 id="title_delete"></h3>
                <form action="{{ route('adm-master-input-6-delete') }}" method="POST" >
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
<script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('assets/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/js/moment.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>
<script>

    function setDeleteId(paramId, paramRoute)
    {
        document.getElementById("title_delete").innerHTML = paramRoute +" akan dihapus";
        document.getElementById("delete_menu").value = paramId;
    }
</script>
@endpush



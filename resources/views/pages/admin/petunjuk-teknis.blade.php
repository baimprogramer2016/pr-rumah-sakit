@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-sm-8 col-4">
        <h4 class="page-title">Petunjuk Teknis</h4>
    </div>
    <div class="col-sm-4 col-8 text-right m-b-30">
        <a class="btn btn-primary btn-rounded float-right" href="{{ route('adm-petunjuk-teknis-add') }}"><i class="fa fa-plus"></i> Tambah Petunjuk</a>
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
    @if($data_list->count() == 0)
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Belum ada data </strong> 
        </div>
    </div>
    @else
    @foreach ($data_list as $item_list)
        
        <div class="blog grid-blog col-md-12 col-sm-12">
            <div class="blog-content">
                <h3 class="blog-title"><a href="">{{ $item_list->input }}</a></h3>
                <p>{{ substr(strip_tags($item_list->keterangan),0,500) }}</p>
                <a href="#" class="read-more"><i class="fa fa-long-arrow-right"></i> Baca Lengkap</a>
                <div class="blog-info clearfix">
                    <div class="post-left">
                        <ul>
                            <li><a href="#"><i class="fa fa-calendar"></i> <span>{{ $item_list->created_at }}</span></a></li>
                        </ul>
                    </div>
                    <div class="post-right">
                        <a href="{{ route('adm-petunjuk-teknis-edit' , Enc($item_list->id)) }}"><i class="fa fa-pencil"></i></a> 
                        <a href="#" data-toggle="modal" data-target="#delete_petunjuk_modal" onclick="return setDeleteId('{{ Enc($item_list->id) }}','{{ $item_list->input }}');"><i class="fa fa-trash"></i></a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>
<div id="delete_petunjuk_modal" class="modal fade delete-modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <img src="assets/img/sent.png" alt="" width="50" height="46">
                <h3 id="title_delete"></h3>
                <form action="{{ route('adm-petunjuk-teknis-delete') }}" method="POST" >
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

    function setDeleteId(paramId, paramUser)
    {
        document.getElementById("title_delete").innerHTML = 'Anda akan menghapus User '+paramUser;
        document.getElementById("delete_menu").value = paramId;
    }
</script>
@endpush
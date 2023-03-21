  @extends('layouts.main')
  @push('style-bottom')
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/summernote/dist/summernote-bs4.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/select2.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}">
  @endpush
  @section('content')
    <div class="row">
        <div class="col-sm-4 col-3">
            <h4 class="page-title">Tambah Petunjuk Teknis</h4>
        </div>
        <div class="col-sm-8 col-9 text-right m-b-20">
            <a href="{{ route('adm-petunjuk-teknis') }}" class="btn btn-primary float-right btn-rounded"><i class="fa fa-list"></i> Daftar</a>
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
                    <div class="col-sm-12">
                        <div class="card-box">
                            <form action="{{ route('adm-petunjuk-teknis-process') }}" method="POST">
                                @csrf
                                    <div class="form-group">
                                        <select class="select floating" name='input'>
                                            <option value="petunjuk_teknis">Petunjuk Teknis</option>
                                            @foreach ($data_list as $item_list)
                                                <option  value="{{ $item_list->route_parent }}">{{ $item_list->route_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                
                               
                                <div class="form-group">
                                    <textarea rows="4" cols="5" class="form-control summernote" name="keterangan"></textarea>
                                </div>
                                <div class="form-group mb-0">
                                    <div class="text-center compose-btn">
                                        <button type="submit" class="btn btn-primary"><span>Simpan</span> </button>   
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
@endsection
@push('script-bottom')
<script src="{{ asset('assets/plugins/summernote/dist/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('assets/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/js/moment.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>
@endpush
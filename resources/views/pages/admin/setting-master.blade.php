@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-sm-4 col-3">
        <h4 class="page-title">Pengaturan Master</h4>
    </div>
    <div class="col-sm-8 col-9 text-right m-b-20">
        
    </div>
</div>

<div class="row">
    @foreach ($data_sub_menu as $item_subadmin)
    <div class="col-md-4 col-sm-4 col-lg-4 col-xl-3">
        <div class="dash-widget">
            <span class="dash-widget-bg1"><i class="{{ $item_subadmin->route_icon }}" aria-hidden="true"></i></span>
            <div class="dash-widget-info text-right">
                <h3>{{ $item_subadmin->route_name }}</h3>
                <a href="{{ ($item_subadmin->route !='')? route($item_subadmin->route) : '' }}"><span class="widget-title1">input</span></a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
@extends('layouts.app_backend')
@section('title','Cập nhật menu')
@section('content')
    <h1>Cập nhật menu</h1>
    <div class="row">
        <div class="col-sm-7">
            <div class="card">
                <div class=" p-3">
                    @include('backend.menu.list')
                </div>
            </div>
        </div>
        <div class="col-sm-5">
            <div class="card">
                @include('backend.menu.form',['route' => route('get_backend.menu.update', $menu)])
            </div>
        </div>
    </div>
@stop


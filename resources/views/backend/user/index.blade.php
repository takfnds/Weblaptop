@extends('layouts.app_backend')
@section('title','Danh sách thành viên')
@section('content')
    <h1>Danh sách thành viên</h1>
    <div class="row">
        <div class="col-sm-7">
            <div class="card">
                <div class=" p-3">
                    @include('backend.user.list')
                </div>
            </div>
        </div>
        <div class="col-sm-5">
            <div class="card">
{{--                @include('backend.menu.form',['route' => route('get_backend.menu.store')])--}}
            </div>
        </div>
    </div>
@stop


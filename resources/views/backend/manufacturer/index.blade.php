@extends('layouts.app_backend')
@section('title','Danh sách keyword')
@section('content')
    <h1>Danh sách hãng</h1>
    <div class="row">
        <div class="col-sm-7">
            <div class="card">
                <div class=" p-3">
                    @include('backend.manufacturer.list')
                </div>
            </div>
        </div>
        <div class="col-sm-5">
            <div class="card">
                @include('backend.manufacturer.form',['route' => route('get_backend.manufacturer.store')])
            </div>
        </div>
    </div>
@stop


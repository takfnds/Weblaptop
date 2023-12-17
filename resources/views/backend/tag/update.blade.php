@extends('layouts.app_backend')
@section('title','Cập nhật tags')
@section('content')
    <h1>Danh sách tags</h1>
    <div class="row">
        <div class="col-sm-7">
            <div class="card">
                <div class=" p-3">
                    @include('backend.tag.list')
                </div>
            </div>
        </div>
        <div class="col-sm-5">
            <div class="card">
                @include('backend.tag.form',['route' => route('get_backend.tag.update', $tag->id)])
            </div>
        </div>
    </div>
@stop


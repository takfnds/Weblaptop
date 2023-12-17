@extends('layouts.app_backend')
@section('title','Danh sách danh mục')
@section('content')
    <h1>Danh sách danh mục</h1>
    <div class="row">
        <div class="col-sm-8">
            <div class="card">
                <div class=" p-3">
                    @include('backend.category.list')
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                @include('backend.category.form',['route' => route('get_backend.category.store')])
            </div>
        </div>
    </div>
@stop


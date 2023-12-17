@extends('layouts.app_backend')
@section('title','Cập nhật danh mục')
@section('content')
    <h1>Cập nhật danh mục</h1>
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
                @include('backend.category.form',['route' => route('get_backend.category.update', $category)])
            </div>
        </div>
    </div>
@stop


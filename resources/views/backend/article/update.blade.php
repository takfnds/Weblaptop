@extends('layouts.app_backend')
@section('title','Cập nhật bài viết')
@section('content')
    @include('backend.article.form',['item' => $article])
@stop


@extends('layouts.app_user')
@section('title','Cập nhật thông tin')
@section('content')
    <form method="POST">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Họ tên</label>
            <input type="text" class="form-control" name="name" value="{{ $user->name }}" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" class="form-control" name="email" value="{{ $user->email }}" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Địa chỉ</label>
            <input type="text" class="form-control" name="address" value="{{ $user->address }}" placeholder="Địa chỉ">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Số điện thoại</label>
            <input type="text" class="form-control" name="phone" value="{{ $user->phone }}" placeholder="Địa chỉ">
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
@stop

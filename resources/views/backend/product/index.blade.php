@extends('layouts.app_backend')
@section('title','Danh sách sản phẩm')
@section('content')
    <h1>Danh sách sản phẩm <a href="{{ route('get_backend.product.create') }}" class="btn btn-xs btn-success">Thêm mới</a></h1>
    <table class="table table-hover" id="jsDataTable">
        <thead>
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Category</th>
            <th>Hot</th>
            <th>Price</th>
            <th>Time</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>
                    <a href="">
                        <img src="{{ pare_url_file($item->pro_avatar) }}" class="img-thumbnail" style="width: 60px;height: 60px" alt="">
                    </a>
                </td>
                <td style="width: 300px">
                    <a href="{{ route('get.product_detail', $item->pro_slug) }}" target="_blank">
                        {{ $item->pro_name }}
                    </a>
                </td>
                <td>{{ $item->category->c_name ?? "[N\A]" }}</td>
                <td>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline1"  value="1" {{ $item->pro_hot == 1 ? "checked" : "" }}  class="custom-control-input">
                        <label class="custom-control-label" for="customRadioInline1">Nổi bật</label>
                    </div>
                </td>
                <td><span class="text-danger">{{ number_format($item->pro_price,0,',','.') }} đ</span></td>
                <td>{{ $item->created_at }}</td>
                <td>
                    <a href="{{ route('get_backend.product.update', $item->id) }}" class="btn btn-sm btn-primary">Update</a>
                    <a href="{{ route('get_backend.product.delete', $item->id) }}" class="btn btn-sm btn-danger">Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop


@extends('layouts.app_user')
@section('title','Chi tiết đơn hàng')
@section('content')
    <h1>
        Chi tiết đơn hàng #{{ $transaction->id }} - Tổng tiền <b>{{ number_format($transaction->t_total_money,0,',','.') }} VNĐ</b>
    </h1>
    <p>Trạng thái <span class="text-{{ $transaction->getStatus($transaction->t_status)['class'] }}">{{ $transaction->getStatus($transaction->t_status)['name'] }}</span></p>
{{--    <div>--}}
{{--        <a href="{{ route('get_backend.transaction.cancel', $transaction->id) }}" class="btn btn-sm btn-danger">Huỷ bỏ</a>--}}
{{--    </div>--}}
    <table class="table table-hover mt-3">
        <thead>
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Total Money</th>
            <th>Time</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>
                    <a href="">
                        <img src="{{ pare_url_file($item->product->pro_avatar ?? '') }}" class="img-thumbnail" style="width: 60px;height: 60px" alt="">
                    </a>
                </td>
                <td>
                    <a href="{{ route('get.product_detail', $item->product->pro_slug ?? '') }}" target="_blank">
                        {{ $item->product->pro_name ?? "" }}
                    </a>
                </td>
                <td><span class="text-danger">{{ number_format($item->od_price,0,',','.') }} đ</span></td>
                <td><span class="text-danger">{{ $item->od_price }}  * {{  $item->od_qty }} = {{ number_format($item->od_price * $item->od_qty,0,',','.') }} đ</span></td>
                <td>{{ $item->created_at }}</td>
                <td>

                    @if($transaction->t_status == \App\Models\Transaction::STATUS_DEFAULT)
                    <a href="{{ route('get_user.order.delete', $item->id) }}" class="btn btn-sm btn-danger">Delete</a>
                    @endif
                        <a href="{{ route('get_user.vote.create',['productID' => $item->od_product_id]) }}">Đánh giá</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@stop


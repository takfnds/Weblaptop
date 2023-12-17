@extends('layouts.app_user')
@section('title','Đơn hàng của bạn')
@section('content')
    <table class="table table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Money</th>
            <th>Status</th>
            <th>Time</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($transactions as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->t_name }}</td>
                <td>{{ $item->t_phone }}</td>
                <td><span class="text-danger">{{ number_format($item->t_total_money,0,',','.') }} đ</span></td>
                <td><span class="text-{{ $item->getStatus($item->t_status)['class'] }}">{{ $item->getStatus($item->t_status)['name'] }}</span></td>
                <td>{{ $item->created_at }}</td>
                <td>
                    <a href="{{ route('get_user.transaction.view', $item->id) }}" class="btn btn-sm btn-primary">View</a>
                    @if($item->t_status == \App\Models\Transaction::STATUS_DEFAULT)
                        <a href="{{ route('get_user.transaction.delete', $item->id) }}" class="btn btn-sm btn-danger">Delete</a>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop

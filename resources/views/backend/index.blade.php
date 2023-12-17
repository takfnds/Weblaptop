@extends('layouts.app_backend')
@section('content')
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Thành viên
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $countUser }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Sản phẩm
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $countProduct }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Đơn hàng
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $countTransaction }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Bài viết
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $countArticle }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="margin-bottom: 15px;">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title" style="margin-bottom: 10px;">Thống kê doanh thu các ngày trong tháng</h3>
                    <form class="form-inline">
                        <div class="form-group">
                            <select name="status"
                                    class="form-control js-change-status" style="width: 200px !important;font-size: 14px !important;">
                                <option value="">Trạng thái</option>
                                @foreach($status ?? [] as $key => $item)
                                    <option value="{{ $key }}" {{ (Request::get('status') ?? 0 )== $key ? "selected" : "" }}>{{ $item['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group" style="margin: 0 5px;">
                            <select name="month"
                                    class="form-control js-change-month" style="width: 200px !important;font-size: 14px !important;">
                                <option value="">Tháng</option>
                                @for($i = 1 ; $i <= 12; $i ++)
                                    <option value="{{ $i }}" {{ $month == $i ? "selected" : "" }}>Tháng {{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </form>
                </div>
                <!-- /.box-header -->
                <div class="box-body" id="body-line-chart" style="min-height: 140px;">
                    <div class="loader">Loading...</div>
                </div>
            </div>
            <!-- /.box -->
        </div>
    </div>
    <div class="row">
        <div class="col-xl-4">
            <h5>Thành viên mới đăng ký</h5>
            <table class="table table-hover" >
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->phone }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-xl-1">.</div>
        <div class="col-xl-7">
            <h5>Đơn hàng mới</h5>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Money</th>
                    <th>Note</th>
                    <th>Time</th>
                </tr>
                </thead>
                <tbody>
                @foreach($transactions as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->t_name }}</td>
                        <td>{{ $item->t_phone }}</td>
                        <td><span class="text-danger">{{ number_format($item->t_total_money,0,',','.') }} đ</span></td>
                        <td>{{ $item->t_note }}</td>
                        <td>{{ $item->created_at }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

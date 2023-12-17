@extends('layouts.app_frontend')
@section('title','Giỏ hàng của bạn')
@section('content')
    <div class="container-fluid">
        <section class="py-5">
            <!-- BILLING ADDRESS-->
            <h2 class="h5 text-uppercase mb-4">Thông tin thanh toán</h2>
            <div class="row">
                <div class="col-lg-8">
                    <form action="" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 form-group">
                                <label class="text-small text-uppercase" for="firstName">Họ tên</label>
                                <input class="form-control form-control-lg" value="{{ $user->name ?? '' }}" id="firstName" name="t_name" required type="text" placeholder="Họ tên người nhận">
                            </div>
                            <div class="col-lg-6 form-group">
                                <label class="text-small text-uppercase" for="email">Email</label>
                                <input class="form-control form-control-lg" value="{{ $user->email ?? '' }}" id="email" type="email" name="t_email" required placeholder="Emal người nhận">
                            </div>
                            <div class="col-lg-6 form-group">
                                <label class="text-small text-uppercase" for="phone">Số điện thoại</label>
                                <input class="form-control form-control-lg" value="{{ $user->phone ?? '' }}" required id="phone" name="t_phone" type="tel" placeholder="Số điện thoại người nhận">
                            </div>
                            <div class="col-lg-6 form-group">
                                <label class="text-small text-uppercase" for="address">Địa chỉ</label>
                                <input class="form-control form-control-lg" value="{{ $user->address ?? '' }}" required id="address" name="t_address" type="text" placeholder="Địa chỉ nhận hàng">
                            </div>
                            <div class="col-lg-6 form-group">
                                <label class="text-small text-uppercase" for="note">Ghi chú</label>
                                <input class="form-control form-control-lg"  value="Nhận hàng mới thanh toán"  required name="t_note" type="text" placeholder="Note">
                            </div>
                            <div class="col-lg-6 form-group">
                                <label class="text-small text-uppercase" for="note">Phương thức thanh toán</label>
                                <select name="t_type" id="" class="form_control">
                                    <option value="1">Nhận hàng thanh toán</option>
                                    <option value="2">Thanh toán online</option>
                                </select>
                            </div>
                            <div class="col-lg-12 form-group">
                                <button class="btn btn-dark" type="submit">Tiến hành thanh toán</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- ORDER SUMMARY-->
                <div class="col-lg-4">
                    <div class="card border-0 rounded-0 p-lg-4 bg-light">
                        <div class="card-body">
                            <h5 class="text-uppercase mb-4">Tổng đơn hàng</h5>
                            <ul class="list-unstyled mb-0">
                                <li class="d-flex align-items-center justify-content-between">
                                    <strong class="text-uppercase small font-weight-bold">Số tiền </strong><span>{{  Cart::subtotal(0) }} VNĐ</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop


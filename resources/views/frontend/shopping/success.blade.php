@extends('layouts.app_frontend')
@section('title','Xử lý đơn hàng thành công')
@section('content')
    <div class="container-fluid">
        <section class="py-5">
            <h2 class="h5 text-uppercase mb-4">Thông báo</h2>
            <div class="row">
                <div class="col-lg-8 mb-4 mb-lg-0 offset-2">
                    <div class="card">
                        <div class="card-header">
                            <h5>Thanh toán đơn hàng thành công</h5>
                        </div>
                        <div class="card-body cart">
                            <div class="col-sm-12 empty-cart-cls text-center"> <img src="https://i.imgur.com/dCdflKN.png" width="130" height="130" class="img-fluid mb-4 mr-3">
                                <h3><strong>Vui lòng để ý điện thoại</strong></h3>
                                <h4>Nhân viên chúng tôi sẽ liên hệ với bạn trong vòng 24h tới</h4>
                                <a href="/" title="Tiếp tục mua hàng" class="btn btn-primary cart-btn-transform m-3" data-abc="true">Tiếp tục mua hàng</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop


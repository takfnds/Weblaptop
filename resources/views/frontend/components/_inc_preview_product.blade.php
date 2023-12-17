<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="row align-items-stretch">
                    <div class="col-lg-6 p-lg-0">
                        <a class="product-view d-block h-100 bg-cover bg-center"
                                                    style="background: url({{ pare_url_file($product->pro_avatar) }})" href="{{ pare_url_file($product->pro_avatar) }}" data-lightbox="productview" title="Red digital smartwatch"></a>
                        <a class="d-none" href="{{ pare_url_file($product->pro_avatar) }}" title="Red digital smartwatch" data-lightbox="productview"></a>
                        <a class="d-none" href="{{ pare_url_file($product->pro_avatar) }}" title="Red digital smartwatch" data-lightbox="productview"></a>
                    </div>
                    <div class="col-lg-6">
                        <button class="close p-4" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <div class="p-5 my-md-4">
                            <ul class="list-inline mb-2">
                                <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                                <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                                <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                                <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                                <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                            </ul>
                            <h2 class="h4">{{ $product->pro_name }}</h2>
                            <p class="text-muted">{{ number_format($product->pro_price,0,',','.') }} VNĐ</p>
                            <p class="text-small mb-4">{{ $product->pro_description }}</p>
                            <div class="row align-items-stretch mb-4 box-qty">
                                <div class="col-sm-7 pr-sm-0">
                                    <div class="border d-flex align-items-center justify-content-between py-1 px-3">
                                        <span class="small text-uppercase text-gray mr-4 no-select">Qty</span>
                                        <div class="quantity">
                                            <button class="dec-btn p-0"><i class="fas fa-caret-left"></i></button>
                                            <input class="form-control border-0 shadow-0 p-0 val-qty" type="text" value="1">
                                            <button class="inc-btn p-0"><i class="fas fa-caret-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-5 pl-sm-0"><a class=" js-add-cart btn btn-dark btn-sm btn-block h-100 d-flex align-items-center justify-content-center px-0"
                                                                 href="{{ route('get_ajax.shopping.add', $product->id) }}">Thêm giỏ hàng</a></div>
                            </div>
{{--                            <a class="btn btn-link text-dark p-0" href="#"><i class="far fa-heart mr-2"></i>Add to wish list</a>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

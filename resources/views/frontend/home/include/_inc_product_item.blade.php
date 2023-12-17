<div class="item">
    <a href="{{ route('get.product_detail',['slug' => $item->pro_slug]) }}"
       class=" main-contain" data-cate="Điện thoại" data-box="BoxHome">
        <div class="item-img">
            <img class=" lazyloaded" alt="Samsung Galaxy S21 5G" width="210" height="210"
                 src="{{ pare_url_file($item->pro_avatar) }}">
        </div>
        <h3>{{ $item->pro_name }}</h3>
        @if($item->pro_sale)
            <div class="box-p">
                <p class="price-old black">{{ number_format($item->pro_price,0,',','.') }}₫</p>
                <span class="percent">-{{ $item->pro_sale }}%</span>
            </div>
            <strong
                    class="price">{{ number_format(((100 - $item->pro_sale) * $item->pro_price) / 100) }}
                ₫</strong>
        @else
            <strong class="price">{{ number_format($item->pro_price,0,',','.') }}₫</strong>
        @endif
        <div class="item-rating">
            <p>
                <i class="icon-star"></i>
                <i class="icon-star"></i>
                <i class="icon-star"></i>
                <i class="icon-star"></i>
                <i class="icon-star-dark"></i>
            </p>
            <p class="item-rating-total">119</p>
        </div>
    </a>
</div>

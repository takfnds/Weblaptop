<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ asset('asset_blog/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{ asset('asset_blog/vendor/font-awesome/css/font-awesome.min.css') }}">
    <!-- Custom icon font-->
    <link rel="stylesheet" href="{{ asset('asset_blog/css/fontastic.css') }}">
    <!-- Google fonts - Open Sans-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
    <!-- Fancybox-->
    <link rel="stylesheet" href="{{ asset('asset_blog/vendor/@fancyapps/fancybox/jquery.fancybox.min.css') }}">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{ asset('asset_blog/css/style.default.css') }}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{ asset('asset_blog/css/custom.css') }}">
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">
    <meta itemprop="image" content="https://doancntt.com/social.png">
    <meta property="og:image" content="">
    <meta property="og:image:height" content="315">
    <meta property="og:image:width" content="600">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <style>
        .row-2 {
            line-height: 1.3;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<header class="header">
    <!-- Main Navbar-->
    <nav class="navbar navbar-expand-lg">
        <div class="search-area">
            <div class="search-area-inner d-flex align-items-center justify-content-center">
                <div class="close-btn"><i class="icon-close"></i></div>
                <div class="row d-flex justify-content-center">
                    <div class="col-md-8">
                        <form action="{{ route('get.blog.search') }}">
                            <div class="form-group">
                                <input type="search" name="k" value="{{ Request::get('k') }}" id="search" placeholder="Nội dung tìm kiếm ...">
                                <button type="submit" class="submit"><i class="icon-search-1"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <!-- Navbar Brand -->
            <div class="navbar-header d-flex align-items-center justify-content-between">
                <!-- Navbar Brand --><a href="/" class="navbar-brand">Blog Website</a>
                <!-- Toggle Button-->
                <button type="button" data-toggle="collapse" data-target="#navbarcollapse" aria-controls="navbarcollapse" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span></span><span></span><span></span></button>
            </div>
            <!-- Navbar Menu -->
            <div id="navbarcollapse" class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    @foreach($menusGlobal as $item)
                    <li class="nav-item">
                        <a href="{{ route('get.menu', $item->mn_slug) }}" class="nav-link {{  Request::segment(2)  == $item->mn_slug ? 'active' : '' }}">{{ $item->mn_name }}</a>
                    </li>
                    @endforeach
                </ul>
                <div class="navbar-text"><a href="#" class="search-btn"><i class="icon-search-1"></i></a></div>
            </div>
        </div>
    </nav>
</header>
@yield('content')
<!-- Page Footer-->
<footer class="bg-dark text-white">
    <div class="container py-4">
        <div class="row py-5">
            <div class="col-md-4 mb-3 mb-md-0">
                <h6 class="text-uppercase mb-3">Thông tin liên hệ</h6>
                <ul class="list-unstyled mb-0">
                    <li><a class="footer-link" href="#">Công ty ABC ..</a></li>
                    <li><a class="footer-link" href="#">Địa chỉ : Hà Nội</a></li>
                    <li><a class="footer-link" href="#">Email : abc@gmail.com</a></li>
                    <li><a class="footer-link" href="#">Phone : 0986420994</a></li>
                </ul>
            </div>
            <div class="col-md-4 mb-3 mb-md-0">
                <h6 class="text-uppercase mb-3">Về chúng tôi</h6>
                <ul class="list-unstyled mb-0">
                    <li><a class="footer-link" href="#">Giới thiệu</a></li>
                    @foreach($menusGlobal as $item)
                        <li><a class="footer-link" href="{{ route('get.menu', $item->mn_slug) }}">{{ $item->mn_name }}</a></li>
                    @endforeach

                </ul>
            </div>
            <div class="col-md-4">
                <h6 class="text-uppercase mb-3">Chính sách</h6>
                <ul class="list-unstyled mb-0">
                    <li><a class="footer-link" href="#">Chính sách mua hàng</a></li>
                    <li><a class="footer-link" href="#">Chính sách đổi trả</a></li>
                    <li><a class="footer-link" href="#">Chính sách bảo mật thông tin</a></li>
                </ul>
            </div>
        </div>
        <div class="border-top pt-4" style="border-color: #1d1d1d !important">
            <div class="row">
                <div class="col-lg-6">
                    <p class="small text-muted mb-0">&copy; 2020 All rights reserved.</p>
                </div>
                <div class="col-lg-6 text-lg-right">
                    <p class="small text-muted mb-0">Template designed by <a class="text-white reset-anchor"
                                                                             href="https://bootstraptemple.com/p/bootstrap-ecommerce">Bootstrap
                            Temple</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- JavaScript files-->
<script src="{{ asset('asset_blog/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('asset_blog/vendor/popper.js/umd/popper.min.js') }}"> </script>
<script src="{{ asset('asset_blog/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('asset_blog/vendor/jquery.cookie/jquery.cookie.js') }}"> </script>
<script src="{{ asset('asset_blog/vendor/@fancyapps/fancybox/jquery.fancybox.min.js') }}"></script>
<script src="{{ asset('asset_blog/js/front.js') }}"></script>
</body>
</html>

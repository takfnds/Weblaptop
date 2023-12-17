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
        /*
*
* ==========================================
* CUSTOM UTIL CLASSES
* ==========================================
*
*/

        .vertical-nav {
            min-width: 17rem;
            width: 17rem;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.1);
            transition: all 0.4s;
        }

        .page-content {
            width: calc(100% - 17rem);
            margin-left: 17rem;
            transition: all 0.4s;
        }

        /* for toggle behavior */

        #sidebar.active {
            margin-left: -17rem;
        }

        #content.active {
            width: 100%;
            margin: 0;
        }

        @media (max-width: 768px) {
            #sidebar {
                margin-left: -17rem;
            }
            #sidebar.active {
                margin-left: 0;
            }
            #content {
                width: 100%;
                margin: 0;
            }
            #content.active {
                margin-left: 17rem;
                width: calc(100% - 17rem);
            }
        }

        /*
        *
        * ==========================================
        * FOR DEMO PURPOSE
        * ==========================================
        *
        */

        body {
            /*background: #599fd9;*/
            /*background: -webkit-linear-gradient(to right, #599fd9, #c2e59c);*/
            /*background: linear-gradient(to right, #599fd9, #c2e59c);*/
            min-height: 100vh;
            overflow-x: hidden;
        }

        .separator {
            margin: 3rem 0;
            border-bottom: 1px dashed #fff;
        }

        .text-uppercase {
            letter-spacing: 0.1em;
        }

        .text-gray {
            color: #aaa;
        }

    </style>
</head>
<body>
<!-- Vertical navbar -->
<div class="vertical-nav bg-white" id="sidebar">
    <div class="py-4 px-3 mb-4 bg-light">
        <div class="media d-flex align-items-center">
            <img src="https://res.cloudinary.com/mhmd/image/upload/v1556074849/avatar-1_tcnd60.png" alt="..." width="65" class="mr-3 rounded-circle img-thumbnail shadow-sm">
            <div class="media-body">
                <h4 class="m-0">{{ get_data_user('web','name') }}</h4>
                <p class="font-weight-light text-muted mb-0">{{ get_data_user('web','phone') }}</p>
            </div>
        </div>
    </div>
    <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">Main</p>
    <ul class="nav flex-column bg-white mb-0">
        @foreach(config('nav.user') as $item)
            <li class="nav-item">
                <a href="{{ route($item['route'],isset($item['param']) ? get_data_user('web') : '') }}" class="nav-link text-dark font-italic bg-light">
                    <i class="fa {{ $item['icon'] }} mr-3 text-primary fa-fw"></i>
                    {{ $item['name'] }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
<!-- End vertical navbar -->
<!-- Page content holder -->
<div class="page-content p-5" id="content">
    <!-- Toggle button -->
    <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Toggle</small></button>
    <!-- Demo content -->
    <div class="">
    @yield('content')
    </div>
</div>

<script src="{{ asset('asset_blog/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('asset_blog/vendor/popper.js/umd/popper.min.js') }}"> </script>
<script src="{{ asset('asset_blog/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('asset_blog/vendor/jquery.cookie/jquery.cookie.js') }}"> </script>
<script src="{{ asset('asset_blog/vendor/@fancyapps/fancybox/jquery.fancybox.min.js') }}"></script>
<script src="{{ asset('asset_blog/js/front.js') }}"></script>
<script>
    $( function (){
        $('#sidebarCollapse').on('click', function() {
            $('#sidebar, #content').toggleClass('active');
        });
    })
</script>
</body>
</html>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">
    <style>
        .login,
        .image {
            min-height: 100vh;
        }

        .bg-image {
            background-image: url('https://res.cloudinary.com/mhmd/image/upload/v1555917661/art-colorful-contemporary-2047905_dxtao7.jpg');
            background-size: cover;
            background-position: center center;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row no-gutter">
        <!-- The image half -->
        <div class="col-md-5 d-none d-md-flex bg-image"></div>


        <!-- The content half -->
        <div class="col-md-7 bg-light">
            <div class="login d-flex align-items-center py-5">

                <!-- Demo content-->
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 col-xl-7 mx-auto">
                            <h3 class="display-4">Thành viên đăng ký</h3>
                            <p class="text-muted mb-4">Điền đầy đủ thông tin đăng nhập hệ thống</p>
                            <form method="POST" action="">
                                @csrf
                                <div class="form-group mb-3">
                                    <input id="inputEmail" type="email" placeholder="Email address" name="email"  value="{{ old('email') }}" required="" autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4">
                                    @if($errors->first('email'))
                                        <small id="emailHelp" class="form-text text-danger">{{ $errors->first('email') }}</small>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input id="inputPassword" type="password" placeholder="Password" name="password" required="" class="form-control rounded-pill border-0 shadow-sm px-4 text-primary">
                                    @if($errors->first('password'))
                                        <small id="emailHelp" class="form-text text-danger">{{ $errors->first('password') }}</small>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input  type="text" placeholder="Name" name="name" required="" value="{{ old('name') }}" class="form-control rounded-pill border-0 shadow-sm px-4 text-primary">
                                    @if($errors->first('name'))
                                        <small id="emailHelp" class="form-text text-danger">{{ $errors->first('name') }}</small>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input  type="text" placeholder="Phone" name="phone" required="" value="{{ old('phone') }}" class="form-control rounded-pill border-0 shadow-sm px-4 text-primary">
                                    @if($errors->first('phone'))
                                        <small id="emailHelp" class="form-text text-danger">{{ $errors->first('phone') }}</small>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm">Sign in</button>
                                <div class="text-center d-flex justify-content-between mt-4"><p>Bạn đã có tài khoản, vui lòng đăng nhập
                                        <a href="{{ route('get.login') }}" class="font-italic text-muted">
                                            <u>Tại đây</u></a></p></div>
                            </form>
                        </div>
                    </div>
                </div><!-- End -->

            </div>
        </div><!-- End -->

    </div>
</div>

</body>
</html>
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

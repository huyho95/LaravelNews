<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Laravel 5.8|@yield('title')</title>
    <base href="{{asset('')}}">
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">
    <link href="css/my.css" rel="stylesheet">
    @yield('css')
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    @include('layout.header')

    <div class="container">
    <!-- slider -->
    <div class="row carousel-holder">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="panel panel-default" style="margin-top: 50px">
                <div class="panel-heading text-center">LOGIN</div>
                <div class="panel-body">

                    @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $er)
                        {{$er}}<br>
                        @endforeach
                    </div>
                    @endif

                    @if(session('notification'))
                    <div class="alert alert-success">
                        {{session('notification')}}
                    </div>
                    @endif

                    <form action="login" method="post">
                        <!-- action gửi dữ liệu lên route đăng nhập thông qua đường dẫn login -->
                        @csrf
                        <div>
                            <label>Email</label>
                            <input type="email" class="form-control" placeholder="Email" name="email">
                        </div>
                        <br>
                        <div>
                            <label>Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-default">Log In
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
    <!-- end slide -->
</div>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/my.js"></script>
    
    @yield('script')
</body>

</html>













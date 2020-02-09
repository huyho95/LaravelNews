<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="home">LARAVEL</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="intro">About us</a>
                </li>
                <li>
                    <a href="contact">Contact</a>
                </li>
            </ul>

            <form action="search" method="GET" class="navbar-form navbar-left" role="search">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search" name="key">
                </div>
                <button type="submit" class="btn btn-success">Go</button>
            </form>

            <ul class="nav navbar-nav pull-right">
                @if(!Auth::check())
                <!-- Nếu chưa đăng nhập  -->
                <li>
                    <a href="register">
                        <p style="font-size: 17px;margin-bottom: 0px;">Sign Up</p>
                    </a>
                </li>
                <li>
                    <a href="login">
                        <p style="font-size: 17px;margin-bottom: 0px;">Sign In</p>
                    </a>
                </li>
                @else
                <li>
                    <a href="userDetail">
                        <span class="glyphicon glyphicon-user"></span>
                        {{Auth::user()->name}} (
                        @if(Auth::user()->quyen == 1)
                        {{'Admin'}}
                        @else
                        {{'User'}}
                        @endif )
                    </a>
                </li>

                <li>
                    <a href="logout">Log Out</a>
                </li>
                @endif
            </ul>
        </div>



        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
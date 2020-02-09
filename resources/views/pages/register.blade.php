@extends('layout.index')

@section('content')
<div class="container">

    <!-- slider -->
    <div class="row carousel-holder">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading text-center"><h2>Register</h2></div>
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
                    <form action="register" method="post">
                        @csrf
                        <div>
                            <label>First and last name</label>
                            <input type="text" class="form-control" placeholder="Username" name="name"
                                aria-describedby="basic-addon1">
                        </div>
                        <br>
                        <div>
                            <label>Email</label>
                            <input type="email" class="form-control" placeholder="Email" name="email"
                                aria-describedby="basic-addon1">
                        </div>
                        <br>
                        <div>
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" aria-describedby="basic-addon1">
                        </div>
                        <br>
                        <div>
                            <label>Confirm Password</label>
                            <input type="password" class="form-control" name="passwordAgain"
                                aria-describedby="basic-addon1">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-default">Register
                        </button>

                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-2">
        </div>
    </div>
    <!-- end slide -->
</div>
@endsection
@extends('admin.layout.index')

@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
                    <small>Add</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
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
                
                <form action="admin/user/them" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>First and Last Name</label>
                        <input class="form-control" name="Name" placeholder="Please Enter User Name" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="Email"
                            placeholder="Please Enter Email Address" />
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="Password"
                            placeholder="Please Enter Password" />
                    </div>
                    <div class="form-group">
                        <label>Password Again</label>
                        <input type="password" class="form-control" name="PasswordAgain"
                            placeholder="Please Enter Password Again" />
                    </div>
                    <div class="form-group">
                        <label>Position</label>
                        <label class="radio-inline">
                            <input name="Position" value="0" checked="" type="radio">User
                        </label>
                        <label class="radio-inline">
                            <input name="Position" value="1" type="radio">Admin
                        </label>
                    </div>
                    <button type="submit" class="btn btn-success">Add</button>
                    <button type="reset" class="btn btn-primary">Reset</button>
                    <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>

@endsection
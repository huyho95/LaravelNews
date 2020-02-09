@extends('admin.layout.index')

@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
                    <small>{{$user->name}}</small>
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

                <form action="admin/user/sua/{{$user->id}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>First and Last Name</label>
                        <input class="form-control" name="Name" placeholder="Please Enter User Name" value="{{$user->name}}"/>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="Email"
                            placeholder="Please Enter Email Address" value="{{$user->email}}" readonly=""/> 
                            <!-- Readonly: chỉ đọc không sửa được -->
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="changePassword" id="changePassword">
                        <label>Change your password</label>
                        <input type="password" class="form-control newPassword" name="Password"
                            placeholder="Please Enter New password" disabled=""/>
                    </div>
                    <div class="form-group">
                        <label>Confirm new password</label>
                        <input type="password" class="form-control newPassword1" name="PasswordAgain"
                            placeholder="Please enter new password again" disabled=""/>
                    </div>
                    <div class="form-group">
                        <label>Position</label>
                        <label class="radio-inline">
                            <input name="Position" value="0" 
                            @if($user->quyen == 0)
                                {{ "checked" }}
                            @endif
                             type="radio">User
                        </label>
                        <label class="radio-inline">
                            <input name="Position" value="1" 
                            @if($user->quyen == 1)
                                {{ "checked" }}
                            @endif
                            type="radio">Admin
                        </label>
                    </div>
                    <button type="submit" class="btn btn-success">Edit</button>
                    <button type="reset" class="btn btn-primary">Reset</button>
                    <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>

@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $("#changePassword").change(function(){
                if($(this).is(":checked"))
                {
                    $(".newPassword").removeAttr('disabled');
                    $(".newPassword1").removeAttr('disabled');
                    
                }
                else
                {
                    $(".newPassword").attr('disabled','');
                    $(".newPassword1").attr('disabled',''); // '': Tự động truyền giá trị cho disabled ( ở đây là giá trị rỗng)
                }
            });
        });
    </script>
@endsection
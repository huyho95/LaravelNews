@extends('layout.index')

@section('content')
<!-- Page Content -->
<div class="container">

    <!-- slider -->
    <div class="row carousel-holder">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading" style="text-align: center"><h2>Account Information</h2></div>
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
                    <form form="userDetail" method="post">
                        @csrf
                        <div>
                            <label>Last and first name</label>
                            <input type="text" class="form-control" placeholder="Username" name="name"
                                aria-describedby="basic-addon1" value="{{Auth::user()->name}}">
                        </div>
                        <br>
                        <div>
                            <label>Email</label>
                            <input type="email" class="form-control" placeholder="Email" name="email"
                                aria-describedby="basic-addon1" readonly value="{{Auth::user()->email}}">
                        </div>
                        <br>
                        <div>
                            <input type="checkbox" id="changePassword" class="" name="checkpassword">
                            <label>Create new password</label>
                            <input type="password" class="form-control password" name="password"
                                aria-describedby="basic-addon1" disabled>
                        </div>
                        <br>
                        <div>
                            <label>Enter new password again</label>
                            <input type="password" class="form-control password" name="passwordAgain"
                                aria-describedby="basic-addon1" disabled>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-default">Edit
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
<!-- end Page Content -->
@endsection

@section('script')
<script>
$(document).ready(function() {
    $("#changePassword").change(function() {
        if ($(this).is(":checked")) {
            $(".password").removeAttr('disabled');
        } else {
            $(".password").attr('disabled',''); // '': Tự động truyền giá trị cho disabled ( ở đây là giá trị rỗng)
        }
    });
});
</script>
@endsection
@extends('admin.layout.index')

@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Type of News
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

                <form action="admin/loaitin/them" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="Category">
                            @foreach($theloai as $tl)
                            <option value="{{$tl->id}}">{{$tl->Ten}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Name Type News</label>
                        <input class="form-control" name="txtCateName" placeholder="Please Enter Category Name" />
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
@extends('admin.layout.index')

@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Slide
                    <small>{{$slide->Ten}}</small>
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

                <form action="admin/slide/sua/{{$slide->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" name="Name" placeholder="Please Enter Title Name" value="{{$slide->Ten}}"/>
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <textarea name="Content" id="demo" class="form-control ckeditor" rows="3">
                            {{$slide->NoiDung}}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label>Link</label>
                        <input class="form-control" name="Link" placeholder="Please Enter Link" value="{{$slide->link}}"/>
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <p>
                            <img width="500px" src="upload/slide/{{$slide->Hinh}}" alt="">
                        </p>
                        <input type="file" name="Image" class="form-control">
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
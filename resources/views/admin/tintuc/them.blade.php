@extends('admin.layout.index')

@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">News
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
                <form action="admin/tintuc/them" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="Category" id="Category">
                            @foreach($theloai as $tl)
                            <option value="{{$tl->id}}">{{$tl->Ten}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Type Of News</label>
                        <select class="form-control" name="TypeNews" id="TypeNews">
                            @foreach($loaitin as $lt)
                            <option value="{{$lt->id}}">{{$lt->Ten}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input class="form-control" name="Title" placeholder="Please Enter Title Name" />
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="Description" id="demo" class="form-control ckeditor" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <textarea name="Content" id="demo" class="form-control ckeditor" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="Image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Hot</label>
                        <label class="radio-inline">
                            <input name="Hot" value="0" checked="" type="radio">No
                        </label>
                        <label class="radio-inline">
                            <input name="Hot" value="1" type="radio">Yes
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

@section('script')
<script>
$(document).ready(function() {
    $("#Category").change(function() {
        var idCategory = $(this).val();
        $.get("admin/ajax/loaitin/" + idCategory, function(data) {
            $("#TypeNews").html(data);
        });
    });
});
</script>
@endsection
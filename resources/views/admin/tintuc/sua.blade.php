@extends('admin.layout.index')

@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">News
                    <small>{{$tintuc->TieuDe}}</small>
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
                <form action="admin/tintuc/sua/{{$tintuc->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="Category" id="Category">
                            @foreach($theloai as $tl)
                            <option @if($tintuc->loaitin->theloai->id == $tl->id)
                                {{ "selected" }}
                                @endif
                                value="{{$tl->id}}">{{$tl->Ten}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Type Of News</label>
                        <select class="form-control" name="TypeNews" id="TypeNews">
                            @foreach($loaitin as $lt)
                            <option @if($tintuc->loaitin->id == $lt->id)
                                {{ "selected" }}
                                @endif
                                value="{{$lt->id}}">{{$lt->Ten}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input class="form-control" name="Title" placeholder="Please Enter Title Name"
                            value="{{$tintuc->TieuDe}}" />
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="Description" id="demo" class="form-control ckeditor"
                            rows="3">{{$tintuc->TomTat}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <textarea name="Content" id="demo" class="form-control ckeditor"
                            rows="5">{{$tintuc->NoiDung}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <p>
                            <img width="400px" src="upload/tintuc/{{$tintuc->Hinh}}" alt="">
                        </p>
                        <input type="file" name="Image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Hot</label>
                        <label class="radio-inline">
                            <input name="Hot" value="0" @if($tintuc->NoiBat == 0)
                            {{ "checked" }}
                            @endif
                            type="radio">No
                        </label>
                        <label class="radio-inline">
                            <input name="Hot" value="1" @if($tintuc->NoiBat == 1)
                            {{ "checked" }}
                            @endif
                            type="radio">Yes
                        </label>
                    </div>
                    <div class="form-group">
                        <label>Video</label>
                        <p>
                            <img width="400px" src="upload/video/{{$tintuc->Video}}" alt="">
                        </p>
                        <input type="file" name="video" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-success">Edit</button>
                    <button type="reset" class="btn btn-primary">Reset</button>
                    <form>
            </div>
        </div>

        <!-- /.row -->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Comment
                    <small>List</small>
                </h1>
            </div>

            @if(session('notification'))
            <div class="alert alert-success">
                {{session('notification')}}
            </div>
            @endif
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>User</th>
                        <th>Content</th>
                        <th>Time</th>   
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tintuc->comment as $cm)  
                    <!-- Trỏ sang function comment trong Model TinTuc-->
                    <tr class="odd gradeX" align="center">
                        <td>{{$cm->id}}</td>
                        <td>{{$cm->user->name}}</td>
                        <td>{!!$cm->NoiDung!!}</td>
                        <td>{{$cm->created_at}}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/comment/xoa/{{$cm->id}}/{{$cm->idTinTuc}}">Delete</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- end row -->
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
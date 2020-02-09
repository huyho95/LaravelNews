@extends('layout.index')

@section('content')
<!-- Page Content -->
<div class="container">
    <div class="row">

        <!-- Blog Post Content Column -->
        <div class="col-lg-9">

            <!-- Blog Post -->

            <!-- Title -->
            <h1>{{$tintuc->TieuDe}}</h1>

            <!-- Author -->
            <p class="lead">
                <div>
                    <small>by</small> <b>admin</b>
                </div>
            </p>

            <!-- Preview Image -->
            <img class="img-responsive" src="upload/tintuc/{{$tintuc->Hinh}}" alt="">

            <!-- Date/Time -->
            <p><span class="glyphicon glyphicon-time"></span> Posted on {{$tintuc->created_at}}</p>
            <hr>

            <!-- Post Content -->
            <div style="font-size: 20px">

                <b>{!! $tintuc->TomTat !!}</b>

                <p class="lead">
                    {!! $tintuc->NoiDung !!}

                </p>
            </div>


            <!-- Blog Comments -->

            <!-- Comments Form -->
            @if(Auth::check())
            <hr>
            <div class="well">
                @if(session('notification'))
                <div class="alert alert-success">
                    {{session('notification')}}
                </div>
                @endif

                <h4>Comment ...<span class="glyphicon glyphicon-pencil"></span></h4>
                <form action="comment/{{$tintuc->id}}" method="post" role="form">
                    @csrf
                    <div class="form-group">
                        <textarea class="form-control" name="content" rows="3" placeholder="What do you think of this news?"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Send</button>
                </form>
            </div>
            @endif


            <!-- Posted Comments -->

            <!-- Comment -->

            <!-- @foreach($tintuc->comment as $cm)
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">{{$cm->user->name}}
                        function user liên kết trong model comment lấy ra bảng user
                        <small>{{$cm->created_at}}</small>
                    </h4>
                    {{$cm->NoiDung}}
                </div>
            </div>
            @endforeach -->
            <hr>
            <h3 style="margin-bottom: 30px">Comment from viewers</h3>
            @foreach($comment as $cm)
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">{{$cm->user->name}}
                        <!-- function user liên kết trong model comment lấy ra bảng user -->
                        <small>{{$cm->created_at}}</small>
                    </h4>
                    {{$cm->NoiDung}}
                </div>
            </div>
            @endforeach

            {{$comment->links()}}

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-3">

            <div class="panel panel-default">
                <div class="panel-heading"><b style="color: blue">Related News</b></div>
                <div class="panel-body">

                    <!-- item -->
                    @foreach($tinlienquan as $tlq)
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-5">
                            <a href="news/{{$tlq->id}}/{{$tlq->TieuDeKhongDau}}.html">
                                <img class="img-responsive" src="upload/tintuc/{{$tlq->Hinh}}" alt="">
                            </a>
                        </div>
                        <div class="col-md-7">
                            <a href="#"><b>{{$tlq->TieuDe}}</b></a>
                        </div>

                        <div class="break"></div>
                    </div>
                    <!-- end item -->
                    @endforeach


                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading"><b style="color: blue">Featured News</b></div>
                <div class="panel-body">

                    <!-- item -->
                    @foreach($tinnoibat as $tnb)
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-5">
                            <a href="news/{{$tnb->id}}/{{$tnb->TieuDeKhongDau}}.html">
                                <img class="img-responsive" src="upload/tintuc/{{$tnb->Hinh}}" alt="">
                            </a>
                        </div>
                        <div class="col-md-7">
                            <a href="#"><b>{{$tnb->TieuDe}}</b></a>
                        </div>

                        <div class="break"></div>
                    </div>
                    @endforeach
                    <!-- end item -->

                </div>
            </div>

        </div>

    </div>
    <!-- /.row -->
</div>
<!-- end Page Content -->

@endsection
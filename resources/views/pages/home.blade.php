@extends('layout.index')

@section('content')
<!-- Page Content -->
<div class="container">

    @include('layout.slide')

    <div class="space20"></div>


    <div class="row main-left">
        @include('layout.menu')

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color:#337AB7; color:white;">
                    <h2 style="margin-top:0px; margin-bottom:0px;">News</h2>
                </div>

                <div class="panel-body">
                    @foreach($theloai as $tl)
                        @if( count($tl->loaitin) > 0 )
                        <!-- item -->
                        <div class="row-item row">
                            <h3>
                                <a>{{$tl->Ten}}</a> |
                                @foreach($tl->loaitin as $lt) 
                                    <!-- liên kết theo model -->
                                    <small><a href="typeOfnews/{{$lt->id}}/{{$lt->TenKhongDau}}.html"><i>{{$lt->Ten}}</i></a> /</small>
                                @endforeach
                            </h3>

                            <?php
                                $data = $tl->tintuc->where('NoiBat',1)->sortByDesc('created_at')->take(4);
                                $tin1 = $data->shift(); // $tin1 : mảng , hàm shift: lấy 1 tin trong tổng số 5 tin đã lấy ra ở trên
                            ?>

                            <div class="col-md-8 border-right">
                                <div class="col-md-5">
                                    <a href="news/{{$tin1['id']}}/{{$tin1['TieuDeKhongDau']}}.html">
                                        <img class="img-responsive" src="upload/tintuc/{{$tin1['Hinh']}}" alt="">
                                    </a>
                                </div>

                                <div class="col-md-7">
                                    <h3 style="margin-top: 0px">{{$tin1['TieuDe']}}</h3>
                                    <p>{!! $tin1['TomTat'] !!}</p>
                                    <a class="btn btn-primary" href="news/{{$tin1['id']}}/{{$tin1['TieuDeKhongDau']}}.html">More <span
                                            class="glyphicon glyphicon-chevron-right"></span></a>
                                </div>

                            </div>
                            <div class="col-md-4">
                                <h4 style="color: blue;margin-top: 0px"> Featured News</h4>
                                @foreach($data->all() as $tintuc)
                                <!-- $data->all(): lấy hết 4 tin còn lại, dữ liệu là mảng -->
                                    <a href="news/{{$tintuc['id']}}/{{$tintuc['TieuDeKhongDau']}}.html">
                                        <h4>
                                            <span class="glyphicon glyphicon-list-alt"></span>
                                            {{$tintuc['TieuDe']}}
                                        </h4>
                                    </a>
                                @endforeach
                            </div>

                            <div class="break"></div>
                        </div>
                        <!-- end item -->
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- end Page Content -->
@endsection
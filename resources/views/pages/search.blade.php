@extends('layout.index')

@section('content')
<!-- Page Content -->

<style>
mark { 
  background-color: yellow;
  color: black;
}
</style>

<div class="container">
    <div class="row">

        @include('layout.menu')

        <?php
            function changeColor($str,$key)
            // str: đổi màu từ khóa trong đoạn văn bản ( Tiêu đề, tóm tắt), key: từ khóa tìm kiếm
            {
                return str_ireplace($key,"<mark>$key</mark>",$str); // $key -> chuyển màu -> chuyển sang nội dung $str
            }
        ?>

        <div class="col-md-9 ">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color:#337AB7; color:white;">
                    <h4><b>Search : {{$key}} </b></h4>
                </div>

                @foreach($news as $ns)
                <div class="row-item row">
                    <div class="col-md-3">
                        <a href="news/{{$ns->id}}/{{$ns->TieuDeKhongDau}}.html">
                            <br>
                            <img width="200px" height="200px" class="img-responsive" src="upload/tintuc/{{$ns->Hinh}}"
                                alt="">
                        </a>
                    </div>

                    <div class="col-md-9">
                        <h3>{!! changeColor($ns->TieuDe,$key) !!}</h3>
                        <p>{!! changeColor($ns->TomTat,$key) !!}</p>
                        <a class="btn btn-primary" href="news/{{$ns->id}}/{{$ns->TieuDeKhongDau}}.html">More <span
                                class="glyphicon glyphicon-chevron-right"></span></a>
                    </div>
                    <div class="break"></div>
                </div>
                @endforeach

                <div style="text-align: center;">
                    {!! $news->appends(['key' =>$key])->links()!!}
                </div>              



            </div>
        </div>

    </div>

</div>
<!-- end Page Content -->
@endsection
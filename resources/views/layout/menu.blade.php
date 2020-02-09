<div class="col-md-3 ">
    <ul class="list-group" id="menu">
        <li href="#" class="list-group-item menu1 active">
            Menu
        </li>

        @foreach($theloai as $tl)
            @if( count($tl->loaitin) > 0 ) 
                <!-- Xem thể loại có loại tin hay không ? -->
                <li href="#" class="list-group-item menu1">
                    {{$tl->Ten}}
                </li>
                <ul>
                    @foreach($tl->loaitin as $lt) 
                        <!-- Từ thể loại truy cập bảng loại tin thông qua model -->
                        <li class="list-group-item">
                            <a href="typeOfnews/{{$lt->id}}/{{$lt->TenKhongDau}}.html">{{$lt->Ten}}</a>
                        </li>
                    @endforeach
                </ul>
            @endif
        @endforeach

    </ul>
</div>
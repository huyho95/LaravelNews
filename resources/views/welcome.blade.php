@extends('layout.index')

<div style="margin-left: 100px">
    @include('layout.menu')
</div>

@section('content')
<div style="margin-left: 460px">
    <video width="600" height="420" controls>
        <source src="upload/video/DaNang.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
</div>

@endsection
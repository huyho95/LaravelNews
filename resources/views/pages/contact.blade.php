@extends('layout.index')

@section('content')
<!-- Page Content -->
<div class="container">

    <!-- slider -->
    
    <!-- end slide -->

    <div class="space20"></div>


    <div class="row main-left">
        @include('layout.menu')

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color:#337AB7; color:white;">
                    <h2 style="margin-top:0px; margin-bottom:0px;">Contact</h2>
                </div>

                <div class="panel-body">
                    <!-- item -->
                    <h3><span class="glyphicon glyphicon-align-left"></span> Contact Information</h3>

                    <div class="break"></div>
                    <h4><span class="glyphicon glyphicon-home "></span> Address : </h4>
                    <b>K315/1 Hoang Dieu Street, Binh Thuan Ward, Hai Chau District, Da Nang Cty </b>

                    <h4><span class="glyphicon glyphicon-envelope"></span> Email : </h4>
                    <b>huyho95@gmail.com </b>

                    <h4><span class="glyphicon glyphicon-phone-alt"></span> Phone : </h4>
                    <b>(+84) 905108812 </b>



                    <br><br>
                    <h3><span class="glyphicon glyphicon-globe"></span> Map</h3>
                    <div class="break"></div><br>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3834.1555859078776!2d108.21480751485834!3d16.057414088888248!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314219c975750bb9%3A0x51f80680253660da!2zMzE1IEhvw6BuZyBEaeG7h3UsIELDrG5oIEhpw6puLCBI4bqjaSBDaMOidSwgxJDDoCBO4bq1bmcgNTUwMDAw!5e0!3m2!1svi!2s!4v1580223434208!5m2!1svi!2s" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- end Page Content -->
@endsection
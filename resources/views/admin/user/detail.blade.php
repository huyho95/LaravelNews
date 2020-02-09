@extends('admin.layout.index')

@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">NguoiDung
                    <small>List</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th class="text-center">Name</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Position</th>
                    </tr>
                </thead>
                <tbody>
                    @if(Auth::check())
                    <tr class="odd gradeX" align="center">
                        <td>{{Auth::user()->name}}</td>
                        <td>{{Auth::user()->email}}</td>
                        <td>
                            @if(Auth::user()->quyen == 1)
                                <li class="text-center">{{"Admin"}}</li>
                            @elseif (Auth::user()->quyen == 0)
                                <li class="text-center">({{"User"}})</li>
                            @endif
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>

@endsection
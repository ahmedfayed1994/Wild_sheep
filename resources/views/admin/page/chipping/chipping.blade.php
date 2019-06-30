


@extends('admin.layout')

@section('content')

    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default" style="margin-top: 50px">
                <div class="panel-heading">
                    جدول طرق الذبح
                    <a href="add/slughter" class="btn btn-info" style="float: right;margin-top: -7px">إضافة منتج</a>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>الإسم</th>
                            <th>الإعدادات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($slughters as $slughter)


                            <tr>
                                <td>{{$slughter->id}}</td>
                                <td>{{$slughter->slughter}}</td>
                                <td width="150px">
                                    <a href="delete/slughter.{{$slughter->id}}" class="btn btn-danger">Delete</a>
                                    <a href="edit/slughter.{{$slughter->id}}" class="btn btn-success">Edit</a>

                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>

                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>



@endsection

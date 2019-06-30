


@extends('admin.layout')

@section('content')

    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default" style="margin-top: 50px">
                <div class="panel-heading">
                    جدول الأوزان
                    <a href="add/weight" class="btn btn-info" style="float: right;margin-top: -7px">إضافة منتج</a>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>الإسم</th>
                            <th>الوزن</th>
                            <th>السعر </th>
                            <th>الإعدادات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($weights as $weight)


                            <tr>
                                <td>{{$weight->id}}</td>
                                <td>{{$weight->product()->first()->name}}</td>
                                <td>{{$weight->name}}</td>
                                <td>{{$weight->price}}</td>
                                <td width="150px">
                                    <a href="delete/weight/{{$weight->id}}" class="btn btn-danger">Delete</a>
                                    <a href="edit/weight.{{$weight->id}}" class="btn btn-success">Edit</a>

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

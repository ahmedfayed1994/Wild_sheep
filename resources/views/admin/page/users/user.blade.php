


@extends('admin.layout')

@section('content')

    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default" style="margin-top: 50px">
                <div class="panel-heading">
                    جدول المستخدمين
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>الاسٍم الاول </th>
                            <th>الإسم الاخير </th>
                            <th>رقم التليفون </th>
                            <th>الصوره </th>
                            <th>الإعدادات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->first_name}}</td>
                                <td>{{$user->last_name}}</td>
                                <td>{{$user->phone}}</td>
                                <td><img style="width: 50px;margin:10px;border: 1px solid #3d4852" src="{{url('/upload/'.$user->image)}}"></td>
                                <td width="150px">
                                    <a href="delete/user/{{$user->id}}" class="btn btn-danger">Delete</a>
                                    <a href="edit/user.{{$user->id}}" class="btn btn-success">Edit</a>

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

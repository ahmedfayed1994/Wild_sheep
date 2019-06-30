
@extends('admin.layout')

@section('content')

    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default" style="margin-top: 50px">
                <div class="panel-heading">
                    جدول نبذه عنا
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>لوجو</th>
                            <th> الاسم </th>
                            <th>المحتوى </th>

                            <th>الإعدادات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($abouts as $about)


                            <tr>
                                <td>{{$about->id}}</td>
                                <td><img style="width: 50px;margin:10px;border: 1px solid #3d4852" src="{{url('/upload/'.$about->logo)}}"></td>
                                <td>{{$about->title}}</td>
                                <td>{{$about->desc}}</td>
                                <td width="150px">
                                    <a href="edit/about.{{$about->id}}" class="btn btn-success">Edit</a>

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

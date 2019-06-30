


@extends('admin.layout')

@section('content')

    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default" style="margin-top: 50px">
                <div class="panel-heading">
                    جدول المنتجات
                    <a href="add/product" class="btn btn-info" style="float: right;margin-top: -7px">إضافة منتج</a>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>الصوره</th>
                            <th>الإسم </th>
                            <th>الإعدادات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)


                            <tr>
                                <td>{{$product->id}}</td>
                                <td><img style="width: 50px;margin:10px;border: 1px solid #3d4852" src="{{url('/upload/'.$product->image)}}"></td>
                                <td>{{$product->name}}</td>
                                <td width="150px">
                                    <a href="delete/product/{{$product->id}}" class="btn btn-danger">Delete</a>
                                    <a href="edit/product.{{$product->id}}" class="btn btn-success">Edit</a>

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

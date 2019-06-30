


@extends('admin.layout')

@section('content')

    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default" style="margin-top: 50px">
                <div class="panel-heading">
                    جدول البنك
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>الإسم</th>
                            <th>اسم الحساب</th>
                            <th>رقم الإيبان</th>
                            <th>رقم الحساب</th>
                            <th>صوره</th>
                            <th>الإعدادات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($banks as $bank)


                            <tr>
                                <td>{{$bank->id}}</td>
                                <td>{{$bank->name_bank}}</td>
                                <td>{{$bank->name_account}}</td>
                                <td>{{$bank->iban_number}}</td>
                                <td>{{$bank->account_number}}</td>
                                <td><img style="width: 50px;margin:10px;border: 1px solid #3d4852" src="{{url('/upload/'.$bank->image)}}"></td>
                                <td width="150px">
                                    <a href="edit/bank.{{$bank->id}}" class="btn btn-success">Edit</a>

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

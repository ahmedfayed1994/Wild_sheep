
@extends('admin.layout')

@section('content')

    <!-- /.row -->
    <div class="row">
        <form action="/update/bank/{{$edit->id}}"method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="_method" value="put">
            <div class="col-lg-12" style="margin-top: 20px">

                <div class="form-group col-lg-8">
                    <label for="formGroupExampleInput">الصوره</label>
                    <img style="width: 200px;margin:20px;border: 1px solid #3d4852" src="{{url('/upload/'.$edit->image)}}">
                    <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                </div>

                <div class="form-group col-lg-8">
                    <label for="formGroupExampleInput">اسم البنك</label>
                    <input type="text" class="form-control" name="name_bank" value="{{$edit->name_bank}}" id="inputText">
                </div>

                <div class="form-group col-lg-8">
                    <label for="formGroupExampleInput">اسم الاكونت</label>
                    <input type="text" class="form-control" name="name_account" value="{{$edit->name_account}}" id="inputText">
                </div>

                <div class="form-group col-lg-8">
                    <label for="formGroupExampleInput">رقم الإيبان</label>
                    <input type="text" class="form-control" name="iban_number" value="{{$edit->iban_number}}" id="inputText">
                </div>

                <div class="form-group col-lg-8">
                    <label for="formGroupExampleInput">رقم الحساب</label>
                    <input type="text" class="form-control" name="account_number" value="{{$edit->account_number}}" id="inputText">

                </div>

            </div>
            <button type="submit" class="btn btn-primary ">Submit</button>
        </form>

        <!-- /.col-lg-12 -->
    </div>



@endsection

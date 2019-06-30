
@extends('admin.layout')

@section('content')

    <!-- /.row -->
    <div class="row">
        <form action="/update/user/{{$editUser->id}}"method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="_method" value="put">
            <div class="col-lg-12" style="margin-top: 20px">

                <div class="form-group col-lg-8">
                    <label for="formGroupExampleInput">الصوره</label>
                    <img style="width: 200px;margin:20px;border: 1px solid #3d4852" src="{{url('/upload/'.$editUser->image)}}">
                    <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                </div>

                <div class="form-group col-lg-8">
                    <label for="formGroupExampleInput">الإسم</label>
                    <input type="text" class="form-control" name="first_name" value="{{$editUser->first_name}}" id="inputText">
                </div>

                <div class="form-group col-lg-8">
                    <label for="formGroupExampleInput">الإسم</label>
                    <input type="text" class="form-control" name="last_name" value="{{$editUser->last_name}}" id="inputText">
                </div>

                <div class="form-group col-lg-8">
                    <label for="formGroupExampleInput">رقم التليفون</label>
                    <input type="text" class="form-control" name="phone" value="{{$editUser->phone}}" id="inputText">
                </div>

                <div class="form-group col-lg-8">
                    <label for="formGroupExampleInput">الرقم السرى</label>
                    <input type="text" class="form-control" name="password" placeholder="********" id="inputText">
                </div>

            </div>
            <button type="submit" class="btn btn-primary ">Submit</button>
        </form>

        <!-- /.col-lg-12 -->
    </div>



@endsection

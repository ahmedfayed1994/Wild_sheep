
@extends('admin.layout')

@section('content')

    <!-- /.row -->
    <div class="row">
        <form action="/update/about/{{$edit->id}}"method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="_method" value="put">
            <div class="col-lg-12" style="margin-top: 20px">

                <div class="form-group col-lg-8">
                    <label for="formGroupExampleInput">لوجو</label>
                    <img style="width: 200px;margin:20px;border: 1px solid #3d4852" src="{{url('/upload/'.$edit->logo)}}">
                    <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                </div>

                <div class="form-group col-lg-8">
                    <label for="formGroupExampleInput">اسم </label>
                    <input type="text" class="form-control" name="title" value="{{$edit->title}}" id="inputText">
                </div>

                <div class="form-group col-lg-8">
                    <label for="formGroupExampleInput">التفاصيل</label>
                    <input type="text" class="form-control" name="desc" value="{{$edit->desc}}" id="inputText">
                </div>

            </div>
            <button type="submit" class="btn btn-primary ">Submit</button>
        </form>

        <!-- /.col-lg-12 -->
    </div>



@endsection

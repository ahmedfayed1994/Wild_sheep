
@extends('admin.layout')

@section('content')

    <!-- /.row -->
    <div class="row">
        <form action="/update/packing.{{$packing->id}}"method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="_method" value="put">
            <div class="col-lg-12" style="margin-top: 20px">

                <div class="form-group col-lg-8">
                    <label for="formGroupExampleInput">نوع التغليف</label>
                    <input type="text" class="form-control" name="packing" id="inputText" value="{{$packing->packing}}">
                </div>

                <div class="form-group col-lg-8">
                    <label for="formGroupExampleInput">السعر</label>
                    <input type="text" class="form-control" name="price" id="inputText" value="{{$packing->price}}">
                </div>

            </div>
            <button type="submit" class="btn btn-primary ">Submit</button>

        </form>

        <!-- /.col-lg-12 -->
    </div>



@endsection


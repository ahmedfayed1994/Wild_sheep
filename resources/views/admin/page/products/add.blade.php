
@extends('admin.layout')

@section('content')

    <!-- /.row -->
    <div class="row">
        <form action="/save/product"method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="_method" value="put">
            <div class="col-lg-12" style="margin-top: 20px">
                <div class="form-group col-lg-8">
                    <label for="formGroupExampleInput">الصوره</label>
                    <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                </div>

                <div class="form-group col-lg-8">
                    <label for="formGroupExampleInput">الإسم</label>
                    <input type="text" class="form-control" name="name_prodact" id="inputText" placeholder="اسم المنتج">
                </div>

            </div>
            <button type="submit" class="btn btn-primary ">Submit</button>

        </form>

        <!-- /.col-lg-12 -->
    </div>



@endsection


{{--weight::find($id)->delete();--}}
{{--$channel = product::find($channel->id);--}}
{{--$channel->product_id = NULL;--}}
{{--$channel->save();--}}

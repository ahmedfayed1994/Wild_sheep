
@extends('admin.layout')

@section('content')

    <!-- /.row -->
    <div class="row">
        <form action="/save/slughter"method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="_method" value="put">
            <div class="col-lg-12" style="margin-top: 20px">

                <div class="form-group col-lg-8">
                    <label for="formGroupExampleInput">الإسم</label>
                    <input type="text" class="form-control" name="name" id="inputText" placeholder="طريقة الذبح">
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

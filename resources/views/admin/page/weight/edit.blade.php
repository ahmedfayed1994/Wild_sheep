
@extends('admin.layout')

@section('content')

    <!-- /.row -->
    <div class="row">
        <form action="/update/weight/{{$weight->id}}"method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="_method" value="put">
            <div class="col-lg-12" style="margin-top: 20px">

                <div class="form-group col-lg-8">
                    <label for="formGroupExampleInput">الوزن</label>
                    <input type="text" class="form-control" value="{{$weight->name}}" name="name_weight" id="inputText">
                </div>

                <div class="form-group col-lg-8">
                    <label for="formGroupExampleInput">السعر</label>
                    <input type="text" class="form-control"  value="{{$weight->price}}" name="price" id="inputText">
                </div>

                <div class="form-group col-lg-8">
                    <label for="formGroupExampleInput">المنتج</label>
                    <select name="product_id" class="form-control">
                        @foreach($products as $product)
                            <option value="{{$product->id}}">{{$product->name}}</option>
                        @endforeach
                    </select>
                </div>

            </div>
            <button type="submit" class="btn btn-primary ">Submit</button>
        </form>

        <!-- /.col-lg-12 -->
    </div>



@endsection

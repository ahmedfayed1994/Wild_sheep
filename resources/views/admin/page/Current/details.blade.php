
@extends('admin.layout')

@section('content')

    <!-- /.row -->
    <div class="row">

        <div class="card">
            <h5 class="card-header">تفاصيل الطلب</h5>
            <div class="card-body">
                <h4><strong> الإسم </strong>  {{$details->name}}</h4>
                <h4><strong> العنوان </strong> {{$details->address}}</h4>
                <h4><strong> رقم التليفون </strong> {{$details->phone}}</h4>
                <h4><strong> تاريخ الطلب </strong> {{$details->data}} / {{$details->time}}</h4>

                {{--{{dd($carts)}}--}}

                <h4><strong> نوع الذبيحه </strong> {{$carts->category()->first()->name}}</h4>
                <h4><strong> طريقة التقطيع </strong>
                    @if(empty($carts->slughter()->first()->slughter)) لايوجد @else {{$carts->slughter()->first()->slughter}} @endif

                </h4>
                <h4><strong> طريقة التغليف </strong>
                    @if(empty($carts->packing()->first()->packing)) لايوجد @else {{$carts->packing()->first()->packing}} @endif

                </h4>
                <h4><strong> الوزن </strong> {{$carts->weight()->first()->name}}</h4>
                <h4><strong> العدد </strong> {{$carts->count}}</h4>
                <h4><strong> السعر </strong> {{$carts->total}}</h4>
                <a href="/update/current/{{$details->id}}" class="btn btn-primary">الموافقة على الطلب</a>
            </div>
        </div>

    </div>



@endsection


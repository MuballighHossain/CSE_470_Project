@extends('admin.index')
@section('content')
<div class="m-3 mt-5">
    @include('inc.msg')
    <h4> Product List</h4>
    <hr>
    @if (count($products)>0)
    @foreach ($products as $product)
    <div class="card mb-5">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <img src="/storage/uploads/{{$product->image}}" class="img-fluid" alt="">
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-9">
                            <h5><strong>{{$product->name}}</strong></h5>
                        </div>
                        <div class="col-md-2">
                            <a href="/admin/product/{{$product->id}}/edit" class="btn btn-info btn-md mr-auto z-depth-0"
                                role="button">Edit</a>
                            {!!Form::open(['action'=>['productsController@destroy',$product->id],'method'=>'POST'])!!}
                            {{Form::hidden('_method','DELETE')}}
                            {{Form::submit('Delete',['Class'=> 'btn btn-danger btn-md z-depth-0'])}}
                            {!!Form::Close()!!}
                        </div>
                    </div>
                    <hr>
                    <p> <strong>Price: </strong><span
                            class="text-success">£{{number_format($product->price,2)}}</span>&nbsp; | &nbsp;
                        <strong>Size: </strong><span>{{$product->size}}ml</span>&nbsp; | &nbsp; <strong>Stock:
                        </strong><span>{{$product->stock}}&nbsp; | &nbsp; <strong>Category:
                            </strong><span>
                                @if ($product->cat ==0)
                                Uncategorized
                                @elseif($product->cat ==1)
                                Natural Beauty
                                @elseif($product->cat ==2)
                                Healthy Neutrition
                                @elseif($product->cat ==3)
                                Food Suppliments
                                @else
                                Accesories
                                @endif</span>
                    </p>
                    <p> <strong>Sub tag Line: </strong>{{$product->subtag}}</p>
                    {{-- <h6 class="text-info"><strong>Properties: </strong></h6>
                            {!!$product->properties!!}
                            <h6 class="text-info"><strong>Ingredients: </strong></h6>
                            {!!$product->ingredients!!}
                            <h6 class="text-info"><strong>Directions: </strong></h6>
                            {!!$product->direction!!} --}}
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @else
    <p>No product</p>
    @endif
</div>
@endsection
@extends('admin.skeleton')
@section('content')
<div class="m-3 mb-5">
    @include('inc.msg')
    <h4>Edit Product</h4>
    <hr>
    <!-- Material form contact -->
    <div class="card">



        <!--Card content-->
        <div class="card-body px-lg-5 pt-0">
            {!! Form::open(['action' => ['productsController@update',$product->id], 'method' => 'POST',
            'enctype'=>'multipart/form-data','files'=>true]) !!}
            <div class="form-group">
                <!-- Name -->
                <div class="md-form mt-3">
                    {{Form::label('name','Product Name')}}
                    {{Form::text('name',$product->name,['class'=> 'form-control',])}}
                </div>
                <div class="md-form mt-3 form-inline">
                    {{Form::label('price','Product Price')}}
                    {{Form::number('price',number_format($product->price,2),['class'=> 'form-control', 'min'=>'0.01', 'step' =>'.01'])}}
                    <p class="pl-5 pr-2">Stock: </p>
                    {{Form::select ('stock', ['Available' => 'Available', 'Not Available' => 'Not Available'], $product->stock
                    , ['class' =>'mdb-select'])}}
                    <p class="pl-5 pr-2">Size: </p>
                    {{Form::number('size',$product->size,['class'=> 'form-control', 'min'=>'0', 'step' =>'1'])}} <p
                        class="pl-2"> ml</p>
                </div>
                <div class="md-form mt-3 form-inline">
                    <p class="pr-2">Category: </p>
                    {{Form::select ('cat', ['0' => 'Select','1' => 'Natural Beauty', '2' => 'Healthy Neutrition', '3' => 'Food Suppliments', '4' => 'Accesories'], $product->stock , ['class' =>'mdb-select'])}}
                </div>
                <div class="md-form mt-3">
                    {{Form::label('subtag','Sub Tagline')}}
                    {{Form::text('subtag',$product->subtag,['class'=> 'form-control',])}}
                </div>
                    {{-- new slug --}}
                <div class="md-form mt-3">
                    {{Form::label('slug','url Slug - (product name with - in between)')}}
                    {{Form::text('slug',$product->slug,['class'=> 'form-control',])}}
                </div>
                    {{-- new slug --}}
                <div class="md-form mt-3">
                    <h5>Top section/Properties:</h5>
                    {{Form::textarea('properties',$product->properties,['class'=> 'form-control editor','rows'=>'1'])}}
                </div>
                <div class="md-form mt-3">
                    <h5>Middle section/Ingredients:</h5>
                    {{Form::textarea('ingredients',$product->ingredients,['class'=> 'form-control editor','rows'=>'1'])}}
                </div>
                <div class="md-form mt-3">
                    <h5>bottom section/Directions:</h5>
                    {{Form::textarea('direction',$product->direction,['class'=> 'form-control editor','rows'=>'1'])}}
                </div>
                <div class="md-form mt-3 form-inline">
                    <p class="pr-3">Product Image: </p>
                    {{Form::file('image', ['accept'=>'image/x-png,image/gif,image/jpeg'])}}

                    <div class="view overlay zoom">
                        <img src="/storage/uploads/{{$product->image}}" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
            {{Form::hidden('_method','PUT')}}
            {{Form::submit('Update Product',['class'=>'btn btn-info  btn-block z-depth-0 my-4 waves-effect'])}}
            {!! Form::close() !!}
        </div>

    </div>
    <!-- Material form contact -->
</div>

@endsection
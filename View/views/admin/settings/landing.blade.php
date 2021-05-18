@extends('admin.skeleton')
@section('content')
<div class="m-5">
    @include('inc.msg')
    <h4>Slider Images</h4>
    <hr>
    <div class="card mb-3">
        <div class="card-body">
            <table class="table table-hover table-responsive-sm text-center">
                <thead>
                    <tr>
                        <th scope="col"><strong>#</strong></th>
                        <th scope="col"><strong>Image</strong></th>
                        <th scope="col"><strong>Header</strong></th>
                        <th scope="col"><strong>Caption</strong></th>
                        <th scope="col"><strong>Action</strong></th>

                    </tr>
                </thead>
                <tbody>

                    @foreach ($sliders as $slider)
                    <tr>
                        <td>{{ $loop->iteration}}</td>
                        <td class="w-25">
                            <img src="/storage/uploads/{{$slider->image}}" class="img-fluid img-thumbnail"></td>
                        <td>{{$slider->header}}</td>
                        <td>{{$slider->caption}}</td>
                        <td><a href="{{route('sliderDelete', $slider->id)}}"
                                class="btn btn-sm z-depth-0 btn-danger">Remove</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <h4>Add Slider Image</h4>
    <hr>
    <div class="card mb-3">
        <div class="card-body">
            {!! Form::open(['action' => 'settingsController@slider', 'method' => 'POST',
            'enctype'=>'multipart/form-data']) !!}
            <div class="form-group">
                <div class="md-form mt-3">
                    {{Form::label('header','Image Header')}}
                    {{Form::text('header','',['class'=> 'form-control',])}}
                </div>
                <div class="md-form mt-3">
                    {{Form::label('caption','Image Caption')}}
                    {{Form::text('caption','',['class'=> 'form-control',])}}
                </div>
                <div class="md-form mt-3 form-inline">
                    <p class="pr-3">Slider Image: </p>
                    {{Form::file('image', ['accept'=>'image/x-png,image/gif,image/jpeg', 'placeholder'=>'image.jpg', 'required'])}}
                </div>
                <p class="note note-secondary"><strong>Max image size:</strong> 2.00mb (1920x700).</p>
                {{Form::submit('Add Slider',['class'=>'btn btn-info  btn-block z-depth-0 my-4 waves-effect'])}}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <h4>Landing Page Header/Notification:</h4>
    <hr>
    <div class="card mb-3">
        <div class="card-body">
            @foreach ($headerdata as $header)
            <div class="p-3 m-2 bg">
                <h5 class="text-center">{{$header->head}}</h5>
            </div>
            <h5>Change:</h5>
            {!! Form::open(['action' => 'settingsController@header', 'method' => 'POST',]) !!}
            <div class="form-group">
                <div class="md-form mt-3">
                    {{Form::text('header',$header->head,['class'=> 'form-control',])}}
                    {{Form::submit('Update Header',['class'=>'btn btn-info  btn-block z-depth-0 my-4 waves-effect'])}}
                    {!! Form::close() !!}
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <h4>Featured Product</h4>
    <hr>
    <div class="card m-3">
        <div class="card-body">
            <div id="Featured" class="mb-3">
                <h5>Currently Featured</h5>
                <div class="row mt-3">
                    <div class="col-md-3">
                        <img src="/storage/uploads/{{$featureProd[0]->image}}" class="img-fluid" alt="">
                    </div>
                    <div class="col-md-9">
                        <p>{{$featureProd[0]->name}}</p>
                        <p><strong>Caption:</strong></p>
                        <p>{{$featureCaption[0]}}</p>
                    </div>
                </div>
            </div>

            <hr>
            <form action="{{route('featureProduct')}}" method="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="md-form mt-3 form-inline">
                    <p>Select a Product to be featured: </p><select class="mdb-select md-form ml-3" name="product"
                        required>
                        <option value="" disabled selected>Choose Product</option>
                        @foreach ($products as $product)
                        <option value="{{$product->id}}">{{$product->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="md-form mt-3">
                    <textarea id="caption" class="form-control md-textarea" name="caption" rows="3" required></textarea>
                    <label for="caption">Caption</label>
                </div>
                <button class="btn btn-info btn-md z-depth-0" type="submit">Add Product</button>
            </form>
        </div>
    </div>
</div>
@endsection
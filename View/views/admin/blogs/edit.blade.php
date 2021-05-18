@extends('admin.skeleton')
@section('content')
<div class="m-3 mb-5">
    @include('inc.msg')
    <h4>Edit Blog</h4>
    <hr>
    <div class="card">
        <!--Card content-->
        <div class="card-body px-lg-5 pt-0">
            {!! Form::open(['action' => ['blogsController@update',$blog->id], 'method' => 'POST', 'enctype'=>'multipart/form-data','files'=>true]) !!}
            <div class="form-group">
                  <!-- Name -->
                  <div class="md-form mt-3">
                      {{Form::label('title','Title')}}
                      {{Form::text('title',$blog->title,['class'=> 'form-control',])}}
                </div>
            <div class="md-form mt-3">
                {{Form::label('category','Category')}}
                {{Form::text('category',$blog->category,['class'=> 'form-control',])}}
            </div>
            <div class="md-form mt-3">
                <h5>Body:</h5>
                {{Form::textarea('body',$blog->body,['class'=> 'form-control editor','rows'=>'1'])}}
            </div>
            <div class="md-form mt-3 form-inline">
                <div class="md-form mt-3 form-inline">
                    <p class="pr-3">Blog Image: </p>
                    {{Form::file('image', ['accept'=>'image/x-png,image/gif,image/jpeg'])}}
                    
                    <div class="view overlay zoom">
                    <img src="/storage/uploads/{{$blog->image}}" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
            {{Form::hidden('_method','PUT')}}
            {{Form::submit('Update Product',['class'=>'btn btn-info  btn-block z-depth-0 my-4 waves-effect'])}}
            {!! Form::close() !!}          
        </div>
    
    </div>
@endsection
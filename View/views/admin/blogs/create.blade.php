@extends('admin.skeleton')
@section('content')
<div class="m-3 mb-5">
    @include('inc.msg')
    <h4>Post New Blog</h4>
    <hr>
    <div class="card">
        <!--Card content-->
        <div class="card-body px-lg-5 pt-0">
            {!! Form::open(['action' => 'blogsController@store', 'method' => 'POST', 'enctype'=>'multipart/form-data']) !!}
            <div class="form-group">
                  <!-- Name -->
                  <div class="md-form mt-3">
                      {{Form::label('title','Title')}}
                      {{Form::text('title','',['class'=> 'form-control',])}}
                </div>
            <div class="md-form mt-3">
                {{Form::label('category','Category')}}
                {{Form::text('category','',['class'=> 'form-control',])}}
            </div>
            <div class="md-form mt-3">
                <h5>Body:</h5>
                {{Form::textarea('body','',['class'=> 'form-control editor','rows'=>'1'])}}
            </div>
            <div class="md-form mt-3 form-inline">
                <p class="pr-3">Blog Image: </p>
                {{Form::file('image', ['accept'=>'image/x-png,image/gif,image/jpeg', 'placeholder'=>'image.jpg'])}}
            </div>
            <p class="note note-secondary"><strong>Creating New Blog:</strong> Please fill out the form properly in the correct fields.
                <strong>Max image size:</strong>  2.00mb (1920x700) </p>
            {{Form::submit('Post',['class'=>'btn btn-info  btn-block z-depth-0 my-4 waves-effect'])}}
            {!! Form::close() !!}          
        </div>
    
    </div>
@endsection
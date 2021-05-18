@extends('admin.skeleton')
@section('content')
<div class="m-5">
<h5>Edit Region</h5>
<hr>
        <div class="card col-md-5">
            <div class="card-body">
                @include('inc.msg')
               <h5> Add Country/Region</h5>
               <hr>
        {!! Form::open(['action' => ['countriesController@update',$country->id], 'method' => 'POST','files'=>true]) !!}
        <div class="form-group">
              <!-- Name -->
              <div class="md-form mt-3">
                  {{Form::label('name','Country')}}
                  {{Form::text('name',$country->name,['class'=> 'form-control',])}}
            </div>
            <div class="md-form mt-3">
                {{Form::label('charge','Delivery Charge')}}
                {{Form::number('charge',$country->charge,['class'=> 'form-control', 'min'=>'0.01', 'step' =>'.01'])}}
            </div>
            {{Form::hidden('_method','PUT')}}
            {{Form::submit('Update',['class'=>'btn btn-info  btn-block z-depth-0 my-4 waves-effect'])}}
            {!! Form::close() !!}
        </div>
        </div>
    </div>
</div>
@endsection
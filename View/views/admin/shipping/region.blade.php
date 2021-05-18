@extends('admin.skeleton')
@section('content')
<div class="m-5">
  @include('inc.msg')
  <h4>Country List</h4>
  <hr>
<div class="card">
    <div class="card-body">
        <div class='table-responsive-md'>
        <table id="dtMaterialDesignExample" class="table table-hover" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th class="th-sm"><strong>#</strong></th>
                <th class="th-sm"><strong>Name</strong></th>
                <th class="th-sm"><strong>Charge</strong></th>
                <th class="th-sm"><strong>Action</strong></th>
              </tr>
            </thead>
              <tbody>
                @if (count($countries)>0)
                @foreach ($countries as $country)
                <tr>
                <td>{{$country->id}}</td>
                <td>{{$country->name}}</td>
                <td>£{{number_format($country->charge,2)}}</td>
                <td> 
                  <a href="/admin/region/{{$country->id}}/edit" class="btn btn-info px-2 py-1 ml-0 z-depth-0" type="button" role="button">Edit</a> 
                  {!!Form::open(['action'=>['countriesController@destroy',$country->id],'method'=>'POST'])!!}
                  {{Form::hidden('_method','DELETE')}}
                  {{Form::button('Delete',['type'=>'submit', 'Class'=> 'btn btn-danger px-2 py-1 ml-0 z-depth-0'])}}
                  {!!Form::Close()!!}
                </td>
              </tr>
              @endforeach
              </tbody>
        </table>
        {{-- {{$countries->links()}} --}}
        </div>
    </div>
</div>
</div>
@else
<p>Empty</p> 
@endif

@endsection
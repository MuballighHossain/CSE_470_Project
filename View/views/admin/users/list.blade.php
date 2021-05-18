@extends('admin.skeleton')
@section('content')
<div class="m-5">
    @include('inc.msg')
  <h4>User List</h4>
  <hr>
  <div class="card">
      <div class="card-body">
        <div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-info z-depth-0" data-toggle="modal" data-target="#centralModalSm">
  Send Newsletter
</button>

<!-- Central Modal Small -->
<div class="modal fade" id="centralModalSm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Change class .modal-sm to change the size of the modal -->
  <div class="modal-dialog modal-lg " role="document">

    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100" id="myModalLabel">Send Newsletter/Offers</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {!! Form::open(['action' => 'usersController@send', 'method' => 'POST']) !!}
          <div class="md-form mt-3">
            {{Form::label('subject','Subject')}}
            {{Form::text('subject','',['class'=> 'form-control', 'required'])}}
        </div>
        <div class="md-form mt-3">
          {{Form::label('title','Title')}}
          {{Form::text('title','',['class'=> 'form-control', 'required'])}}
      </div>
          <div class="md-form mt-3">
            <h5>Body:</h5>
            {{Form::textarea('body','',['class'=> 'form-control editor','rows'=>'1'])}}
        </div>
        
        {{Form::submit('Send',['class'=>' btn btn-block btn-info z-depth-0 my-4 waves-effect'])}}
            {!! Form::close() !!}
      </div>
      
    </div>
  </div>
</div>
<!-- Central Modal Small -->

        </div>
        @if (count($users)>0)
        <div class="table-responsive-md">
            <table id="dtMaterialDesignExample" class="table table-hover" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th class="th-sm"><strong>#</strong></th>
                    <th class="th-sm"><strong>Name</strong></th>
                    <th class="th-sm"><strong>Email</strong></th>
                    <th class="th-sm"><strong>Action</strong></th>
                  </tr>
                </thead>
                  <tbody>
                   
                    @foreach ($users as $user)
                    <tr>
                    <td>{{ $loop->iteration}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td> 
                      {!!Form::open(['action'=>['usersController@destroy',$user->id],'method'=>'POST'])!!}
                      {{Form::hidden('_method','DELETE')}}
                      {{Form::button('Delete',['type'=>'submit', 'Class'=> 'btn btn-danger px-2 py-1 ml-0 z-depth-0'])}}
                      {!!Form::Close()!!}
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
            </table>
        </div>
        <p class="note note-danger"><strong>Deleteing Users:</strong> If you delete a User, it will be removed from database and wont be able to recover.</p>
        @else
        <p>No user Registerd</p>
        @endif
      </div>
  </div>
   
</div>
@endsection
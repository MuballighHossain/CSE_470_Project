@extends('admin.skeleton')
@section('content')
<div class="m-5">
  @include('inc.msg')
  <h4>User Messages</h4>
  <hr>
  @include('inc.msg')
  <div class="card">
    <div class="card-body">
      @if (count($usermsg)>0)
      <div class="table-responsive-md">
        <table id="dtMaterialDesignExample" class="table table-hover" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th class="th-sm"><strong>#</strong></th>
              <th class="th-sm"><strong>Name</strong></th>
              <th class="th-sm"><strong>Email</strong></th>
              <th class="th-sm"><strong>Message</strong></th>
              <th class="th-sm">Action</th>
            </tr>
          </thead>
          <tbody>

            @foreach ($usermsg as $user)
            <tr>
              <td>{{ $loop->iteration}}</td>
              <td>{{$user->name}}</td>
              <td>{{$user->email}}</td>
              <td>
                {{$user->msg}}
              </td>
              <td>
                <a href="{{route('user.msg.delete', $user->id)}}" class="btn btn-danger z-depth-0">Delete</a>

              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      @else
      <p>No user Messages</p>
      @endif
    </div>
  </div>

</div>
@endsection
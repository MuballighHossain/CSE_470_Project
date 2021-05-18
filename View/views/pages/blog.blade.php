@extends('layouts.app')
@section('content')
<div class="container">
      <a class="btn btn-sm btn-info z-depth-0" href="{{route('lifestyle')}}"><i
                  class="fas fa-angle-double-left"></i></a>
      <div>
            <div class="col-md-12 mb-3 p-0">
                  <img class="image w-100" src="/storage/uploads/{{$blog->image}}" height="400px;" width="100%">
            </div>
            <div class="content p-0">
                  <h5>{{$blog->title}}</h5>
                  <p class="d-inline text-muted mb-3">{{$blog->created_at->format('D,d/m/Y')}}</p>
                  {!!$blog->body!!}
            </div>
      </div>
</div>
@endsection
@extends('layouts.app')
@section('content')
<div class="container m-5 mx-auto">
    @include('inc.msg')
    <div style="height:700px">
    <a class="btn btn-info z-depth-0"href="{{route('home')}}" type="button" role="button">Go to Home</a>
</div>
</div>
@endsection
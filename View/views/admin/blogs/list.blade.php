@extends('admin.skeleton')
@section('content')
<div class="m-3 mt-5">
    @include('inc.msg')
    <h4> Blog List</h4>
    <hr>
    @if (count($blogs)>0)
    @foreach ($blogs as $blog)
        <div class="card mb-5">
            <div class="card-body">
                <div class="row">
                <div class="col-md-3">
                    <img src="/storage/uploads/{{$blog->image}}" class="img-fluid" alt="">
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-9">
                            <h5><strong>{{$blog->title}}</strong></h5>
                            <p class="d-inline">Posted at:</p>
                            <p class="d-inline text-muted">{{$blog->created_at->format('D,d/m/Y')}}</p>
                        </div>
                        <div class="col-md-2">
                            <a href="/admin/blogs/{{$blog->id}}/edit" class="btn btn-info btn-md mr-auto z-depth-0" role="button">Edit</a>
                            {!!Form::open(['action'=>['blogsController@destroy',$blog->id],'method'=>'POST'])!!}
                            {{Form::hidden('_method','DELETE')}}
                            {{Form::submit('Delete',['Class'=> 'btn btn-danger btn-md z-depth-0'])}}
                            {!!Form::Close()!!}
                        </div>
                    </div>
                    <div>
                        <div class="mypara">{!!$blog->body!!}</div>
                    </div>
                </div>  
                </div> 
            </div>
        </div>
    @endforeach
    {{$blogs->links()}}
    <p class="note note-danger"><strong>Deleteing Blog:</strong> If you delete a blog, it will be removed from database and wont be able to recover.</p>
@else
  <p>No Posts</p> 
@endif
</div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="prodbg container-fluid">
  <div class="row">
    <div class="col-md-8">
      <div class="container">
        <!--Section: Blog v.3-->
        <section class="section extra-margins pb-3 text-center text-lg-left wow fadeIn" data-wow-delay="0.3s">
          <!--Section heading-->
          <h2 class="font-weight-bold text-center h1 my-5">Blog posts</h2>
          <!--Grid row-->
          @if (count($blogs)>0)
          @foreach ($blogs as $blog)
          <div class="card mb-3" data-aos="fade-up">
            <div class="card-body">
              <div class="row mt-3">

                <!--Grid column-->
                <div class="col-lg-4 mb-4">
                  <!--Featured image-->
                  <div style="">
                    <img src="/storage/uploads/{{$blog->image}}" class="img-fluid" alt="blog image">
                  </div>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-7 mb-4">
                  <!--Excerpt-->
                  <h4 class="mb-4"><strong>{{$blog->title}}</strong></h4>
                  <a href="" class="text-info">
                    <h6 class="pb-1"></i><strong>{{$blog->category}}</strong></h6>
                  </a>
                  <div class="mypara">{!!$blog->body!!}</div>
                  <a class="btn btn-info btn-md z-depth-0" href="{{route('blog', $blog->id)}}">Read more</a>
                </div>
                <!--Grid column-->

              </div>
            </div>
          </div>
          <!--Grid row-->
          <hr class="mb-5">
          @endforeach
          {{$blogs->links()}}
        </section>
        @else
        <a class="btn btn-sm btn-info z-depth-0" href="{{route('lifestyle')}}"><i
            class="fas fa-angle-double-left"></i></a>
        <div class="alert alert-danger" role="alert">
          No blog Found!
        </div>
        @endif
      </div>
    </div>
    <div class="col-md-4">
      <section class="section m-4 bg-white" data-aos="fade-up" data-aos-delay="50">
        <form class="form-inline d-flex justify-content-center md-form form-sm active-cyan-4 mt-2"
          action="{{route('search')}}">
          <input class="form-control form-control-sm mr-3 w-75" type="text" name="query" id="query"
            placeholder="Search blog" value="{{request()->input('query')}}" aria-label="Search">
          <button type="submit" class="btn btn-info btn-sm"><i class="fa fa-search text-white"
              aria-hidden="true"></i></button>
        </form>
      </section>
      <section class="section p-3 m-5 bg-white" data-aos="fade-up" data-aos-delay="100">
        <h5>Categories</h5>
        <hr>
        <?php
            $categs = DB::table('blogs')->groupBy('category')->get();
            ?>
        @foreach ($categs as $cat)
        <a href="{{route('categ', $cat->category)}}" class="badge badge-info z-depth-0" style="font-size: small;">
          {{$cat->category}} </a>
        @endforeach
      </section>
    </div>
  </div>
</div>

@endsection
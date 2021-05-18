@extends('layouts.app')
@section('content')
<div class="prodbg">
  <div class="container">
    @include('inc.msg')
    <div class="row" style="padding-top: 4em; padding-bottom: 4em;">
      <div class="col-md-6">
        <img class="image w-100" src="/storage/uploads/{{$product->image}}" data-aos="fade-up">
      </div>
      <div class="col-md-6">
        <div class="card" data-aos="fade-up" data-aos-delay="100">
          <div class="card-body">
            <h2>{{$product->name}}</h2>
            @if ($product->id ==23)
            <p>This product is available for wholesale only, please contact us at <strong><a class="black-text"
                  href="mailto:info@savvyremedis.com">info@savvyremedies.com</a></strong> for
              for a quote</p>
            @else
            <h1 class="float-left" style="color: #51b848;">£{{number_format($product->price,2)}}</h1><br>
            @endif
            <div class="float-right">
              @for ($i = 0; $i < ($product->rate)-0.5; $i++)
                <span class="fa fa-star checked"></span>
                @endfor
                @for ($i = 0; $i < 5-($product->rate); $i++)
                  <span class="far fa-star holo"></span>
                  @endfor
            </div>
            <br>
            <p class="text-center" style="padding-top: 10px;">{{$product->subtag}}</p>
            <div class="p-3 text-center">
              <img class="img-fluid" src="/img/icon.png" style="width: 50%;">
            </div>
            <form action="{{url('add')}}" method="POST">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              <input type="hidden" name="id" value="{{$product->id}}">
              <input type="hidden" name="name" value="{{$product->name}}">
              <input type="hidden" name="price" value="{{$product->price}}">
              <div class="md-form text-center">
                <h5>Choose Quantity</h5>
                <input type="number" name="qnty" min="1" required>
              </div>
              @if ($product->id ==23)
              <button class="btn btn-info w-100" disabled type="submit">Add to Cart</button>
              @else
              <button class="btn btn-info w-100" type="submit">Add to Cart</button>
              @endif

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="toprev prodbg px-5 pb-5">

  <div class="container">
    {!!$product->properties!!}

    {!!$product->ingredients!!}

    {!!$product->direction!!}
  </div>
  {{-- <div class="row p-4" style="width: 100%; margin: 0px;">
    <div class="col-md-4">

      <div class="card card-cascade wider" data-aos="fade-up" data-aos-delay="50">
        <div class="view z-depth-0 view-cascade overlay">
          <img class="card-img-top" src="/img/hbnft.jpg" alt="Card image cap">
          <a href="#!">
            <div class="mask rgba-white-slight"></div>
          </a>
        </div>

        <div class="card-body card-body-cascade text-center">
          <h4 class="card-title"><strong><i class="fa fa-heartbeat" aria-hidden="true"></i></strong></h4>
          <h5 class=" pb-2"><strong>Health Benefits</strong></h5>
          <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis totam vel quidem alias commodi, reprehenderit repudiandae veniam vero aspernatur maxime, eaque maiores incidunt, explicabo excepturi sed expedita? Ipsa, qui provident.</p>
        </div>

      </div>

    </div>
    <div class="col-md-4">
      <div class="card card-cascade wider" data-aos="fade-up" data-aos-delay="100">
        <div class="view z-depth-0 view-cascade overlay">
          <img class="card-img-top" src="/img/quality.jpg" alt="Card image cap">
          <a href="#!">
            <div class="mask rgba-white-slight"></div>
          </a>
        </div>

        <div class="card-body card-body-cascade text-center">
          <h4 class="card-title"><strong><i class="fa fa-handshake" aria-hidden="true"></i>
            </strong></h4>
          <h5 class=" pb-2"><strong>Quality</strong></h5>
          <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nulla possimus distinctio libero ipsum? Quia aperiam soluta repudiandae cumque error vero illum placeat iste, ducimus dolores ipsa modi incidunt obcaecati qui.</p>

        </div>

      </div>
    </div>
    <div class="col-md-4">
      <div class="card card-cascade wider" data-aos="fade-up" data-aos-delay="150">
        <div class="view z-depth-0 view-cascade overlay">
          <img class="card-img-top" src="/img/flavor.png" alt="Card image cap">
          <a href="#!">
            <div class="mask rgba-white-slight"></div>
          </a>
        </div>

        <div class="card-body card-body-cascade text-center">
          <h4 class="card-title"><strong><i class="fa fa-snowflake" aria-hidden="true"></i>
            </strong></h4>
          <h5 class=" pb-2"><strong>Flavour Profile</strong></h5>
          <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit distinctio dolorem recusandae nulla esse doloremque, temporibus saepe sapiente inventore autem. Voluptas excepturi explicabo voluptatem assumenda nisi deserunt corrupti, praesentium aliquam?</p>
        </div>

      </div>
    </div>
  </div> --}}
  <div class="container">
    <div class="card z-depth-0 m-3">
      <div class="card-body">
        <h4>Write a Review</h4>
        <?php
        $user=Auth::user();
        ?>
        <form action="{{route('review')}}" method="POST">
          <p class="d-inline">Rate: </p>
          <div class="d-inline" id="review"></div>
          <input type="hidden" name="_token" value="{{csrf_token()}}">
          <input type="hidden" readonly id="starsInput" name="rating" class="form-control form-control-sm">
          <input type="hidden" name="productId" value="{{$product->id}}" class="form-control form-control-sm">
          @if (!empty($user))
          <div class="form-row">
            <div class="col-md-6 md-form md-outline">
              <label for="name">Name</label>
              <input class="form-control" type="text" value="{{$user->name}}" placeholder="{{$user->name}}" name="name"
                required>
            </div>
            <div class="col-md-6 md-form md-outline">
              <label for="email">Email</label>
              <input class="form-control" type="email" value="{{$user->email}}" placeholder="{{$user->email}}"
                name="email" required>
            </div>
          </div>
          @else
          <div class="form-row">
            <div class="col-md-6 md-form md-outline">
              <label for="name">Name</label>
              <input class="form-control" type="text" name="name" required>
            </div>
            <div class="col-md-6 md-form md-outline">
              <label for="email">Email</label>
              <input class="form-control" type="email" name="email" required>
            </div>
          </div>
          @endif
          <div class="md-form md-outline">
            <label for="comment">Comment</label>
            <textarea id="" class="md-textarea form-control" name="comment" rows="2" required></textarea>
            <button class="btn btn-info" type="submit">Submit</button>
        </form>
      </div>
    </div>
  </div>
  <div class="container">
    <h4>Customer Reveiws</h4>
    <hr>
    @foreach ($reviews as $review)
    <div class="card m-3">
      <div class="card-body">
        <h5>{{$review->name}}</h5>
        <p class="text-black-50">{{$review->email}}</p>
        @for ($i = 0; $i < $review->star; $i++)
          <span class="fa fa-star checked"></span>
          @endfor

          <p>
            {{$review->comment}}
          </p>
          <p class="text-black-50">{{$review->created_at->format('D,d/m/Y')}}</p>
      </div>
    </div>
    @endforeach
    {{$reviews->links()}}
  </div>
</div>
</div>
</div>
@endsection
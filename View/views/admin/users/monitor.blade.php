@extends('admin.skeleton')
@section('content')
<div class="m-5">
    <div class="card mb-3">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <img src="/storage/uploads/{{$product->image}}" class="img-fluid" alt=""
                        style="width:70%; height:auto;">
                </div>

                <div class="col-md-8">
                    <h5>{{$product->name}}</h5>
                    <div class="">
                        @for ($i = 0; $i < ($product->rate)-0.5; $i++)
                            <span class="fa fa-star checked"></span>
                            @endfor
                            @for ($i = 0; $i < 5-($product->rate); $i++)
                                <span class="far fa-star holo"></span>
                                @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>
            <h4>Reveiws</h4>
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
@endsection
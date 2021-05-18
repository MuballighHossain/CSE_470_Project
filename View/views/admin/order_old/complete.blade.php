@extends('admin.skeleton')
@section('content')
<div class="m-5">
    @include('inc.msg')
    <h4>Orders</h4>
    <hr>
    @if (count($orders)>0)
        
    @foreach ($orders as $order)
    <div class="card m-2">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <p class="d-inline"><strong> #{{$order->id}}</strong></p>
                    <br>
                    <p class="d-inline">Order date:</p>
                    <p class="text-muted d-inline">{{$order->created_at->format('D-m-Y')}}</p>
                </div>
                <div class="col-md-4">
                    <p class="d-inline">Name:</p>
                    <p class="text-muted d-inline">{{$order->name}}</p>
                    <br>
                    <p class=" d-inline">Email:</p>
                    <p class="text-muted d-inline">{{$order->email}}</p>
                    <br>
                    <p class="d-inline">Phone:</p>
                    <p class="text-muted d-inline">{{$order->phone}}</p>
                </div>
                <div class="col-md-4">
                    <h5 class="d-inline">Total:</h5>
                    <h5 class="text-muted d-inline">£{{$order->totalPrice}}</h5>
                    <br>
                    <button class="btn btn-info z-depth-0 btn-sm" type="button" data-toggle="collapse" data-target="#collapseExample{{$order->id}}"
                    aria-expanded="false" aria-controls="collapseExample">
                   See Details
                  </button>
                </div>
            </div>
            
            <div class="collapse" id="collapseExample{{$order->id}}">
                <hr>
                <div class="border border-light p-4">
                    <h6>Shipping:</h6>
                    <p class="d-inline">Address:</p>
                    <p class="text-muted d-inline">{{$order->address}}</p>
                    <p class="ml-3 d-inline">Apartment:</p>
                    <p class="text-muted d-inline">{{$order->Apartment}}</p>
                    <p class="ml-3 d-inline">city:</p>
                    <p class="text-muted d-inline">{{$order->city}}</p>
                    <p class="ml-3 d-inline">Postcode:</p>
                    <p class="text-muted  d-inline">{{$order->postcode}}</p>
                    <p class="ml-3 d-inline">Country/region:</p>
                    <p class="text-muted  d-inline">{{$order->country}}</p>
                </div>
                <div class="border border-light p-4 mt-2">
                    <h6 class="p-1">Product details</h6>
                    <?php
                    $id=$order->uniqId;
                    $products = DB::table('ordercart')->where('uniqId', '=', $id)->get();
                    $total=0;
                    foreach ($products as $product) {
                        $total=$total+$product->subtotal;
                    }
                    ?>

                    <table class="table  table-responsive-lg text-center text-wrap">
                        <thead>
                            <tr>
                                <th scope="col"><strong>#</strong></th>
                                <th scope="col"><strong>Product</strong></th>
                                <th scope="col"><strong>Price</strong></th>
                                <th scope="col"><strong>Quantity</strong></th>
                                <th scope="col"><strong>Total</strong></th>
                             </tr>
                            </thead>
                        <tbody>
                            @foreach ($products as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{$item->Pname}}</td>
                                    <td>£ {{number_format($item->price,2)}}</td>
                                    <td>{{$item->quantity}}</td>      
                                    <td><strong>£ {{number_format($item->subtotal,2)}}</strong></td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                    <div class="row">
                        <div class="col-md-9">
                            <p class="ml-3 d-inline">Subtotal:</p>
                            <p class="d-inline text-muted ">£{{number_format($total,2)}}</p>
                            <br>
                            <p class="ml-3 d-inline">Shipping Charge:</p>
                            <p class="d-inline text-muted ">£{{number_format($order->shippingcharge,2)}}</p>
                        </div>
                        <div class="col-md-3">
                            {!!Form::open(['action'=>['ordersController@destroy',$order->id],'method'=>'POST'])!!}
                            {{Form::hidden('_method','DELETE')}}
                            {{Form::submit('Delete Order',['Class'=> 'btn btn-danger btn-sm z-depth-0'])}}
                            {!!Form::Close()!!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </div>
  
  @endforeach
  {{$orders->links()}}
  <p class="note note-primary">Click See Details button for more details of product information of orders</p>
    <p class="note note-danger"><strong>Deleteing Order:</strong> If you delete the order, it will be removed from database and wont be able to recover.</p>
    @else
        <p>No Orders</p>
    @endif
</div>         
@endsection
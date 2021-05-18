@extends('layouts.app')
@section('content')
<div class="prodbg pt-5 pb-5">
@if (count($data)>0)
<div class="container m-5 mx-auto">
    <h4 class="text-center"><strong> Shopping Cart</strong></h4>
            <hr>
            <div class="text-center" id="spinner">
                <div class="spinner-grow text-info" role="status">
                    <span class="sr-only">Loading...</span>
                  </div>
            </div>
    <div class="card" id="myDiv" >
        <div class="card-body">
            @include('inc.msg')
            <table class="table table-hover table-responsive-sm text-center">
                <thead>
                    <tr>
                        <th scope="col"><strong>#</strong></th>
                        <th scope="col"><strong>Product</strong></th>
                        <th scope="col"><strong>Price</strong></th>
                        <th scope="col"><strong>Quantity</strong></th>
                        <th scope="col"><strong>Total</strong></th>
                        <th scope="col"><strong>Action</strong></th>

                    </tr>
                </thead>
                <tbody>
                
                    @foreach ($data->sortBy('id') as $item)
                        <tr>
                            <td>{{ $loop->iteration}}</td>
                            <td>{{$item->name}}</td>
                            <td>£ {{number_format($item->price,2)}}</td>
                            <td style="padding-left:5px; padding-right:5px;">
                            <div>
                            <a href="{{route('qntyadd',$item->id)}}" class="badge badge-info mr-2 z-depth-0" type="button"><i class="fas fa-plus"></i></a>
                            {{$item->quantity}}
                            <a href="{{route('qntyremove',$item->id)}}" class="badge badge-info ml-2 z-depth-0" type="button"><i class="fas fa-minus"></i></a>
                            </div>
                            </td>
                            
                            <td><strong>£ {{number_format(Cart::get($item->id)->getPriceSum(),2)}}</strong></td>
                            <td><a href="{{route('clear', $item->id)}}" class="btn btn-sm z-depth-0 btn-danger">Remove</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <hr>
            <form action="{{url('checkout')}}"  method="POST">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="md-form mt-3 form-inline">
            <p>Shipping: </p><select class="mdb-select md-form ml-3" name="country" searchable="Search here.." required>
                <option value="" disabled selected>Choose Region</option>
                @foreach ($countries as $country)
                <option value="{{$country->id}}">{{$country->name}}</option>
                @endforeach
            </select>
            <p class="ml-auto text-right">Sub total: £{{number_format(Cart::getSubTotal(),2)}}</p>
            </div>
            <small class="text-muted">Shipping Cost: Calculated at next step. <br>
            *Additional Shipping charges may apply according to the Shipping address. check <a href="{{route('terms')}}">Terms & Condition</a> for more information.</small> <br>
            
            <button class="btn btn-info btn-md z-depth-0" type="submit">Proceed to Checkout</button>
        </form>
        </div>
    </div>
</div>
    
@else
<div class=" container py-5 mt-5" style="height:500px;">
<div class="alert alert-danger" role="alert">
<h5 class="text-center" >Cart is empty</h5>
</div>
</div>
@endif
</div>
@endsection

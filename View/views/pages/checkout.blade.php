@extends('layouts.app')
@section('content')
<div class="prodbg pt-3 pb-3">
    <div class="container m-5 mx-auto">
        <h4 class="text-center"><strong>Checkout</strong></h4>
        <hr>

        <div class="row">
            <div class="col-md-6">
                <div class="card mb-5" data-aos="fade-up" data-aos-delay="50">
                    <div class="card-body">
                        <h5 class="card-title text-center mt-4">Cart</h5>
                        <hr>
                        <table class="table table-hover table-responsive-lg text-center text-wrap">
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

                                @foreach ($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{$item->name}}</td>
                                    <td>£ {{number_format($item->price,2)}}</td>
                                    <td style="padding-left:5px; padding-right:5px;">
                                        <div>
                                            {{$item->quantity}}
                                        </div>
                                    </td>
                                    <td><strong>£{{number_format(Cart::get($item->id)->getPriceSum(),2)}}</strong></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <hr>
                        <dl class="row">
                            <dt class="col-sm-9">Subtotal:</dt>
                            <dd class="col-sm-3">£{{$productprice}} </dd>
                            <dt class="col-sm-9">Shipping Charge:</dt>
                            <dd class="col-sm-3">£{{number_format($charge,2)}} </dd>
                        </dl>
                        <hr>
                        <dl class="row">
                            <dt class="col-sm-9">Total:</dt>
                            <dd class="col-sm-3">
                                <h5>£{{number_format($totalPrice,2)}}</h5>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card" data-aos="fade-up" data-aos-delay="100">
                    <div class="card-body">
                        <?php
                    $user=Auth::user();
                    ?>
                        <h5 class="mt-4">Contact Informations</h5>
                        {!! Form::open(['action' => 'PagesController@store', 'method' => 'POST']) !!}
                        <div class="form-group">
                            <!-- Name -->
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="md-form md-outline mt-3">
                                        @if (!empty($user))
                                        {{Form::label('email','Email')}}
                                        {{Form::email('email',$user->email,['class'=> 'form-control','required',])}}
                                        @else
                                        {{Form::label('email','Email')}}
                                        {{Form::email('email',old('email'),['class'=> 'form-control','required'])}}
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="md-form md-outline mt-3">
                                        {{Form::label('phone','Phone (Optional)')}}
                                        {{Form::tel('phone',old('phone'),['class'=> 'form-control ', 'pattern'=>'[0-9]{11}'])}}
                                    </div>
                                </div>
                            </div>
                            <h5 class="mt-4">Shipping Address</h5>
                            <div class="form-row">
                                <div class="col-md-8">
                                    <div class="md-form md-outline mt-3">
                                        @if (!empty($user))
                                        {{Form::label('name','Name')}}
                                        {{Form::text('name',$user->name,['class'=> 'form-control',])}}
                                        @else
                                        {{Form::label('name','Name')}}
                                        {{Form::text('name',old('name'),['class'=> 'form-control',])}}
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="md-form mt-3 md-outline">
                                {{Form::label('address','Address')}}
                                {{Form::text('address',old('address'),['class'=> 'form-control','required'])}}
                            </div>
                            <div class="md-form mt-3 md-outline">
                                {{Form::label('Apartment','Apartment,suit,etc..')}}
                                {{Form::text('Apartment',old('Apartment'),['class'=> 'form-control',])}}
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="md-form mt-3 md-outline">
                                        {{Form::label('city','City')}}
                                        {{Form::text('city',old('city'),['class'=> 'form-control',])}}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="md-form mt-3 md-outline">
                                        {{Form::label('postcode','Postcode')}}
                                        {{Form::text('postcode',old('postcode'),['class'=> 'form-control',])}}
                                    </div>

                                </div>
                            </div>
                            <div>
                                <p class="text-muted"><span class="border rounded border-light p-2">Country/Region:
                                        {{$shipping}} </span> </p>
                            </div>
                            
                            <div class="mb-3">
                                <p>Payment Option:</p>
                                <!-- Material unchecked -->
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" onchange="hide()" required="true" id="cash"
                                        name="payment" value="Cash">
                                    <label class="form-check-label" for="cash">Cash on Delivery</label>
                                </div>

                                <!-- Material checked -->
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" onchange="show()" id="paypal" value="Paypal"
                                        name="payment">
                                    <label class="form-check-label" for="paypal">Paypal</label>
                                </div>
                            </div>
                            <div class="form-check pl-0 ml-0 ">
                                <input type="checkbox" class=" form-check-input" id="materialUnchecked" required>
                                <label class="form-check-label text-muted" style="font-size: 14px;" for="materialUnchecked">I accept the <a href="{{route('terms')}}">Terms & Conditions</a> and wish to proceed with my order.</label>
                            </div>
                            {{ Form::hidden('country', $shipping) }}
                            {{ Form::hidden('shippingcharge', $charge) }}
                            {{ Form::hidden('totalPrice', $totalPrice) }}
                            {{ Form::hidden('subtotal', $productprice) }}
                            <?php
                            session_start();
                            $uniqId= session_id();
                            session_unset();
                            session_destroy();
                            ?>
                            <div id="paypal-button"></div>
                            {{ Form::hidden('uniqId', $uniqId)}}
                            {{ Form::hidden('payment', 'Paypal')}}
                            {{-- <div id="show2" style="display: none;">
                               <button class="btn btn-info  btn-block z-depth-0 my-2 px-5 waves-effect" type="Submit">Checkout</button>
                             </div> --}}
                        </div>
                        <script src="https://www.paypalobjects.com/api/checkout.js"></script>
                        <script>
                        var sum = "<?php echo $totalPrice ?>";
                        paypal.Button.render({
                            // Configure environment
                            env: 'production',
                            client: {
                            sandbox: 'AVNr_vO3WuDdYD5JoAdLRtpaKoQKlWR7yZL2XieQv4g0WOQpG3hJywls4tv8yfcHBbBbrJ3NAhsLCzWV',
                            production: 'Ad85NCddL74CMlHLV7zKH-jsEIixpL79zf-9MBoKsT_hISKLE-Dt_mFk4w6USQC1tIFQx4MkMcar9sKi'

                            },
                            // Customize button (optional)
                            locale: 'en_US',
                            style: {
                            size: 'medium',
                            color: 'gold',
                            shape: 'rect',
                            layout: 'horizontal',
                            fundingicons: 'true',

                            funding: {
                            allowed: [ paypal.FUNDING.CARD ],
                            disallowed: [ paypal.FUNDING.CREDIT ]
                                }
                            },
                            // Enable Pay Now checkout flow (optional)
                            commit: true,

                            // Set up a payment
                            payment: function(data, actions) {
                            return actions.payment.create({
                            
                                transactions: [{
                                amount: {
                                    total: sum,
                                    currency: 'GBP'
                                }
                                }]
                                
                            });
                            },
                            // Execute the payment
                            onAuthorize: function(data, actions) {
                            return actions.payment.execute().then(function() {
                                // Show a confirmation message to the buyer
                                document.querySelector('#paypal-button')
                                .innerHTML = '<p class="text-success"> Payment Complete! </p><button class="btn btn-info  btn-block z-depth-0 my-2 px-5 waves-effect" type="Submit">Checkout</button>';
                                });
                            }
                        }, '#paypal-button');

                        </script>
                        <script type="text/javascript">
                            function show(){
                                document.getElementById('show1').style.display = 'block';
                                document.getElementById('show2').style.display = 'none';
                            }
                            function hide(){
                                document.getElementById('show1').style.display = 'none';
                                document.getElementById('show2').style.display = 'block';
                            }
                        </script>
<!--                         <button class="btn btn-info  btn-block z-depth-0 my-2 px-5 waves-effect" type="Submit">Checkout</button>
 -->                            {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
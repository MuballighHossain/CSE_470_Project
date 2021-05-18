
<img style="width: 6rem;  display: block; margin: 0 auto;" src="{{$message->embed(asset('img/logo.png'))}}" alt="Savvyremedies Ltd" />

<h4 style="text-align: center; background-color:#33b5e5; color:white; padding:10px 20px 10px 20px;">New Order Received</h4>

        <div style="border-style:solid; border-width: 1px; padding: 10px;">
            <p>Name: <Strong>{{$name}}</Strong> &nbsp;&nbsp; | &nbsp;&nbsp; Email:<strong>{{$email}}</strong> &nbsp;&nbsp; | &nbsp;&nbsp; Phone:<strong> {{$phone}}</strong></p>
        </div>
        <div style="border-style:solid; border-width: 1px; padding: 5px;">
        	<h4>Total: <strong style="color:#00C851;">£{{number_format($totalPrice,2)}}</strong></h4>
        </div>
        <div style="border-style:solid; border-width: 1px; padding: 10px;">
 		<h4>Shipping:</h4>
                    <p>Address: <strong>{{$address}}</strong> &nbsp;&nbsp; | &nbsp;&nbsp; Apartment: <strong>{{$apartment}}</strong> &nbsp;&nbsp; | &nbsp;&nbsp; 
                    city: <strong>{{$city}}</strong> &nbsp;&nbsp; | &nbsp;&nbsp; Postcode: <strong></strong>{{$postcode}} &nbsp;&nbsp; | &nbsp;&nbsp; Country/region: <strong>{{$country}}</strong></p>
		
                    <table style="border-style: solid;border-width: 1px; width:600px;">
                        <thead>
                            <tr>
                                <th style="border: 1px solid black;"><strong>#</strong></th>
                                <th style="border: 1px solid black;"><strong>Product</strong></th>
                                <th style="border: 1px solid black;"><strong>Price</strong></th>
                                <th style="border: 1px solid black;"><strong>Quantity</strong></th>
                                <th style="border: 1px solid black;"><strong>Total</strong></th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($datas as $item)
                            <tr>
                                <td style="border: 1px solid black;">{{$loop->iteration }}</td>
                                <td style="border: 1px solid black;">{{$item->name}}</td>
                                <td style="border: 1px solid black;">£ {{number_format($item->price,2)}}</td>
                                <td style="border: 1px solid black;">{{$item->quantity}}</td>
                                <td style="border: 1px solid black;"><strong>£{{number_format(Cart::get($item->id)->getPriceSum(),2)}}</strong></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                            <p>Shipping Charge:
                            <strong>£{{number_format($shippingcharge,2)}}</strong></p>
                            </div>
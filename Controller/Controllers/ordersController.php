<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\order;
use Illuminate\Support\Facades\DB;
use Darryldecode\Cart\Facades\CartFacade as Cart;

class ordersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countawate = order::where('status', '=', 0)->count();
        $countTotal = order::count();
        $orders = order::where('status', '=', 0)
            ->orderBy('created_at', 'ASC')->paginate(15);
 
        return view('admin.order.list')->with('orders', $orders)->with( 'countawate', $countawate)->with('countTotal', $countTotal);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('checkout');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //     $this->validate($request,[
        //         'email'=> 'required',
        //         'Lname'=> 'required',
        //         'address'=> 'required',
        //         'Apartment'=> 'required',
        //         'city'=> 'required',
        //         'postcode'=> 'required',
        //     ]);
        //     $datas =Cart::getContent();

        //     $order=new order;
        //     $order->email =$request->input('email');
        //     $order->Fname =$request->input('Fname');
        //     $order->Lname =$request->input('Lname');
        //     $order->address =$request->input('address');
        //     $order->Apartment =$request->input('Apartment');
        //     $order->city =$request->input('city');
        //     $order->postcode =$request->input('postcode');
        //     $order->country =$request->input('country');
        //     $order->phone =$request->input('phone');
        //     $id=$request->input('uniqId');
        //     $email=$request->input('email');
        //     $make=$id.$email;
        //     $order->uniqId =$make;
        //     $order->status=0;
        //     $order->shippingcharge=$request->input('shippingcharge');
        //     $order->totalPrice=$request->input('totalPrice');
        //     $order->save();
        //     foreach ($datas as $data) {
        //         DB::table('ordercart')->insert(
        //             ['uniqId' => $make, 'Pname' => $data->name, 'price'=>$data->price, 'quantity'=>$data->quantity, 'subtotal'=>number_format(Cart::get($data->id)->getPriceSum(),2)]
        //         );
        //     }
        // Cart::clear();
        // return redirect('complete')->with('success','Your order has been placed!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $order = order::find($id);
        $order->status = 3;
        $order->save();
        // $order=order::find($id);
        // $cartid=$order->uniqId;
        // DB::table('ordercart')->where('uniqId',$cartid)->delete();
        // $order->delete();
        return redirect('admin/complete')->with('error', 'Order Deleted!');
    }


    public function status($id)
    {
        $order = order::find($id);
        $order->status = 1;
        $order->save();
        return redirect('admin/order')->with('success', 'Order marked as Complete!');
    }


    public function complete()
    {
        $countTotal = order::count();
        $orders = order::where('status', '=', 1)
            ->orderBy('created_at', 'ASC')->paginate(15);
        return view('admin.order.complete')->with('orders', $orders)->with('countTotal', $countTotal);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $orders = order::where('email', $query)
            ->orWhere('name', 'like', '%' . $query . '%')
            ->orWhere('id', 'like', '%' . $query . '%')->orderBy('created_at', 'ASC')->paginate(15);
        return view('admin.order.list')->with('orders', $orders);
    }

    public function compsearch(Request $request)
    {
        $query = $request->input('query');
        $orders = order::where('email', $query)
            ->orWhere('name', 'like', '%' . $query . '%')
            ->orWhere('id', 'like', '%' . $query . '%')->orderBy('created_at', 'ASC')->paginate(15);
        return view('admin.order.complete')->with('orders', $orders);
    }
}

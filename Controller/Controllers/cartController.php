<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use App\country;
use Illuminate\Support\Facades\DB;
class cartController extends Controller
{
    public function cart(){
        $countries= country::all();
        $data =Cart::getContent();
        return view('pages.cart',[
            'data'=>$data, 'countries'=>$countries
        ])->with('success', 'Item added to cart successfully.');
    }
    public function add(Request $res){
        $countries= country::all();
        $add= Cart::add([
            'id'=>$res->id,
            'name'=>$res->name,
            'price'=>$res->price,
            'quantity'=>$res->qnty
            
        ]);

        if($add)
        return view('pages.cart',[
            'data'=>Cart::getContent(), 'countries'=>$countries
        ])->with('success', 'Item added to cart successfully.');
    }
    public function remove($id){
       Cart::remove($id);
       if (Cart::isEmpty()) {
        return redirect('cart')->with('error', 'Item removed from cart.');
    }
    return redirect('cart')->with('error', 'Item removed from cart.');
    }

    public function qntyadd($id)
    {   
        Cart::update($id, array('quantity' => 1,));
        return redirect('cart');
    }
    public function qntyremove($id)
    {   
        
        Cart::update($id, array('quantity' => -1,));
        return redirect('cart');
    }

    public function checkout(Request $req){
        $this->validate($req,[
            'country'=> 'required',
        ]);
        $id = $req->input('country');
        $country = country::find($id);
        $id=$country->id;
    $charge=number_format(DB::table('countries')->where('id', $id)->value('charge'),2);
   $shipping = DB::table('countries')->where('id', $id)->value('name');
   $productprice=number_format(Cart::getSubTotal(),2);
   if ($id==1 && $productprice>=50.00) {
      $charge=0.00;
   }
   $totalPrice=$charge+$productprice;

        $data =Cart::getContent();
        return view('pages.checkout',[
            'data'=>$data, 'country'=>$country, 'shipping'=>$shipping, 'totalPrice'=>$totalPrice, 'charge'=>$charge, 'productprice'=>$productprice
        ]);
    }
    
}

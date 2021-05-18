<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use Illuminate\Support\Facades\DB;
class shopController extends Controller
{
    //
    public function savvyShop(){
        $products =product::all();
        
        return view('pages.products') -> with('products', $products);
    }

    public function search(Request $request){
        $query= $request->input('query');
        $products=DB::table('products')->where('name', 'like', '%'.$query.'%')->orderBy('created_at', 'DESC')->paginate(10);
        return view('pages.products')->with('products', $products,);

    }
    public function naturalBeautyShop(){
        $products = DB::table('products')->where('cat', '=', 1)->get();
        return view('pages.products') -> with('products', $products);
    }
    public function healthyNutrition(){
        $products = DB::table('products')->where('cat', '=', 2)->get();
        return view('pages.products') -> with('products', $products);
    }
    public function foodSuppliments(){
        $products = DB::table('products')->where('cat', '=', 3)->get();
        return view('pages.products') -> with('products', $products);
    }
    public function accesories(){
        $products = DB::table('products')->where('cat', '=', 4)->get();
        return view('pages.products') -> with('products', $products);
    }
}

<?php

namespace App\Http\Controllers;

use App\product;
use Illuminate\Http\Request;
use App\blog;
use App\reviews;
use App\order;
use Illuminate\Support\Facades\DB;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Support\Facades\Mail;

class PagesController extends Controller
{
    public function index()
    {
        $sliders = DB::table('slider')->get();
        $headerdata = DB::table('landheader')->get();
        $products = product::all();
        $featureCaption = DB::table('featured')->where('id', 1)->pluck('caption');
        $id = DB::table('featured')->where('id', 1)->pluck('productId');
        $featureProd = DB::table('products')->where('id', $id)->get();
        return view('pages.index', compact('sliders', 'headerdata', 'products', 'featureProd', 'featureCaption'));
    }
    public function shop($slug)
    {
        $id = product::where('slug', $slug)->pluck('id')->first();
        $product = product::find($id);
        $reviews = reviews::where('productId', $id)
            ->orderBy('created_at', 'desc')
            ->paginate(5);
        $count = reviews::where('productId', $id)->count();
        $star = 0;
        $avg = 0;
        if ($count > 0) {
            foreach ($reviews as $review) {
                $temp = $review->star;
                $star = $temp + $star;
            }
            $avg = $star / $count;
        }
        product::where('id', $id)->update(array('rate' => $avg));
        return view('pages.shop', compact('id', 'product', 'reviews', 'star', 'count'));
    }
    public function privacy()
    {
        return view('pages.privacy');
    }
    public function terms()
    {
        return view('pages.terms');
    }
    public function cookies()
    {
        return view('pages.cookies');
    }
    public function about()
    {
        return view('pages.about');
    }
    public function wholesale()
    {
        return view('pages.wholesale');
    }
    public function contact()
    {
        return view('pages.contact');
    }
    public function lifestyle()
    {
        $blogs = blog::orderBy('created_at', 'desc')->paginate(10);
        return view('pages.lifestyle')->with('blogs', $blogs);
    }

    public function prodcts()
    {
        return view('pages.products');
    }
    public function living()
    {
        return view('pages.living');
    }
    public function blog($id)
    {
        $blog = blog::find($id);
        return view('pages.blog', compact('id', 'blog'));
    }


    public function create()
    {
        return view('admin.product.create');
    }
    public function list()
    {
        return view('admin.product.list');
    }

    public function complete()
    {
        return view('pages.complete');
    }

    public function review(Request $request)
    {
        $this->validate($request, [
            'productId' => 'required',
            'name' => 'required',
            'email' => 'required',
            'comment' => 'required',
            'rating' => 'required'
        ]);
        $review = new reviews;
        $review->name = $request->input('name');
        $review->email = $request->input('email');
        $review->comment = $request->input('comment');
        $pId = $request->input('productId');
        $review->star = $request->input('rating');
        $review->productId = $pId;
        $review->save();
        return redirect()->back()->with('success', 'Review posted');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'name' => 'required',
            'address' => 'required',
            'Apartment' => 'required',
            'city' => 'required',
            'postcode' => 'required',
            'payment' => 'required'
        ]);
        $datas = Cart::getContent();
        $order = new order;
        $order->email = $request->input('email');
        $order->name = $request->input('name');
        $order->address = $request->input('address');
        $order->Apartment = $request->input('Apartment');
        $order->city = $request->input('city');
        $order->postcode = $request->input('postcode');
        $order->country = $request->input('country');
        $order->phone = $request->input('phone');
        $id = $request->input('uniqId');
        $email = $request->input('email');
        $make = $id . $email;
        $order->uniqId = $make;
        $order->status = 0;
        $order->shippingcharge = $request->input('shippingcharge');
        $order->totalPrice = $request->input('totalPrice');
        $order->payment_method = $request->input('payment');
        $order->save();
        foreach ($datas as $data) {
            DB::table('ordercart')->insert(
                ['uniqId' => $make, 'Pname' => $data->name, 'price' => $data->price, 'quantity' => $data->quantity, 'subtotal' => number_format(Cart::get($data->id)->getPriceSum(), 2)]
            );
        }
        $inputs = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'apartment' => $request->input('Apartment'),
            'city' => $request->input('city'),
            'postcode' => $request->input('postcode'),
            'country' => $request->input('country'),
            'shippingcharge' => $request->input('shippingcharge'),
            'totalPrice' => $request->input('totalPrice'),
            'datas' => Cart::getContent(),

        ];
        Mail::send('emails.orderRcvd', $inputs, function ($mail) use ($inputs) {
            $mail->from($inputs['email'], $inputs['name'])
                ->to('order@savvyremedies.com')
                ->subject("New order received");
        });
        Mail::send('emails.orderplaced', $inputs, function ($mail) use ($inputs) {
            $mail->from('noreply@savvyremedies.com')
                ->to($inputs['email'], $inputs['name'])
                ->subject("Savvyremedies Ltd - Order Placed");
        });

        Cart::clear();
        return redirect('complete')->with('success', 'Your order has been placed!');
    }
}

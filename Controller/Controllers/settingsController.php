<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\product;
class settingsController extends Controller
{
    public function landing(){
        $sliders=DB::table('slider')->get();
        $headerdata=DB::table('landheader')->get();
        $products=product::all();
        $featureCaption=DB::table('featured')->where('id', 1)->pluck('caption');
        $id=DB::table('featured')->where('id', 1)->pluck('productId');
        $featureProd=DB::table('products')->where('id', $id)->get();
        return view('admin.settings.landing',compact('sliders', 'headerdata','products', 'featureProd','featureCaption'));
    }
    
    
    public function slider(Request $request){
        $this->validate($request,[
            'image'=> 'image|max:1999',
            'header'=>'nullable',
            'caption'=>'nullable'
        ]);

        $header= $request->input('header');
        $caption= $request->input('caption');

            $filenamewithExt=$request->file('image')->getClientOriginalName();
            $filename =pathinfo($filenamewithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            $path=$request->file('image')->storeAs('public/uploads',$fileNameToStore);
            $image=$fileNameToStore;
        $data=array('image'=>$image,'header'=>$header,'caption'=>$caption);
        DB::table('slider')->insert($data);
        return redirect()->route('admin.landing')->with('success', 'Slider Added Successfully! Go to site to view changes.');
    }

    public function sliderDelete($id){
        DB::table('slider')->where('id', '=', $id)->delete();
        return redirect()->route('admin.landing')->with('error', 'Slider Deleted!');
    }

    public function header(Request $req){
        $this->validate($req,[
            'header'=>'required',
        ]);
        $head=$req->input('header');
        DB::table('landheader') ->where('id', 1)->update(['head' => $head]);
        return redirect()->route('admin.landing')->with('success', 'Header Updated!');
    }
    public function featureProduct(Request $request){
        $this->validate($request,[
            'product'=>'required',
            'caption'=>'required'
        ]);
        $productId=$request->input('product');
        $caption=$request->input('caption');
        DB::table('featured') ->where('id', 1)->update(['productId' => $productId, 'caption'=>$caption]);
        return redirect()->route('admin.landing')->with('success', 'Feature Product Updated!');
    }
}

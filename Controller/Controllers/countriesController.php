<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\country;
class countriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries =country::orderby('id')->get();
        return view('admin.shipping.region') ->with('countries', $countries);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.shipping.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=> 'required',
            'charge'=> 'required',
        ]);

        $countries=new country;
        $countries->name =$request->input('name');
        $countries->charge =$request->input('charge');
        
        $countries->save();
        return redirect('admin/region')->with('success','Country Added!');
        
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
        $country=country::find($id);
        return view('admin.shipping.edit')->with('country',$country);
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
        $this->validate($request,[
            'name'=> 'required',
            'charge'=> 'required',
        ]);

        $countries=country::find($id);
        $countries->name =$request->input('name');
        $countries->charge =$request->input('charge');
        $countries->save();
        return redirect('admin/region')->with('success','Country Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $countries=country::find($id);
        $countries->delete();
        return redirect('admin/region')->with('error','Country Deleted!');
    }
}

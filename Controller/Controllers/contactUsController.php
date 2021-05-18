<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class contactUsController extends Controller
{
    public function store(Request $request){
        $this->validate($request,[
            'name'=> 'required',
            'email'=> 'required',
            'msg'=> 'required'

        ]);
        $name= $request->input('name');
        $email= $request->input('email');
        $msg= $request->input('msg');
        $data=array('name'=>$name,'email'=>$email,'msg'=>$msg);
        DB::table('contactus')->insert($data);
        return redirect('contact')->with('success', 'Message sent!');
    }
    public function Show(){
        $usermsg=DB::table('contactus')->get();
        return view('admin.users.userMsg')->with('usermsg', $usermsg);
    }

    public function destroy($id)
    {
        $msg=DB::table('contactus')->where('id', '=', $id)->delete();
        $usermsg=DB::table('contactus')->get();
        return view('admin.users.userMsg')->with('usermsg', $usermsg);
    }
}

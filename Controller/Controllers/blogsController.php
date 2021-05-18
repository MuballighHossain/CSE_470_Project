<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\blog;
use Illuminate\Support\Facades\DB;
class blogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs =blog::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.blogs.list')-> with('blogs', $blogs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blogs.create');
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
            'title'=> 'required',
            'category'=> 'required',
            'body'=> 'required',
            'image'=> 'image|nullable|max:1999',
        ]);

        $blog=new blog;
        $blog->title =$request->input('title');
        $blog->category =$request->input('category');
        $blog->body =$request->input('body');
        if($request->hasfile('image')){
            $filenamewithExt=$request->file('image')->getClientOriginalName();
            $filename =pathinfo($filenamewithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            $path=$request->file('image')->storeAs('public/uploads',$fileNameToStore);
            $blog->image=$fileNameToStore;
        }
        $blog->save();
        return redirect('admin/blogs')->with('success','Blog Posted!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog=blog::find($id);
       return view('admin.blogs.edit')->with('blog',$blog);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog=blog::find($id);
        return view('admin.blogs.edit')->with('blog',$blog);
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
            'title'=> 'required',
            'category'=> 'required',
            'body'=> 'required',
            'image'=> 'image|nullable|max:1999',
        ]);

        $blog=blog::find($id);
        $blog->title =$request->input('title');
        $blog->category =$request->input('category');
        $blog->body =$request->input('body');
        if($request->hasfile('image')){
            $filenamewithExt=$request->file('image')->getClientOriginalName();
            $filename =pathinfo($filenamewithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            $path=$request->file('image')->storeAs('public/uploads',$fileNameToStore);
            $blog->image=$fileNameToStore;
        }
        $blog->save();
        return redirect('admin/blogs')->with('success','Blog Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog=blog::find($id);
        $blog->delete();
        return redirect('admin/blogs')->with('success','Product Deleted!');
    }

    public function search(Request $request){
        $query= $request->input('query');
        $blogs=DB::table('blogs')->where('title', 'like', '%'.$query.'%')->orderBy('created_at', 'DESC')->paginate(10);
        return view('pages.lifestyle')->with('blogs', $blogs);

    }
    public function cat($id){
        $blogs = blog::where('category',$id)->orderBy('created_at', 'desc')->paginate(10);
        return view('pages.lifestyle') -> with('blogs', $blogs);
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\order;
class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $count = order::where('status', 0)->count();
        return view('admin.index', compact('count'));
    }
}

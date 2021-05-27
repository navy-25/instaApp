<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = \App\Models\Posts::orderby('created_at','DESC')->get();
        return view('home',compact('posts'));
    }
    public function show_profile($id)
    {
        $user = \App\Models\User::find($id);
        $sum_content = \App\Models\Posts::where('id_user',$user->id)->get();
        $sum_content = count($sum_content);
        $posts = \App\Models\Posts::orderby('created_at','DESC')
            ->where('id_user',$user->id)
            ->get();
        return view('user.show_profile',compact('user','posts','sum_content'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){

        $ds = DB::table('product')
        ->take(6)
        ->get();
        return view('user.home')->with(['ds'=>$ds]);
    }

    public function about(){

        return view('user.about');
    }

    public function contact(){

        return view('user.contact');
    }

}

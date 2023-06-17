<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('home');
    }

    public function users()
    {
        $user = Auth::user();

        $token = $user->createToken("API TOKEN")->plainTextToken;

        return view('users.index', compact('token'));
    }

    public function products()
    {
        $user = Auth::user();

        $token = $user->createToken("API TOKEN")->plainTextToken;

        return view('products.index', compact('token'));
    }

    //end controller
}

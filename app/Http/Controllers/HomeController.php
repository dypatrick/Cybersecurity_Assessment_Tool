<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;

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
        $thisMonthUsers = User::where('created_at', '>=', \Carbon\Carbon::now()->startOfMonth())->where('role', '=', 'user')->get();
        //dd($thisMonthUsers);
        return view('home', compact('thisMonthUsers'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        //dd($request->all());
        $states = array_unique(User::pluck('state')->toArray());
        $users = User::all();
        if($request->has('memberStatus')){
            if($request->memberStatus == "Unregistered")
                $users = $users->where('password', '=', null);
            else if($request->memberStatus == "Registered")
                $users = $users->where('password', '!=', null);
        }
        if ($request->has('state')) {
            if($request->state != null)
                $users = $users->where('state', $request->state);
        }
        if($request->has('fromDate')){
            if($request->fromDate != null)
                $users = $users->where('created_at', '>=', $request->fromDate);
        }
        if($request->has('toDate')){
            if($request->toDate != null)
                $users = $users->where('created_at', '<=', $request->toDate);
        }
        return view('user.index', compact('users', 'states'));
    }

    public function show(Request $request, $id)
    {
        $user = User::find($id);
        return view('user.view', compact('user'));
    }
}

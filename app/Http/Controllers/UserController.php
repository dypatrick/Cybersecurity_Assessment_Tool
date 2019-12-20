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

        if($request->has('year')){
            $users = $users->where('year', $request->year);
        }
        return view('user.index', compact('users', 'states'));
    }

    public function show(Request $request, $id)
    {
        $user = User::find($id);
        return view('user.view', compact('user'));
    }

    public function edit(Request $request, $id)
    {
        $user = User::find($id);
        //dd($user);
        return view('user.edit', compact('user'));
    }

    public function update(Request $request)
    {
        //dd($request->all());
        $user = User::find($request->id);
        if($request->has('firstname'))
            $user->firstname = $request->firstname;
        if($request->has('lastname'))
            $user->lastname = $request->lastname;
        if($request->has('email'))
            $user->email = $request->email;
        if($request->has('jobtitle'))
            $user->jobtitle = $request->jobtitle;
        if($request->has('company'))
            $user->company = $request->company;
        if($request->has('industry'))
            $user->industry = $request->industry;
        if($request->has('phone'))
            $user->phone = $request->phone;
        if($request->has('address'))
            $user->address = $request->address;
        if($request->has('city'))
            $user->city = $request->city;
        if($request->has('state'))
            $user->state = $request->state;
        if($request->has('zipcode'))
            $user->zipcode = $request->zipcode;
        $user->save();

        return redirect()->back();

    }
}

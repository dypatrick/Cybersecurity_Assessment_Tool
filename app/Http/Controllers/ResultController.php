<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Result;
use DB;

class ResultController extends Controller
{
    public function index()
    {
        $data = DB::table('users')
        ->select(
            DB::raw('state as state'),
            DB::raw('count(*) as number'))
        ->groupBy('state')
        ->get();
        //dd($data);
        $states[] = ['State', 'Number'];
        foreach($data as $key => $value)
        {
        $states[++$key] = [$value->state, $value->number];
        }
        
        
        $data = DB::table('users')
        ->select(
            DB::raw('year as year'),
            DB::raw('count(*) as number'))
        ->groupBy('year')
        ->get();
        //dd($data);
        $years[] = ['Year', 'Number'];
        foreach($data as $key => $value)
        {
        $years[++$key] = [$value->year, $value->number];
        }
        
        return view('result.index', compact('states', 'years'));
    }

    public function show(Request $request, $id)
    {
        $result = Result::find($id);
        return view('result.view', compact('result'));
    }
}

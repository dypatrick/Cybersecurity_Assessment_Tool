<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Result;


class ResultController extends Controller
{
    public function index()
    {
        $results = Result::all();
        
        return view('result.index', compact('results', 'pie'));
    }
}

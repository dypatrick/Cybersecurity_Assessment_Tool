<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport as ExportsUsersExport;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use App\User;

class ExcelController extends Controller
{

    public function export() 
    {
        $users = User::all();
        //dd($users);
        return Excel::download(new UsersExport, 'users.xlsx');
    }

}

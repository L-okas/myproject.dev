<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TotalUsersController extends Controller
{
    public function totalUsers(){
       $total = DB::table('users')->get()->count();
        $totalposts = DB::table('posts')->get()->count();
        $totalcategories = DB::table('categories')->get()->count();
       return view('admin.index', compact('total', 'totalposts', 'totalcategories'));
    }
}

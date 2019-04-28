<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function Index(){
		$users = DB::table("users")
                   ->get();

        $apps = DB::table("appointments")
                   ->get();
		return view('admin.index')->with('users',$users)
		                          ->with('apps',$apps);
}


    }




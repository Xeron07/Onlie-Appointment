<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    //

    public function Index(Request $req){
        $req->session()->flush();
    	return redirect('/login');
    }
}

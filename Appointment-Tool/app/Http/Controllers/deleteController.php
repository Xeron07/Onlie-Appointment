<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class deleteController extends Controller
{
    public function user(Request $req)
    {
    	 DB::table('users')->where('userId', '=', 4)->delete();
    	  return response()
            ->json(array('msg'=>'success'), 200);
    }

    public function news(Request $req)
    {
    	 DB::table('news')->where('id', '=', $req->id)->delete();
    	  return response()
            ->json(array('msg'=>'success'), 200);
    }

      public function appointment(Request $req)
    {
       DB::table('appointments')->where('aId', '=', $req->id)->delete();
       DB::table('appointmentList')->where('aId','=',$req->id)->delete();
    	  return response()
            ->json(array('msg'=>'success'), 200);
    }

}

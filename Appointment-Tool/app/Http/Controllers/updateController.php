<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class updateController extends Controller
{
     public function name(Request $req)
    {
    	 DB::table('users')->where('userId',"=", $req->session()->get("userId"))
			                        ->update(['name'=>$req->name]);


    	  return response()
            ->json(array('msg'=>'success'), 200);
    }

      public function email(Request $req)
    {
    	DB::table('users')->where('userId',"=", $req->session()->get("userId"))
			                        ->update(['email'=>$req->email]);

    	  return response()
            ->json(array('msg'=>'success'), 200);
    }
     public function password(Request $req)
    {
    	 DB::table('users')->where('userId',"=", $req->session()->get("userId"))
			                        ->update(['password'=>$req->password]);

    	  return response()
            ->json(array('msg'=>'success'), 200);
    }
     public function location(Request $req)
    {
			DB::table('users')->where('userId',"=", $req->session()->get("userId"))
			                        ->update(['location'=>$req->location]);
          
          
    	  return response()
            ->json(array('msg'=>'success'), 200);
    }

    public function news(Request $req){
            DB::table('news')->where('id','=',$req->id)
                             ->update(['title'=>$req->title,'msg'=>$req->msg]);
                             return response()
                             ->json(array('msg'=>'success'), 200);
    }

    public function namei(Request $req,$id)
    {
    	 DB::table('users')->where('userId',"=", $id)
			                        ->update(['name'=>$req->name]);


    	  return response()
            ->json(array('msg'=>'success'), 200);
    }

      public function emaili(Request $req,$id)
    {
    	DB::table('users')->where('userId',"=", $id)
			                        ->update(['email'=>$req->email]);

    	  return response()
            ->json(array('msg'=>'success'), 200);
    }
     public function passwordi(Request $req,$id)
    {
    	 DB::table('users')->where('userId',"=", $id)
			                        ->update(['password'=>$req->password]);

    	  return response()
            ->json(array('msg'=>'success'), 200);
    }
     public function locationi(Request $req,$id)
    {
			DB::table('users')->where('userId',"=", $id)
			                        ->update(['location'=>$req->location]);
          
          
    	  return response()
            ->json(array('msg'=>'success'), 200);
    }

   
}

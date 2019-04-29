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
   public function newsUpload(Request $req){
      DB::table("news")->insert([
          "title"=>$req->title,
          "msg"=>$req->msg,
          "userId"=>$req->session()->get("userId")
      ]);

      return response()
      ->json(array('msg'=>'success'), 200);
   }

   public function getNews(Request $req){
    $data = DB::table("news")->get();
    return response()
    ->json(array('msg'=>'success','data'=>$data), 200);
 }


    }




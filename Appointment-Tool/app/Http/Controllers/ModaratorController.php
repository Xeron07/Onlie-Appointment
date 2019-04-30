<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ModaratorController extends Controller
{
    //

    public function Index(){
        $news= DB::table('news')->get();
        return view("modarator.index")->with("news",$news);
    }

    public function Users(){
        $news= DB::table('users')->get();
        return view("modarator.users")->with("news",$news);
    }

    public function newsUpdate($id){
       $news= DB::table('news')->where("id","=",$id)->first();
        return view("modarator.newsUpdate")->with("news",$news);
    }

    public function userUpdate($id){
        $news= DB::table('users')->where("userId","=",$id)->first();
         return view("modarator.userUpdate")->with("user",$news);
     }
}

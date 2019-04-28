<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Login extends Controller
{
    //
    public function Index(){
       return view("Login.index");
    }

    public function Log(Request $req){
          $user=\App\Users::where('email',$req->email)
          ->where('password',$req->lpass)
          ->first();
          if($user){
                $req->session()->flash('msg','login Success');
                $req->session()->put('user',$user);
                $req->session()->put('userId',$user->userId);
                return redirect("/home");
          }else{
              $req->session()->flash('msg','invalid username or password');
          }
          return redirect('/'); 
    }

}

?>
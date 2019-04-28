<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;


class HomeController extends Controller
{
    //

    public function Index(){
        return view('home.index');
    }

    public function profile(Request $req){
        $user=DB::table("users")
                       ->where("userId","=",$req->session()->get("userId"))
                       ->first();
        return view('home.profile')->with("user",$user);

    }

    public function calender()
    {
        return view('home.calender');
    }

    public function addAppointment(){
      
        return view('home.addAppointment');
    }

    public function todo(){
        return view('home.toDo');
    }
}

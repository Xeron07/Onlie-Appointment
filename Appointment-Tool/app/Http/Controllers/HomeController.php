<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class HomeController extends Controller
{
    //

    public function Index(){
        return view('home.index');
    }

    public function profile(){
        return view('home.profile');

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

<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    //
    public function Index(){
        return view("registration.index");
    }

    public function verify(Request $req){
         if($req->pass==$req->rpass){
            DB::table('users')->insert(
                [
                    'name'=>$req->name,
                    'email' => $req->email,
                    'password'=>$req->pass,
                    'job'=>$req->job,
                    'location'=>$req->location

                ]
            );
            return redirect('/login');
         }
         else{
             $req->session()->flash('msg','Password Does not matched');
             return redirect('/registration');
         }
    }
}

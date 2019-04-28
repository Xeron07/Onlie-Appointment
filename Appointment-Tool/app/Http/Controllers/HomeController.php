<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
<<<<<<< HEAD
=======

>>>>>>> cdd038ab9cdd10054b077117399d87b02a4cba54
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

    public function calender(Request $req)
    {
        $data=DB::table("appointments")
        ->join("users","appointments.userId","=","users.userId")
        ->where("users.userId","<>",$req->session()->get("userId"))
        ->select("users.*","appointments.*")
        ->get();
  
        // ->where("u.userId","<>",$req->session()->get("userId"))
        
        return view('home.calender')->with("data",$data);
    }

    public function addAppointment(){
      
        return view('home.addAppointment');
    }

    public function todo(){
        return view('home.toDo');
    }

    public function addApp(Request $req){
        DB::table("appointments")->insert([
            'title'=>$req->title,
            'time'=>$req->time,
            'date'=>$req->date,
            'duration'=>$req->duration,
            'perSesssion'=>$req->perSession,
            'location'=>$req->location,
            'totalSession'=>$req->ses,
            'userId'=>$req->session()->get("userId")
        ]);

        return response()
            ->json(array('msg'=>'success','data'=>$req->ses), 200);
    }

    public function getJobs(Request $req)
    {
        $data=DB::table("appointments")
        ->join("users","appointments.userId","=","users.userId")
        ->where("users.job","=",$req->job)
        ->select("users.*","appointments.*")
        ->get();

        return response()
        ->json(array('msg'=>'success','data'=>$data), 200);
    }
     
    public function setRequest(Request $req){
        DB::table("request")->insert([
            'requesterId'=>$req->session()->get("userId"),
            'appointerId'=>$req->appUserId,
            'active'=>0,
            'aId'=>$req->appId
        ]);
        return response()
        ->json(array('msg'=>'success'), 200);

    }



    public function getLocations(Request $req)
    {
        $data=DB::table("appointments")
        ->join("users","appointments.userId","=","users.userId")
        ->where("appointments.location","=",$req->location)
        ->select("users.*","appointments.*")
        ->get();
          
        return response()
        ->json(array('msg'=>'success','data'=>$data), 200);

    }
}

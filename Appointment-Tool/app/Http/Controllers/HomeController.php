<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;



class HomeController extends Controller
{
    //

    public function Index(Request $req){
        if($req->session()->get("job")=="modarator"){
              return redirect("/home/profile");
        }else{
           
            $data=DB::table("users")
            ->join("request","request.requesterId","=","users.userId")
            ->join("appointmentList","appointmentList.aiId","=","request.aId")
            ->where("users.userId","=",$req->session()->get("userId"))
            ->select("users.*","appointmentList.startTime","appointmentList.duration","appointmentList.serial","appointmentList.date","request.*")
            ->get();
    
            $list=DB::table("request")
            ->join("appointmentList","appointmentList.aiId","=","request.aId")
            ->join("appointments","appointments.aId","=","appointmentList.aId")
            ->join("users","users.userId","=","appointments.userId")
            ->where("request.active","=","1")
            ->where("request.requesterId","=",$req->session()->get("userId"))
            ->select("appointmentList.*","request.*","appointments.*","users.*")
            ->orderBy("request.rid",'DESC')
            ->get();
            
            return view('home.index')->with("data",$data)->with("dList",$list);

        }
       
    }

    public function profile(Request $req){
        $user=DB::table("users")
                       ->where("userId","=",$req->session()->get("userId"))
                       ->first();
        return view('home.profile')->with("user",$user);

    }

    public function calender(Request $req)
    {
        $data=DB::table("appointmentList")
        ->join("users","appointmentList.userId","=","users.userId")
        ->where("users.userId","<>",$req->session()->get("userId"))
        ->select("users.*","appointmentList.*")
        ->get();

        $jobLocation=DB::table("appointmentList")
        ->join("users","appointmentList.userId","=","users.userId")
        ->where("users.userId","<>",$req->session()->get("userId"))
        ->select("users.job","users.location")
        ->distinct()
        ->get();
  
        // ->where("u.userId","<>",$req->session()->get("userId"))
        
        return view('home.calender')->with("data",$data)->with("jData",$jobLocation);
    }

    public function addAppointment(){
      
        return view('home.addAppointment');
    }

    public function todo(Request $req){
        $data=DB::table("appointmentList")
        ->join("request","request.aId","=","appointmentList.aiId")
        ->join("users","users.userId","=","request.requesterId")
        ->where("request.active","=",0)
        ->where("request.appointerId","=",$req->session()->get("userId"))
        ->select("request.*","appointmentList.*","users.*")
        ->get();


        return view('home.toDo')->with("data",$data);
    }

    public function addApp(Request $req){
       $aId= DB::table("appointments")->insertGetId([
            'title'=>$req->title,
            'time'=>$req->time,
            'date'=>$req->date,
            'duration'=>$req->duration,
            'perSesssion'=>$req->perSession,
            'location'=>$req->location,
            'totalSession'=>$req->ses,
            'userId'=>$req->session()->get("userId")
        ]);

        foreach($req->timeArray as $data){
            DB::table("appointmentList")->insert([
                'userId'=>$req->session()->get("userId"),
                'startTime'=>$data['startTime'],
                'duration'=>$data['duration'],
                'serial'=>$data['serial'],
                'active'=>$data['active'],
                'date'=>$data['date'],
                'aId'=>$aId
                
            ]);
        }

        return response()
            ->json(array('msg'=>'success','data'=>$req->ses), 200);
    }

    public function getJobs(Request $req)
    {
        $data=DB::table("appointmentList")
        ->join("users","appointmentList.userId","=","users.userId")
        ->where("users.job","=",$req->job)
        ->select("users.*","appointmentList.*")
        ->get();

        return response()
        ->json(array('msg'=>'success','data'=>$data), 200);
    }

    public function getUpdateData(Request $req)
    {
        $data=DB::table("appointmentList")
        ->join("users","appointmentList.userId","=","users.userId")
        ->select("users.*","appointmentList.*")
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
        $data=DB::table("appointmentList")
        ->join("users","appointmentList.userId","=","users.userId")
        ->where("users.location","=",$req->location)
        ->select("users.*","appointmentList.*")
        ->get();
          
        return response()
        ->json(array('msg'=>'success','data'=>$data), 200);

    }


    public function accept(Request $req){
        DB::table("appointmentList")
        ->where("aiId","=",$req->aid)
        ->update(["active"=>1]);

        DB::table("request")
        ->where("rid","=",$req->rid)
        ->update(["active"=>1]);

        return response()
        ->json(array('msg'=>'success'), 200);
    }

    public function cancel(Request $req){
        DB::table("appointmentList")
        ->where("aiId","=",$req->aid)
        ->update(["active"=>3]);

        DB::table("request")
        ->where("rid","=",$req->rid)
        ->update(["active"=>3]);

        return response()
        ->json(array('msg'=>'success'), 200);
    }
}

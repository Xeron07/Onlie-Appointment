<!DOCTYPE HTML>
<html>

<head>
  <title>shadowplay_1 - contact us</title>
  <meta name="description" content="website description" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />

    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- sweetalert 2-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<link href="{{ asset('css/home/style.css') }}" rel="stylesheet"/>
</head>

<body onmousemove="addTimeVal()">
  <div id="main">
    <div id="header">
      <div id="logo">
      <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
          <h1 data-toggle="tooltip" title="Yoyaku Online"><a href="/home">予約<span class="logo_colour">Online</span></a></h1>
          <h2>Easy. Simple. Online Appointment.</h2>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li ><a href="/home">Home</a></li>
          <li><a href="/home/profile">Profile</a></li>
          <li><a href="/home/addAppointment">Add Appointment </a></li>
          <li><a href="/home/todo">To Do</a></li>
          <li class="selected"><a href="/home/calender">Calender</a></li>
          @if(Session::get('job')=="admin")
          <li><a href="/admin">Admin Panel</a></li>
          @endif
          <li><a href="/logout">Logout</a></li>
        </ul>
      </div>
    </div>
    <div class="container">
    <br/>
    <br/><br/><br/>


      <div class="row">
        <input type="text" id="search" class="form-control col-sm-3" width="20%" placeholder="Search">&nbsp;&nbsp;&nbsp;
        <select class="form-control col-sm-3" width="20%" id="selectJob" onchange="getJob(this.value)">
        <option value="" selected disabled hidden>Search By job</option>
          @foreach($jData as $jobData)
          <option>{{$jobData->job}}</option>
          @endforeach
        </select>&nbsp;&nbsp;&nbsp;
        <select class="form-control col-sm-3" width="20%" id="selectLocation" onchange="getLocation(this.value)">
        <option value="" selected disabled hidden>Search By Location</option>
        @foreach($jData as $locData)
          <option>{{$locData->location}}</option>
          @endforeach
        </select>
      </div>
       
       <div id="ta">
       <table class="table table-dark table-striped">
    <thead>
      <tr>
        <th>Appointer Name</th>
        <th>Email</th>
        <th>Location</th>
        <th>Date</th>
        <th>Time</th>
        <th>Duration</th>
        <th>Occupation</th>
        <th>Operation</th>
      </tr>
    </thead>
    <tbody id="dataTable">
     @foreach($data as $d)
      <tr>
       <td>{{$d->name}}</td>
       <td>{{$d->email}}</td>
       <td>{{$d->location}}</td>
       <td>{{$d->date}}</td>
       <td>{{$d->startTime}}</td>
       <td>{{$d->duration}}</td>
       <td>{{$d->job}}</td>
       <td><button class="btn btn-outline-info" onclick="requestAppointment('{{$d->aiId}}','{{$d->userId}}')">Accept</button></td>
      </tr>
      @endforeach
    </tbody>
  </table>
       </div>

    </div>


</body>
<script>
 var iTime=7;

 $(document).ready(function(){
  $("#search").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#dataTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });

  checkTime();
});


 function getJob(jobString){
  var str="";
  $.ajax({
           method:"POST",
           url:"/home/getJobs",
           data:{job:jobString},
           headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
           success:(result)=>{
             if(result.msg=="success"){
                       
                      for(var i=0;i<result.data.length;i++)
                      {
                        str +="<tr><td>"+result.data[i].name+"</td><td>"+result.data[i].email+"</td><td>"+result.data[i].location+"</td><td>"+result.data[i].date+"</td><td>"+result.data[i].startTime+"</td><td>"+result.data[i].duration+"</td><td>"+result.data[i].job+"</td><td><button class=\"btn btn-outline-info\" onclick=\"requestAppointment('"+result.data[i].aiId+"','"+result.data[i].userId+"')\">Accept</button></td></tr>";
                      }
               $("#dataTable").html(str);
               $("#selectLocation").val("");

             }
           },
           error:(err)=>{
             //Swal.fire(err);
             console.log(err);
           }
        });
 }
 function getLocation(locationString){
         
      var str="";

  $.ajax({
           method:"POST",
           url:"/home/getLocations",
           data:{location:locationString},
           headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
           success:(result)=>{
             if(result.msg=="success"){
                       
                      for(var i=0;i<result.data.length;i++)
                      {
                        str +="<tr><td>"+result.data[i].name+"</td><td>"+result.data[i].email+"</td><td>"+result.data[i].location+"</td><td>"+result.data[i].date+"</td><td>"+result.data[i].startTime+"</td><td>"+result.data[i].duration+"</td><td>"+result.data[i].job+"</td><td><button class=\"btn btn-outline-info\" onclick=\"requestAppointment('"+result.data[i].aiId+"','"+result.data[i].userId+"')\">Accept</button></td></tr>";
                      }
               $("#dataTable").html(str);
               $("#selectJob").val("");
             }
           },
           error:(err)=>{
             //Swal.fire(err);
             console.log(err);
           }
        });
 }

 function requestAppointment(aId,appUserId)
 {
  
  $.ajax({
           method:"POST",
           url:"/home/request",
           data:{appId:aId,appUserId:appUserId},
           headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
           success:(result)=>{
             if(result.msg=="success"){
                   Swal.fire("","Request sent","success");
             }
           },
           error:(err)=>{
             //Swal.fire(err);
             console.log(err);
           }
        });
 }

 function checkTime(){
   setTimeout(() => {
    //refreshData();
   }, 5000);
 }
 
 function  refreshData(){
  var str="";

    $.ajax({
           method:"POST",
           url:"/home/getUpdateData",
           headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
           success:(result)=>{
             if(result.msg=="success"){
                       
                      for(var i=0;i<result.data.length;i++)
                      {
                        str +="<tr><td>"+result.data[i].name+"</td><td>"+result.data[i].email+"</td><td>"+result.data[i].location+"</td><td>"+result.data[i].date+"</td><td>"+result.data[i].startTime+"</td><td>"+result.data[i].duration+"</td><td>"+result.data[i].job+"</td><td><button class=\"btn btn-outline-info\" onclick=\"alert('"+result.data[i].aiId+"')\">Accept</button></td></tr>";
                      }
                     
 
               $("#dataTable").html(str);
        

               iTime=7;
             }
           },
           error:(err)=>{
             //Swal.fire(err);
             console.log(err);
           }
        });
 }

 function addTimeVal()
{
  iTime=7;
}
</script>
</html>

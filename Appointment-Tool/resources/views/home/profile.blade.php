<!DOCTYPE HTML>
<html>

<head>
  <title>Profile</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>bootstrap.min.css">

<link href="{{ asset('css/home/style.css') }}" rel="stylesheet"/>

</head>

<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
          <h1><a href="/home">予約<span class="logo_colour">Online</span></a></h1>
          <h2>Easy. Simple. Online Appointment.</h2>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li ><a href="/home">Home</a></li>
          <li class="selected"><a href="/home/profile">Profile</a></li>
          <li><a href="/home/addAppointment">Add Appointment </a></li>
          <li><a href="/home/todo">To Do</a></li>
          <li><a href="/home/calender">Calender</a></li>
          <li><a href="/logout">Logout</a></li>
        </ul>
      </div>
    </div>
    <div id="content_header"></div>
    

<div class="container">
  <div class="jumbotron">
    <h2>Welcome {{$user->name}}</h2>      
    <p>{{$user->email}}</p>
  </div>
  <div class="container">          
  <table class="table table-striped">
    <tbody>
      <tr>
        <td style="font-size:20px">Name</td>
        <td><input type="text" class="form-control" value="{{$user->name}}" disabled></td>
        <td><button type="button" class="btn btn-success" onclick="changeName()">Change</button></td>
      </tr>
      <tr>
        <td style="font-size:20px">Email</td>
        <td><input type="text" class="form-control" value="{{$user->email}}" disabled></td>
        <td><button type="button" class="btn btn-success" onclick="changeEmail()">Change</button></td>
      </tr>
      <tr>
        <td style="font-size:20px">Password</td>
        <td><input type="password" class="form-control" value="{{$user->password}}" disabled></td>
        <td><button type="button" class="btn btn-success" onclick="changePass()">Change</button></td>
      </tr>
       <tr>
        <td style="font-size:20px">Location</td>
        <td><input type="text" class="form-control" value="{{$user->location}}" disabled></td>
        <td><button type="button" class="btn btn-success" onclick="changeLoc()">Change</button></td>
      </tr>
    </tbody>
  </table>
</div>      
</div>


        
    </div>
    <div id="content_footer"></div>
    <div id="footer">
      <p><a href="index.html">Home</a> | <a href="examples.html">Examples</a> | <a href="page.html">A Page</a> | <a href="another_page.html">Another Page</a> | <a href="contact.html">Contact Us</a></p>
      <p>Copyright &copy; shadowplay_1 | <a href="http://validator.w3.org/check?uri=referer">HTML5</a> | <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a> | <a href="http://www.html5webtemplates.co.uk">Free CSS Templates</a></p>
    </div>
  </div>
</body>


<script>
 function changeName(){
    var n = prompt("Please enter your name");

if (n!= null) {
  $.ajax({
           method:"POST",
           url:"/update/name",
           data:{name:n},
           headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
           success:(result)=>{
             if(result.msg=="success"){
                       console.log(result.data);
                     Swal.fire("","Name Updated","success").then((result)=>{
                          location.reload();
                     });
                     
             }
           },
           error:(err)=>{
             //Swal.fire(err);
             console.log(err);
           }
        });
}
 }

 function changeEmail(){
    var em = prompt("Please enter your email");

if (em != null) {
  $.ajax({
           method:"POST",
           url:"/update/email",
           data:{email:em},
           headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
           success:(result)=>{
             if(result.msg=="success"){
                       console.log(result.data);
                     Swal.fire("","Email Updated","success").then((result)=>{
                          location.reload();
                     });
                     
             }
           },
           error:(err)=>{
             //Swal.fire(err);
             console.log(err);
           }
        });
}
 }

 function changePass(){
var pass = prompt("Please enter your Password");
  if (pass != null) {
  $.ajax({
           method:"POST",
           url:"/update/password",
           data:{password:pass},
           headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
           success:(result)=>{
             if(result.msg=="success"){
                       console.log(result.data);
                     Swal.fire("","Password Updated","success").then((result)=>{
                          location.reload();
                     });
                     
             }
           },
           error:(err)=>{
             //Swal.fire(err);
             console.log(err);
           }
        });
}

 }

 function changeLoc(){
    var loc = prompt("Please enter your location");

if (loc != null) {

   $.ajax({
           method:"POST",
           url:"/update/location",
           data:{location:loc},
           headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
           success:(result)=>{
             if(result.msg=="success"){
                       console.log(result.data);
                     Swal.fire("","Location Updated","success").then((result)=>{
                          location.reload();
                     });
                     
             }
           },
           error:(err)=>{
             //Swal.fire(err);
             console.log(err);
           }
        });

}
 }
</script>

</html>

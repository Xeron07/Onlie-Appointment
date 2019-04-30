<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">予約 Online</a>
    </div>
    <ul class="nav navbar-nav">
    <li onclick="window.location.replace('/home')"><a >Home</a></li>
    <li onclick="window.location.replace('/modarator/users')"><a >Users</a></li>
      <li onclick="window.location.replace('/modarator')"><a >News</a></li>
      

    </ul>
  </div>
</nav>
  


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

 

</body>

<script type="text/javascript">


//bootstrap search //

function changeName(){
    var n = prompt("Please enter your name");

if (n!= null) {
  $.ajax({
           method:"POST",
           url:"/update/name/{{$user->userId}}",
           data:{name:n},
           headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
           success:(result)=>{
             if(result.msg=="success"){
                       console.log(result.data);
                     Swal.fire("","Name Updated","success").then((result)=>{
                          window.location.reload();
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
           url:"/update/email/{{$user->userId}}",
           data:{email:em},
           headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
           success:(result)=>{
             if(result.msg=="success"){
                       console.log(result.data);
                     Swal.fire("","Email Updated","success").then((result)=>{
                        window.location.reload();
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
           url:"/update/password/{{$user->userId}}",
           data:{password:pass},
           headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
           success:(result)=>{
             if(result.msg=="success"){
                       console.log(result.data);
                     Swal.fire("","Password Updated","success").then((result)=>{
                        window.location.reload();
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
           url:"/update/location/{{$user->userId}}",
           data:{location:loc},
           headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
           success:(result)=>{
             if(result.msg=="success"){
                       console.log(result.data);
                     Swal.fire("","Location Updated","success").then((result)=>{
                        window.location.reload();
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

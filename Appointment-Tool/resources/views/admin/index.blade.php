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
      <li onclick="openUser()"><a href="#">Users</a></li>
      <li onclick="openApp()"><a href="#">Appointments</a></li>
      <li onclick="openNews()"><a href="#">News</a></li>
      
    </ul>
  </div>
</nav>
  



<div class="container">

<div id="user" style="display:none">
</br>	
<input class="form-control" id="myInput1" type="text" placeholder="Search User..">
  <table class="table">
    <thead class="thead-light">
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Operation</th>
      </tr>
    </thead>
    <tbody id="myTable1">
     @foreach ($users as $user)
      <tr>
			<td>{{ $user->userId }}</td>
			<td>{{ $user->name}}</td>
			<td>{{ $user->email}}</td>
			<td><button type="button" class="btn btn-danger" onclick="deleteUserConfirm('{{ $user->userId }}')">Delete</button></td>
		</tr>
	@endforeach
    </tbody>
  </table>
</div>


<div id="app" style="display:none">
</br>
<input class="form-control" id="myInput2" type="text" placeholder="Search Appointment..">
  <table class="table">
    <thead class="thead-light">
      <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Location</th>
        <th>Operation</th>
      </tr>
    </thead>
    <tbody id="myTable2">
     @foreach ($apps as $app)
      <tr>
			<td>{{ $app->aId }}</td>
			<td>{{ $app->title}}</td>
			<td>{{ $app->location}}</td>
			<td><button type="button" class="btn btn-danger" onclick="deleteappConfirm('{{ $app->aId }}')">Delete</button></td>
		</tr>
	@endforeach
    </tbody>
  </table>


</div>

<div id="news" style="display:none">
   <b style="font-size:120%">Title</b>
   <br/>
   <input class="form-control col-sm-3" style="width:20%" id="myInput" type="text">
   <br/>
   <br/>
   <b style="font-size:120%">Message</b>
   <textarea rows="7" cols="35" class="form-control"></textarea>
   <br/>
   <button type="button" class="btn btn-success" onclick="changeName()">Publish</button>


</div>



</div>

 

</body>

<script type="text/javascript">
 var previous;

 $('document').ready(()=>{
    previous=$("#user");
    $("#user").css("display","block");
 });


 function openUser(){
       previous.css("display","none");
       previous.attr("class","");
       $("#user").css("display","block");
       previous=$("#user");
 }

 function openApp(){
         previous.css("display","none");
       $("#app").css("display","block");
       previous=$("#app");
}
       function openNews(){
         previous.css("display","none");
       $("#news").css("display","block");
       previous=$("#news");
 }

//bootstrap search //

$(document).ready(function(){
  $("#myInput1").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable1 tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

$(document).ready(function(){
  $("#myInput2").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable2 tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

function deleteUserConfirm(id){
	Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.value) {
        deleteuser(id);  
}});

}

function deleteuser(id){
	 $.ajax({
           method:"POST",
           url:"/delete/user",
           data:{id:id},
           headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
           success:(result)=>{
             if(result.msg=="success"){
                       console.log(result.data);
                     Swal.fire("","User Deleted","success").then((result)=>{
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
  




function deleteappConfirm(id){
	Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.value) {
        deleteapp(id);  
}});

}

function deleteapp(id){
	 $.ajax({
           method:"POST",
           url:"/delete/appointment",
           data:{id:id},
           headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
           success:(result)=>{
             if(result.msg=="success"){
                       console.log(result.data);
                     Swal.fire("","Appointment Deleted","success").then((result)=>{
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

</script>
</html>

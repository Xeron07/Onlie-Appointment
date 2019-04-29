<!DOCTYPE html>
<html lang="en">
<head>
  <title>Modarator</title>
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
      <li><a >News</a></li>
      
      
    </ul>
  </div>
</nav>
  



<div class="container">

<div id="user" style="display:none">
<br/>	
<input class="form-control" id="myInput1" type="text" placeholder="Search User..">
  <table class="table">
    <thead class="thead-light">
      <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Operation</th>
      </tr>
    </thead>
    <tbody id="myTable1">
     @foreach ($news as $n)
      <tr>
			<td>{{ $n->id }}</td>
			<td>{{ $n->title}}</td>
			<td><button type="button" class="btn btn-info" onclick="window.location.replace('/modarator/news/update/{{$n->id}}')">Edit</button>
            <button type="button" class="btn btn-danger" onclick="deletenewsConfirm('{{$n->id}}')">Delete</button></td>
		</tr>
	@endforeach
    </tbody>
  </table>
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

function deletenewsConfirm(id){
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
        deletenews(id);  
}});

}

function deletenews(id){
	 $.ajax({
           method:"POST",
           url:"/modarator/delete/news",
           data:{id:id},
           headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
           success:(result)=>{
             if(result.msg=="success"){
                       console.log(result.data);
                     Swal.fire("","News Deleted","success").then((result)=>{
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

function newsPublish(){
    var t=$("#title").val();
    var msg=$("#msg").val();

    $.ajax({
           method:"POST",
           url:"/news/upload",
           data:{title:t,msg:msg},
           headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
           success:(result)=>{
             if(result.msg=="success"){
                       console.log(result.data);
                     Swal.fire("","News Uploaded","success").then((result)=>{
                         
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

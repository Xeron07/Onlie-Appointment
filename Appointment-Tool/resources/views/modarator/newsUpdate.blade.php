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
    <li ><a >News Update</a></li>
    <li onclick="window.location.replace('/modarator')"><a >News Update</a></li>

    </ul>
  </div>
</nav>
  



<div class="container">





<div id="news" >
   <b style="font-size:120%">Title</b>
   <br/>
   <input class="form-control col-sm-3" style="width:20%" id="title" type="text" value='{{$news->title}}'>
   <br/>
   <br/>
   <b style="font-size:120%">Message</b>
   <textarea rows="7" cols="35" class="form-control" id="msg" >{{$news->msg}}</textarea>
   <br/>
   <button type="button" class="btn btn-success" onclick="update('{{$news->id}}')">Publish</button>


</div>



</div>

 

</body>

<script type="text/javascript">


//bootstrap search //



function update(id){
	 $.ajax({
           method:"POST",
           url:"/modarator/update/news",
           data:{id:id,title:$("#title").val(),msg:$("#msg").val()},
           headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
           success:(result)=>{
             if(result.msg=="success"){
                       console.log(result.data);
                     Swal.fire("","news updated","success").then((result)=>{
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

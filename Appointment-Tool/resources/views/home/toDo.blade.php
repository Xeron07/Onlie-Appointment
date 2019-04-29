<!DOCTYPE HTML>
<html>

<head>
  <title>shadowplay_1 - another page</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
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

<body>
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
          <li class="selected"><a href="/home/todo">To Do</a></li>
          <li><a href="/home/calender">Calender</a></li>
          @if(Session::get('job')=="admin")
          <li><a href="/admin">Admin Panel</a></li>
          @endif
          <li><a href="/logout">Logout</a></li>
        </ul>
      </div>
    </div>
    <div id="content_header"></div>
    <div class="container">
    <h2><u>Request Recieve</u></h2>
  <table class="table table-dark table-striped">
    <thead>
      <tr>
      <th>Name</th>
      <th>Email</th>
        <th>Date</th>
        <th>StartTime</th>
        <th>Duration</th>
        <th>Serial</th>
        <th>Operation</th>
      </tr>
    </thead>
    <tbody>
      @foreach($data as $d)
      <tr>
      <td>{{$d->name}}</td>
      <td>{{$d->email}}</td>
      <td>{{$d->date}}</td>
      <td>{{$d->startTime}}</td>
      <td>{{$d->duration}}</td>
      <td>{{$d->serial}}</td>
      <td>
          <button class="btn btn-success" onclick="accept('{{$d->aiId}}','{{$d->rid}}')">Accept</button>
         <button class="btn btn-danger" onclick="cancel('{{$d->aiId}}','{{$d->rid}}')">Cancel</button></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
    <div id="content_footer"></div>
    <div id="footer">
      <p><a href="index.html">Home</a> | <a href="examples.html">Examples</a> | <a href="page.html">A Page</a> | <a href="another_page.html">Another Page</a> | <a href="contact.html">Contact Us</a></p>
      <p>Copyright &copy; shadowplay_1 | <a href="http://validator.w3.org/check?uri=referer">HTML5</a> | <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a> | <a href="http://www.html5webtemplates.co.uk">Free CSS Templates</a></p>
    </div>
  </div>
</body>
<script>
 function accept(aid,rid)
 {
  $.ajax({
           method:"POST",
           url:"/home/accept",
           data:{aid:aid,rid:rid},
           headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
           success:(result)=>{
             if(result.msg=="success"){
                       console.log(result.data);
                     Swal.fire("Yahoo00!!","Appointment Accepted","success").then((result)=>{
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

 function cancel(aid,rid){
  $.ajax({
           method:"POST",
           url:"/home/cancel",
           data:{aid:aid,rid:rid},
                      headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
           success:(result)=>{
             if(result.msg=="success"){
                       console.log(result.data);
                     Swal.fire("Ahem!!","Appointment Canceled ","success").then((result)=>{
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

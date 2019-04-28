<!DOCTYPE HTML>
<html>

 
<head>
  <title>Add Appointment</title>
 

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

  <script src="{{ asset('js/bootstrap-clockpicker.min.js') }}"></script>
  <script src="{{ asset('js/clockpicker.js') }}"></script>
  <link href="{{ asset('css/home/style.css') }}" rel="stylesheet"/>
  <link href="{{ asset('css/bootstrap-clockpicker.min.css') }}" rel="stylesheet"/>
  <link href="{{ asset('css/clockpicker.css') }}" rel="stylesheet"/>
  <link href="{{ asset('css/github.min.css') }}" rel="stylesheet"/>

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
          <li><a href="/home/profile">Profile</a></li>
          <li class="selected"><a href="/home/addAppointment">Add Appointment </a></li>
          <li><a href="/home/todo">To Do</a></li>
          <li><a href="/home/calender">Calender</a></li>
          <li><a href="/logout">Logout</a></li>
        </ul>
      </div>
    </div>
    <div  id="content_header"></div>
      <div class="container">
      <!-- calender -->
       <h2><u>  Today</u></h2>
       <div class="row" style="font-size:120%">
                <b>Date<div style="font-size:50%" id="todayDate"></div></b>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <b>Time<div style="font-size:50%" id="time"></div> </b></div>
              
      <br/>
      <br/>
      <br/>

      <h2><u>Add Appointment:</u></h2>

      <div>
         Enter Location: <input type="text" class="form-control" name="" id="location"/>
         <br/>
         
           Select date:    <input type="date"   class="form-control col-sm-4" name="" id="date"><br/>
        
           Select Time:<br/>   
            <input type="text" class="form-control col-sm-3" id="single-input" value="" placeholder="From">&nbsp;&nbsp;&nbsp; <input type="text" class="form-control col-sm-3" id="single-input2" value="" placeholder="To">
        
        <br/>
        <br/>
        Select Duration for each session:
         <input type="number" class="form-control" name="" id="duration" placeholder="Duration for each session">
         <br/>
         <br/>
         <br/>
         <button type="button" class="btn btn-outline-info btn-block" onclick="addAppointment()">Add</button>
   
      <br/>
      <br/>
      <br/>

      </div>
      <!--end-->
</div>
    <div id="content_footer"></div>
    <div id="footer">
      <p><a href="/home">Home</a> | <a href="examples.html">Examples</a> | <a href="page.html">A Page</a> | <a href="another_page.html">Another Page</a> | <a href="contact.html">Contact Us</a></p>
      <p>Copyright &copy; shadowplay_1 | <a href="http://validator.w3.org/check?uri=referer">HTML5</a> | <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a> | <a href="http://www.html5webtemplates.co.uk">Free CSS Templates</a></p>
    </div>
  </div>
</body>

<script>
 $('document').ready(()=>{
  
  timeNow();
 });

 function timeNow(){
    setTimeout(() => {
      var now = new Date();
      var dateString=now.getDate()+"-"+now.getMonth()+"-"+now.getFullYear();
    $("#todayDate").html(dateString);

    var timeString=now.getHours()+":"+now.getMinutes()+":"+now.getSeconds();
    $("#time").html(timeString);
    timeNow();
    }, 1000);
 }

 $('#single-input').clockpicker();
 $('#single-input2').clockpicker();

  function addAppointment(){
    var location=$("#location").val();
    var from =$("#single-input").val();
    var to=$("#single-input2").val();
    var farray=from.split(":");
    console.log(farray);
    Swal.fire(farray[0]);

  }

</script>

</html>

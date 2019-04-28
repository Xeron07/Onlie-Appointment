<!DOCTYPE HTML>
<html>

<head>
  <title>shadowplay_1</title>
  <meta name="description" content="website description" />
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
          <li class="selected"><a href="/home">Home</a></li>
          <li><a href="/home/profile">Profile</a></li>
          <li><a href="/home/addAppointment">Add Appointment </a></li>
          <li><a href="/home/todo">To Do</a></li>
          <li><a href="/home/calender">Calender</a></li>
          <li><a href="/logout">Logout</a></li>
        </ul>
      </div>
    </div>
    <div id="content_header"></div>
    <div id="site_content">
      <div class="sidebar">
        <!-- insert your sidebar items here -->
        <h3>Latest News</h3>
        <ul>
          <li><a href="#">link 1</a></li>
          <li><a href="#">link 2</a></li>
          <li><a href="#">link 3</a></li>
          <li><a href="#">link 4</a></li>
        </ul>
        <h3>Search</h3>
        <form method="post" action="#" id="search_form">
          <p>
            <input class="search" type="text" name="search_field" value="Enter keywords....." />
            <input name="search" type="image" style="border: 0; margin: 0 0 -9px 5px;" src="style/search.png" alt="Search" title="Search" />
          </p>
        </form>
      </div>
      <div id="content">
        <!-- insert the page content here -->
        <h1>Welcome to the 予約 online 😄</h1>
        <br>
        <h2>Upcoming Events:</h2>
        <div id="eventsComing"></div>


      </div>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
      <p><a href="index.html">Home</a> | <a href="examples.html">Examples</a> | <a href="page.html">A Page</a> | <a href="another_page.html">Another Page</a> | <a href="contact.html">Contact Us</a></p>
      <p>Copyright &copy; shadowplay_1 | <a href="http://validator.w3.org/check?uri=referer">HTML5</a> | <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a> | <a href="http://www.html5webtemplates.co.uk">Free CSS Templates</a></p>
    </div>
  </div>
  <audio id="bgsound">
  <source src="{{asset('sound/bgSound.mp3')}}" type="audio/mpeg">
  </audio>
  <audio id="hs1">
  <source src="{{asset('sound/home.mp3')}}" type="audio/mpeg">
  </audio>
  <audio id="hs2">
  <source src="{{asset('sound/home2.mp3')}}" type="audio/mpeg">
  </audio>
</body>
<script>
  $('document').ready(()=>{
   
      setTimeout(playBgSound, 1000);

  });

  function playBgSound(){
    var bgS=$("#bgsound");
    var bgsound=new Audio("{{asset('sound/bgSound.mp3')}}");
     bgsound.play();
    bgS[0].play();
    setTimeout(playHomeSound, 3000);

    bgS[0].pause();
  }

  function playHomeSound(){
    var home1=new Audio();
    var hs1=$("#hs1");
    hs1[0].play();
    setTimeout(playHome2Sound, 2000);
  } 

  function playHome2Sound(){
    var home2 =new Audio();
    var hs2=$("#hs2");
    hs2[0].play();
  }
</script>
</html>

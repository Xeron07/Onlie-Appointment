<!DOCTYPE html>
<html>
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<link href="{{ asset('css/login/index.css') }}" rel="stylesheet"/>
<script type="text/javascript" src="{{ asset('js/login/index.js') }}"></script> 


<body>

@if(Session::has('msg'))
    <script>Swal.fire("Ahem!"," {{ session( 'msg' ) }} ","error")</script>
@endif


<div class="materialContainer">

   <div class="box">
  
      <div class="title">LOGIN</div>
<form action="/login" method="POST">
    <input type="hidden" name="_token" value=" {{ csrf_token() }} ">
      <div class="input">
         <label for="email">Email</label>
         <input type="text" name="email" id="email" required>
         <span class="spin"></span>
      </div>

      <div class="input">
         <label for="lpass">Password</label>
         <input type="password" name="lpass" id="lpass" required>
         <span class="spin"></span>
      </div>

      <div class="button login">
         <button type="submit"><span>GO</span> <i class="fa fa-check"></i></button>
      </div>
</form>
      <a href="" class="pass-forgot">Forgot your password?</a>
   </div>
</div>
</body>

</html>



<!-- Username: dGKFDo2WuK

Password: SQepjlncIW

Database Name: dGKFDo2WuK

Server: remotemysql.com

Port: 3306 -->
<html>
  <head>
    <link rel="stylesheet" href="{{asset('assets/css/login/login.css')}}">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>

ul {
  list-style-type: none;
  width: 15%;
  background-color: #f1f1f1;
  position: fixed;
  height: 100%;
  overflow: auto;
}

li a {
  display: block;
  color: #000;
  padding: 8px 16px;
  text-decoration: none;
}

li a.active {
  background-color: #4CAF50;
  color: white;
}

li a:hover:not(.active) {
  background-color: #555;
  color: white;
}
</style>

  <body>
    <nav class="navbar navbar-expand-lg navbar-light "  style="background-color: #99afdc">
        <a class="navbar-brand mb-0 h1" href=""><img id="" src="{{asset('assets/image/logo.png')}}" width="120" height="60" /></a>
        <a class="btn btn-primary ml-md-auto d-none d-md-flex" style="" href="{{url('/login')}}">Login</a>
    </nav>
    <ul>
        <li><a href="{{url('/login')}}">เข้าสู่ระบบ</a></li>
        <li><a href="#news">ปฏิทินกิจกรรม</a></li>
    </ul>
  </div>
  
  </body>  
</html>

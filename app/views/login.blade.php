@section('title')
    login
@stop
<html>
  <head>
    <link rel="stylesheet" href="{{asset('assets/css/login/login.css')}}">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>
    body{
        background-color: #ffffff;
    }
    h2 {
        text-align: center;
        text-transform: uppercase;
        margin:30px;
    }

</style>
  </head>

    <body id="LoginForm">
        <h2>ระบบจัดการกิจกรรมหลักสูตรวิศวกรรมซอฟต์แวร์</h2>
        <div class="container"></div>
            <div class="login-form">
             <div class="main-div">
                <div class="panel">
                    <a class="pagelogin" href=""><img id="" src="{{asset('assets/image/logo.png')}}" width="230" height="100" /></a>
                     @include('error')
                </div>
                    <form method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" name="username" id="inputUsername" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Password">
                        </div>

                         <button type="submit" class="btn btn-primary">Login</button>
                        
                    </form>
                 </div>
            </div>
        </div>
    </body>
</html>

<html>
  <head>
    <link rel="stylesheet" href="{{asset('assets/css/login/login.css')}}">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>
body {

}

.sidenav {
  height: 100%;
  width: 125px;
  position: fixed;
  z-index: 1;
  background-color:#e9ecef;
  overflow-x: hidden;
  padding-top: 20px;
}

.sidenav a {
  font-size: 16px;
  color: #050606;
  display: block;
  padding: 6px 8px 6px 16px;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.affix {
            top: 0;
            width: 100%;
            z-index: 9999 !important;
        }

        .affix + main {
            padding-top: 70px;
        }

</style>

  <body>
    <nav class="navbar navbar-expand-lg navbar-light "  style="background-color: #99afdc">
        <a class="navbar-brand mb-0 h1" href=""><img id="" src="{{asset('assets/image/logo.png')}}" width="120" height="60" /></a>
        <!-- <a class="btn btn-primary ml-md-auto d-none d-md-flex" style="" href="{{url('/login')}}">Login</a> -->
    </nav>

      <div class="sidenav">
        <a href="{{url('/login')}}">เข้าสู่ระบบ</a>
        <a href="#services">ปฏิทินกิจกรรม</a>
      </div>
    <div class="container">
      <br>
      <h2>ข่าวกิจกรรม</h2>
        <div class="container">
          <div class="row">
            <div class="col-sm">
              <div class="card" style="margin-top:30px; width: 20rem; height:10rem; ">
                <img class="card-img-top"  src="{{asset('assets/image/swe.jpg')}}" width="200" height="200"  alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">ค่าย 4 ชั้นปี</h5>
                  <p class="card-text">การเขียนโปรแกรมเพื่อเพิ่มทักษะความรู้ด้านการพัฒนาโปรแกรม</p>
                  <a href="#" class="btn btn-primary">เพิ่มเติม</a>
                </div>
              </div>
            </div>
            <div class="col-sm">
              <div class="card" style="margin-top:30px; width: 20rem; height:10rem; ">
                <img class="card-img-top"  src="{{asset('assets/image/logo.png')}}" width="200" height="200"  alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">ค่าย Scrum</h5>
                  <p class="card-text">การอบรมการทำงานแบบ scrum เพื่อนำไปใช้มนการทำงานแบบทีม</p>
                  <a href="#" class="btn btn-primary">เพิ่มเติม</a>
                </div>
               </div>
            </div>
            <div class="col-sm">
              <div class="card" style="margin-top:30px; width: 20rem; height:10rem; ">
                <img class="card-img-top"  src="{{asset('assets/image/se4.jpg')}}" width="200" height="200"  alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">เที่ยว4ชั้นปี</h5>
                  <p class="card-text">การพานักศึกษา4ชั้นปีไปพักผ่อนและทำกิจกรรมร่วมกันภายในหลักสูตร</p>
                  <a href="#" class="btn btn-primary">เพิ่มเติม</a>
                </div>
               </div>
            </div>
          </div>
        </div>  









        


    </div>
  </body>  
</html>

<html>
   <head>
      <title>@yield('title')</title>
      <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
      @yield('cdn')
   </head>
   <body>
       <?php
       if(Auth::user()->teacher != null) {
           Auth::user()->type = 'teacher';
       } else {
           Auth::user()->type = 'student';

       }

        ?>
      <!-- Image and text -->
          <nav class="navbar navbar-expand-lg navbar-light "  style="background-color: #99afdc">
              <a class="navbar-brand mb-0 h1" href=""><img id="" src="{{asset('assets/image/logo.png')}}" width="120" height="60" /></a>
            <div class="collapse navbar-collapse" id="navbarNavDropdown" style="margin-top:30px">
              <ul class="navbar-nav my-lg-0">
                <li class="nav-item active">
                  <a class="nav-link" href="{{url('/home')}}">หน้าหลัก <span class="sr-only">(current)</span></a>
                </li>
              </ul>
              @if(Auth::check())
                  @if(Auth::user()->type == "student")
              <ul class="navbar-nav my-lg-0">
                  <li class="nav-item dropdown {{ Request::is('profile/*') ? 'active' : ''}}">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     โปรไฟล์นักศึกษา
                    </a>
                  <div class="dropdown-menu"  aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="{{url('/profile')}}">โปรไฟล์นักศึกษา</a>
                    <a class="dropdown-item" href="{{url('/profile/edit')}}">แก้ไขโปรไฟล์นักศึกษา</a>
                    <a class="dropdown-item" href="{{url('/profile/upload-avatar')}}">เปลี่ยนรูปโปรไฟล์</a>
                  </div>
                  </li>
              </ul>
            @else

              <ul class="navbar-nav my-lg-0">
                  <li class="nav-item dropdown {{ Request::is('profile/*') ? 'active' : ''}}">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     ข้อมูลส่วนตัว
                    </a>
                  <div class="dropdown-menu"  aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="{{url('/profile')}}">โปรไฟล์ส่วนตัว</a>
                    <a class="dropdown-item" href="{{url('/profile/edit')}}">แก้ไขโปรไฟล์</a>
                    <a class="dropdown-item" href="{{url('/profile/upload-avatar')}}">เปลี่ยนรูปโปรไฟล์</a>
                  </div>
                  </li>
              </ul>
          @endif

          @if(Auth::check())
              @if(Auth::user()->type != "student")
              <ul class="navbar-nav my-lg-0">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  จัดการกิจกรรม
                  </a>
                  <div class="dropdown-menu"  aria-labelledby="navbarDropdownMenuLink">
                      <a class="dropdown-item" href="{{url('/manage/activity/add')}}">สร้างกิจกรรม</a>
                      <a class="dropdown-item" href="{{url('/manage/activity/summary/useradd')}}">กิจกรรมที่รับผิดชอบ</a>
                      <a class="dropdown-item" href="{{url('/manage/activity/summary')}}">กิจกรรมทั้งหมด</a>
                      <a class="dropdown-item" href="{{url('/manage/activity/conclude')}}">สรุปการเข้าร่วมกิจกรรม</a>
                  </div>
                </li>
              </ul>
              <ul class="navbar-nav my-lg-0">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  จัดการผู้ใช้งาน
                  </a>
                  <div class="dropdown-menu"  aria-labelledby="navbarDropdownMenuLink">
                      <a class="dropdown-item" href="{{url('/manage/user/student')}}">นักศึกษา</a>
                      <a class="dropdown-item" href="{{url('/manage/user/teach')}}">อาจารย์</a>
                      <a class="dropdown-item" href="{{url('/manage/user/president')}}">ประธานหลักสูตร</a>
                      @if(Auth::user()->roleID == 2)
                      <a class="dropdown-item" href="{{url('/manage/user/admin')}}">ผู้ดูแลระบบ</a>
                        @endif
                  </div>
                </li>
              </ul>
          @endif
          @endif
              <ul class="login navbar-nav ml-md-auto d-none d-md-flex" style="margin-left:50px">
                <li class="nav-item dropdown ">
                @if(Auth::user()->teacher != NULL)
                  <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::user()->teacher->firstname}} {{Auth::user()->teacher->lastname}}</a>
              @else
                   <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::user()->student->firstname}} {{Auth::user()->student->lastname}}</a>
              @endif
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                      <a class="dropdown-item" href="{{url('/profile/edit')}}">แก้ไขโปรไฟล์</a>
                      <a class="dropdown-item" href="{{url('/logout')}}">ออกจากระบบ</a>
                  <div>
                </li>
              </ul>

          @endif

            </div>
          </nav>
      <div class="container">
         @yield('content')
      </div>
   </body>
</html>

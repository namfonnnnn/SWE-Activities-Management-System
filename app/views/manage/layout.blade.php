<?php
 $login_name = '';

 if(!is_null(Auth::user()->getFullName())){
   $login_name = Auth::user()->getFullName();
 }
?>
<!doctype html>
<html class="no-js h-100" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <!-- <meta name="description" content="A high-quality &amp; free Bootstrap admin dashboard template pack that comes with lots of templates and components."> -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" id="main-stylesheet" data-version="1.1.0" href="{{asset('assets/shards-dashboard/styles/shards-dashboards.1.1.0.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/shards-dashboard/styles/extras.1.1.0.min.css')}}">
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    @yield('cdn')
  </head>
  <body class="h-100">
    <div class="container-fluid">
      <div class="row">
        <!-- Main Sidebar -->
        <aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
          <div class="main-navbar">
            <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
              <a class="navbar-brand w-100 mr-0" href="{{url('manage')}}" style="line-height: 25px;">
                <div class="d-table m-auto">
                  <img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 100%; height: 47px" src="{{asset('assets/image/logo.png')}}" alt="Shards Dashboard">
                  <span class="d-none d-md-inline ml-1">Software Engineering</span>
                </div>
              </a>
              <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
                <i class="material-icons">&#xE5C4;</i>
              </a>
            </nav>
          </div>
          <div class="nav-wrapper">
            <ul class="nav flex-column">

              <li class="nav-item">
                <a class="nav-link {{ Request::is('profile') ? 'active' : '' }}" href="{{url('/teacher')}}">
                   <i class="material-icons">person</i>
                   <span >ข้อมูลอาจารย์</span>
               </a>
              </li>
              <li class="nav-item">
               <a class="nav-link {{ Request::is('profile') ? 'active' : '' }}" href="{{url('/studentprofile')}}">
                  <i class="material-icons">person</i>
                  <span >ข้อมูลนักศึกษา</span>
              </a>
              </li>
              
              @if(Auth::user()->isTeacher())
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle " data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">local_activity</i>
                  <span>จัดการกิจกรรม</span>
                </a>
                <div class="dropdown-menu dropdown-menu-small" x-placement="bottom-start" style="display: none; position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-5px, 50px, 0px);">
                  <a class="dropdown-item {{ Request::is('manage/activity') ? 'active' : '' }}" href="{{url('manage/activity')}}">เพิ่มกิจกรรม</a>
                  <!-- <a class="dropdown-item {{ Request::is('manage/activity/add') ? 'active' : '' }}" href="{{url('manage/activity/add')}}">สร้างกิจกรรม</a> -->
                  <a class="dropdown-item {{ Request::is('manage/activity/summary/useradd') ? 'active' : '' }}" href="{{url('manage/activity/summary/useradd')}}">กิจกรรมที่รับผิดชอบ</a>
                  <a class="dropdown-item {{ Request::is('manage/activity/summary') ? 'active' : '' }}" href="{{url('manage/activity/summary')}}">กิจกรรมทั้งหมด</a>
                  @if(Auth::user()->isHeadTeacher())
                  <a class="dropdown-item {{ Request::is('manage/activity/conclude') ? 'active' : '' }}" href="{{url('manage/activity/conclude')}}">สรุปการเข้าร่วมกิจกรรม</a>
                  @endif
                </div>
              </li>
              @endif

              @if(Auth::user()->isAdmin())
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle " data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">people</i>
                  <span>จัดการผู้ใช้งาน</span>
                </a>
                <div class="dropdown-menu dropdown-menu-small" x-placement="bottom-start" style="display: none; position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-5px, 50px, 0px);">
                  <a class="dropdown-item " href="{{url('manage/user/student')}}">ข้อมูลนักศึกษา</a>
                  <a class="dropdown-item " href="{{url('manage/user/teacher')}}">ข้อมูลอาจารย์</a>
                </div>
              </li>
              @endif
            </ul>
          </div>
        </aside>
        <!-- End Main Sidebar -->
        <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
          <div class="main-navbar sticky-top bg-white">
            <!-- Main Navbar -->
            <nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
              <div class="w-100">

              </div>
              <ul class="navbar-nav border-left flex-row ">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <img class="user-avatar rounded-circle mr-2" src="{{asset('assets/shards-dashboard/images/avatars/3.jpg')}}" alt="User Avatar">
                    <span class="d-none d-md-inline-block">{{$login_name}}</span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-small">
                    <a class="dropdown-item" href="{{url('profile')}}">
                      <i class="material-icons">&#xE7FD;</i> โปรไฟล์</a>
                    <a class="dropdown-item" href="{{url('profile/edit')}}">
                      <i class="material-icons">vertical_split</i>แก้ไขข้อมูลส่วนตัว</a>
                    <a class="dropdown-item" href="{{url('resetpassword')}}">
                      <i class="material-icons">note_add</i> แก้ไขรหัสผ่าน</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="{{url('logout')}}">
                      <i class="material-icons text-danger">&#xE879;</i> ออกจากระบบ </a>
                  </div>
                </li>
              </ul>
              <nav class="nav">
                <a href="#" class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center border-left" data-toggle="collapse" data-target=".header-navbar" aria-expanded="false" aria-controls="header-navbar">
                  <i class="material-icons">&#xE5D2;</i>
                </a>
              </nav>
            </nav>
          </div>
          <!-- / .main-navbar -->
          <div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-12 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">@yield('subtitle')</span>
                <h3>@yield('title')</h3>
              </div>
            </div>
            @yield('content')
          </div>
          <!-- / .content -->
         

        </main>
      </div>
    </div>
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">ต้องการจะลบข้อมูลใช่หรือไม่?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
         
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
            <button type="button" class="btn btn-primary confirm">ลบ</button>
          </div>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="{{asset('assets/shards-dashboard/scripts/extras.1.1.0.min.js')}}"></script>
    <script src="{{asset('assets/shards-dashboard/scripts/shards-dashboards.1.1.0.min.js')}}"></script>
    <script type="text/javascript">
      const onPressOnlyThaiAndEng = (event) => {
        var eventCode = event.which;
		    if((eventCode >= 37 && eventCode <= 40) ||  eventCode == 8 || eventCode == 9 || eventCode == 46) { // Left  / Right Arrow, Backspace, Delete keys
		        return;
		    }
        let isThaiEng = /^[a-zก-๛]+$/ig.test(event.key)
        if(isThaiEng === false){
          event.preventDefault()
          return false;
        }
      }
      const onPressOnlyNumber = (event) => {
        var eventCode = event.which;
		    if((eventCode >= 37 && eventCode <= 40) ||  eventCode == 8 || eventCode == 9 || eventCode == 46) { // Left  / Right Arrow, Backspace, Delete keys
		        return;
		    }
        let isNumber = /^[0-9]+$/ig.test(event.key)
        if(isNumber === false){
          event.preventDefault()
          return false;
        }
      }
      const onPressLimit = (event,length,limit) => {
        var eventCode = event.which;
		    if((eventCode >= 37 && eventCode <= 40) ||  eventCode == 8 || eventCode == 9 || eventCode == 46) { // Left  / Right Arrow, Backspace, Delete keys
		        return;
		    }
        if(length >= limit){
          event.preventDefault()
          return false;
        }
      }
      $(function(){
        var delete_href = null
        $('.delete-confirm').click((e)=>{
          event.preventDefault()
          delete_href = e.target.href
          if(delete_href){
            $('#deleteModal').modal('show')
            console.log('delete_href',delete_href)
          }
        })
        $('#deleteModal .confirm').click((e)=>{
          event.preventDefault()
          window.location = delete_href
        })
        $('[data-toggle="tooltip"]').tooltip()
      })
    </script>
    @include('error')
    @yield('js')
  </body>
</html>
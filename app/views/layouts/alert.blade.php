@if(Session::has('status') && Session::get('status') == false)
  <div class="alert alert-warning" role="alert">
      <strong>แจ้งเตือน..!</strong> {{Session::get('message')}}
      
  </div>

@endif
@if(Session::has('status') && Session::get('status') == true)
  <div class="alert alert-success" role="alert">
      <strong>แจ้งเตือน..!</strong> {{Session::get('message')}}

  </div>

@endif

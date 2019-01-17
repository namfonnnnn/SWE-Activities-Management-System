@if(Session::has('message'))
<div class="alert alert-success text-center" role="alert">
    {{Session::get('message')}}
</div>
@endif
@if(Session::has('error'))
<div class="alert alert-danger text-center" role="alert">
    {{Session::get('error')}}
</div>
@endif
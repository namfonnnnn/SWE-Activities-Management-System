@extends('manage.layout')
@section('title')
    test
@stop

@section('content')
<div class="container">
    <div class="card mb-3"  style="margin-top:50px; width: 60rem; height:20rem; ">
        <img class="card-img-top" src="{{asset('assets/image/logo.png')}}" width="250" height="330"  alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
        </div>
    </div>
                
</div>

@stop

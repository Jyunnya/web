@extends('layouts.app')
@section('content')
<div class="container">

       @foreach($data as $d)
            @if($d->image_top)
           <img src="{{asset('storage/images/' . $d->image_top)}}" width='100' height='100' class ='image_top'>
            @else
            <img src="{{asset('storage/images/man.svg')}}" width='100' height='100' class ='image_top_defalut'>
            @endif
            <a href="/profile" class="navbar-brand"><p>{{$d->name}}さん</p></a>
            
      <div class="row justify-content-center">
       <div class="col-md-8"> 
       <h1><b>{{$d->title}}</b></h1>
            <br>
       <h3>{{$d->content}}</h3>
       @endforeach
      </div>
   </div>
</div>
@endsection
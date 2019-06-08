@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
       <div class="col-md-8"> 
       @foreach($data as $d)
       <h1><b>{{$d->title}}</b></h1>
       {{$d->content}}
       @endforeach
      </div>
   </div>
</div>


@endsection
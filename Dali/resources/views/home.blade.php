@extends('layouts.app')
@section('content')
<div class="container">
	 <br>
	 <br>
	 @foreach($data_mine as $d)
            @if($d->image_top)
           <img src="{{asset('storage/images/' . $d->image_top)}}" width='100' height='100' class ='image_top'>
            @else
            <img src="{{asset('storage/images/man.svg')}}" width='100' height='100' class ='image_top_defalut'>
            @endif
            <a href="/profile" class="navbar-brand"><p>{{$d->name}}さん</p></a>
    @endforeach
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($data as $d)
            <br>
             <div class="card">
                <!-- ボックスのタイトル -->
                <div class="card-header">
                	@if(Auth::user()->email == $d->email)
                     <ul class="navbar-nav ml-auto">
                    	<li class="nav-item dropdown" align="right">
                                <a href="#" role="button" class="edit" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">▼
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                               	<form method="POST" id="delete" action="home/{{$d->created_at}}">
                              {{ csrf_field() }}
                              <input type="submit" name="btn" class="btn btn-primary" value="削除" style="width:200px">
                              <!-- ちょっと変更 -->
                          </form>
                          <br>
                          <form action="/finish/{{$d->i_id}}" method="post">
                            {{ csrf_field() }}
                          <input type="submit" name="btn" class="btn btn-primary" value="編集" style="width:200px">
                          </form>
                                 </div>
                            </li>
                        </ul>
                   @endif
                    @if($d->image_top)
                    <img src="{{asset('storage/images/' . $d->image_top)}}" width='50' height='50' class ='image_top'>
                    @else
                    <img src="{{asset('storage/images/man.svg')}}" width='40' height='40' class ='image_top_defalut'>
                    @endif
                    @if(Auth::user()->email == $d->email)
                    <a href="/profile" style="color: black;">
                    @else
                    <a href="/other/{{$d->name}}" style="color: black;" >
                    @endif
                 {{$d->name}}</a> / {{$d->created_at}}
                </div>
                <div class="ideacard-body">
                 <a class ="Link" href="/read/{{$d->i_id}}"></a>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h1><b>{{$d->title}}</b></h1><br>
                    <h3>{{$d->content}}</h3>
        @if(isset($d->image))
        <img src="{{asset('storage/images/' . $d->image)}}" width='200' height='200' class ='image_post'>
      @endif
            </div>
        </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

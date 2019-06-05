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
            <p>{{$d->name}}さん</p>
    @endforeach
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($data as $d)
            <br>
             <div class="card dali">
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
                              <input type="submit" name="btn" class="btn bt-primary" value="書き込みの削除">
                             </form> <!-- ちょっと変更 -->
                                </div>
                            </li>
                        </ul>
                   @endif

                    @if($d->image_top)

                    <img src="{{asset('storage/images/' . $d->image_top)}}" width='50' height='50' class ='image_top'>
                    @else
                    <img src="{{asset('storage/images/man.svg')}}" width='40' height='40' class ='image_top_defalut'>
                    @endif

                 {{$d->name}} / {{$d->created_at}}
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <b>{{$d->title}}</b><br>
                    {{$d->content}}
                    <br>
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

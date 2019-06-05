@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
        <div class="col-md-8">
         <p>検索結果</p>
            @foreach($getdata as $d)
            <br>
             <div class="card">
                <!-- ボックスのタイトル -->
                <div class="card-header">
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
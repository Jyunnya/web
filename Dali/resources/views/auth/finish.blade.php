@extends('layouts.app')
@section('content')
<br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="sub"><p>アイデア概要 － <span class="mark">確認画面</span></div><br>
            <div class="card">
                <!-- ボックスのタイトル -->
                <div class="card-header">確認</div>
                <div class="card-body">
                    @foreach($data as $d)
                    <p><b>タイトル</b><br> {{$d->title}}</p>
                    <p><b>アイデア概要</b><br> {{$d->content}}</p>
                    <b>画像</b><br>
                    <img src="{{asset('storage/images/' . $d->image)}}" width='200' height='200' class ='image_post'>
                        @endforeach
                    <div align="right">
                        <form method="POST" action="/finish/{{$d->i_id}}">
                            @csrf
                    <input type="submit" name="btn" class="btn btn-primary" value="編集">
                    <a href="/home" class="btn btn-primary">完了</a>
                 </form>
                </div>
                 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
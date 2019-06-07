@extends('layouts.app')
@section('content')
<br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8"> 
            <div class="card">
                <!-- ボックスのタイトル -->
                <div class="card-header">編集</div>
                <div class="card-body"> 
                    @foreach($data as $d)
                	<form action="/edit_done/{{$d->i_id}}" method="post" enctype="multipart/form-data">
                		@csrf   
    　　　　　　　　　　<div class="form-group row">
                            <div class="col-md-6">
                         <label for="email" class="col-md-4 col-form-label text-md-right"><b>{{ __('タイトル') }}</b></label>

                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus value="{{$d->title}}">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                  <label for="email" class="col-md-4 col-form-label text-md-right"><b>{{ __('アイデアの概要') }}</b></label>

                    <textarea name="content" id="cont" rows="4" cols="40" style=" height: 100px " class="form-control @error('content') is-invalid @enderror" >{{$d->content}}</textarea>
                    @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <br>
                    <b>現在の画像</b><br>
                    <img src="{{asset('storage/images/' . $d->image)}}" width='200' height='200' class ='image_post'>
                    
                  <div class="form-group row">
                       <div class="col-md-6"><br>
                    <input type="file" class="@error('image') is-invalid @enderror" name="image" required autocomplete="image">
                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>
            @endforeach
                     <div align="right">
                     	<input type="submit" name="btn" class="btn btn-primary" value="完了">
                 </div>
                 </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
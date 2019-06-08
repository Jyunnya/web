@extends('layouts.app')
@section('content')
<br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8"> 
               <div class="sub" align="center"><p><span class="mark">アイデア概要</span> ー 確認画面</p> </div><br>
            <div class="card">
                <!-- ボックスのタイトル -->
                <div class="card-header">アイデア</div>
                <div class="card-body">
                	<form action="/draw" method="post" enctype="multipart/form-data">
                		@csrf
    　　　　　　　　　　<div class="form-group row">
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus placeholder="タイトル">
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
                    <textarea name="content" id="cont" rows="4" cols="40" style=" height: 100px " class="form-control @error('content') is-invalid @enderror" placeholder="アイデアの概要"></textarea>
                    @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <br>
                  <div class="form-group row">
                       <div class="col-md-6">
                    <input type="file" class="@error('image') is-invalid @enderror" name="image" required autocomplete="image">
                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>
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
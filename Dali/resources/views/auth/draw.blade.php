@extends('layouts.app')
@section('content')
<br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="sub"><p><span class="mark">アイデア概要</span> － <a href="/img/idea">イメージ</a> ー 完了画面</p> </div>
        <div class="col-md-8"><br>
            <div class="card">
                <!-- ボックスのタイトル -->
                <div class="card-header">アイデア</div>
                <div class="card-body">
                	<form action="/draw" method="post" enctype="multipart/form-data">
                		@csrf
    　　　　　　　　　　<div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('タイトル') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus>

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
                         <label for="cont" class="col-md-4 col-form-label text-md-right">{{ __('アイデアの概要') }}</label>
                    <textarea name="content" id="cont" rows="4" cols="40" style=" height: 100px " class="form-control @error('content') is-invalid @enderror"></textarea>
                    @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <br>
                     <div align="right">
                    <a href="/img/idea" class="btn btn-primary">
                                    {{ __('次へ') }}
                     </a>
                 </div>
                 </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
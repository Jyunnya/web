@extends('layouts.app')
@section('content')
<br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="sub"><p><a href="/draw/idea">アイデア概要</a> － <span class="mark">イメージ</span> ー 完了画面</p> </div>
        <div class="col-md-8"><br>
            <div class="card">
                <!-- ボックスのタイトル -->
                <div class="card-header">イメージ</div>
                <div class="card-body">
                	<form action="/draw" method="post" enctype="multipart/form-data">
                		@csrf
　　　　　　　　　　　<input type="file" name="image_1">
                    <br>
                    <input type="file" name="image_1">
                    <br>
                    <input type="file" name="image_1">
                    <br>

                     <div align="right">
                    <a href="/finish/idea" class="btn btn-primary">
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
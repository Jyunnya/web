@extends('master')
@section('title', 'ログイン')
@section('content')
<h1>ログイン</h1>
<div align="right">
<input type="button" name="bt" class="btn btn-primary" value="新規登録画面" onClick="location.href='/siginin'">
</div>
<form action="/login" method="post">
<br>
 @if(count($errors) >0)
 <div class="alert alert-primary" role="alert">
 @foreach($errors->all() as $error)
<p>{{$error}}</p>
@endforeach
</div>
@endif
<div class="form_group">
<input type="email" name="email" style="width: 300px" class="form-control" placeholder="メールアドレス">
</div>
<br>
<div class="form-group">
<input type="password" name="password" style="width: 300px" class="form-control" placeholder="パスワード">
</div>
<input type="submit" name="btn" class="btn btn-primary" value="ログイン">
{{ csrf_field() }}
</form>
@endsection
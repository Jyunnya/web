@extends('master')
@section('title', '新規登録')
@section('content')
<h1>新規登録</h1>
<div align="right">
<input type="button" name="bt" class="btn btn-primary" value="ログイン画面" onClick="location.href='/login'" >
</div>
<form action="/siginin" method="post">
<div class="form_group">
<input type="text" name="name" style="width: 300px" class="form-control" placeholder="名前"> 
</div>
<br>
<div class="form_group">
<input type="email" name="email" style="width: 300px" class="form-control" placeholder="メールアドレス">
</div>
<br>
<div class="form-group">
<input type="password" name="password" style="width: 300px" class="form-control" placeholder="パスワード">
</div>
<input type="submit" name="btn" class="btn btn-primary" value="新規登録">
{{ csrf_field() }}
</form>
@endsection
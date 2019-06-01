@extends('master')
@section('title', 'データ追加')
@section('content')
<h1>データ追加</h1>
<br>
<form method="POST" action="/insert" enctype="multipart/form-data">
{{ csrf_field() }}
<div class="box">
<div class="form_group">
<input type="text" name="na" style="width: 300px" class="form-control" placeholder="名前"><br>
</div>
<div class="form-group">
<textarea name="content" style="width: 300px; height: 150px " class="form-control" rows="4" cols="40">内容</textarea>
</div>
<input type="file" name="image">
<br>
<br>
<input type="submit" name="btn" value="完了" class="btn btn-primary">
</div>
</form>
@endsection
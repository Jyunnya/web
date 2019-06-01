@extends('master')
@section('title', '画像アップロード')
@section('content')
<h1>画像アップロード</h1>
<form action="/images" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
<input type="file" name="image">
<br>
<br>
<input type="submit" name="btn" class="btn btn-primary">
</form>
@endsection
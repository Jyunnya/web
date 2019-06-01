@extends('master')
@section('title', '完了')
@section('content')
<style>
.alert{
	width: 500px;
}
</style>
<h1>完了画面</h1>
<div class="alert alert-primary" role="alert">
<p>完了しました</p>
<a href="/siginin" class="btn btn-primary">戻る</a>
</div>
@endsection
@extends('master')
@section('title', '完了')
@section('content')
<style>
.alert{
	width: 500px;
}
</style>
<h1>アップロード完了しました</h1>
<div class="alert alert-primary" role="alert">
<p>完了しました</p>
<a href="/images" class="btn btn-primary">戻る</a>
</div>
@endsection
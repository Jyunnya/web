@extends('master')
@section('title', 'データ集')
@section('content')
<style>
.card{
	text-align: center;
	width: 300px;
	box-shadow: 2px 2px 4px;
	background: #e6f4ff;
	border-radius: 30px;
}
.image{
	border-radius: 10px;
	margin: auto;
}
</style>
	<h1>データ集</h1>
  <ul>
   @foreach($data as $d)
   <br>
    <div class="card mb-2">
        {{$d->name}}さん<br>「{{$d->content}}」<br>
      @if(isset($d->image))
        <img src="{{asset('storage/images/' . $d->image)}}" width='193' height='130' class ='image'>
      @endif
       <form method="POST" action="/sample/{{$d->id}}">
       	<br>
      	{{ csrf_field() }}
      <input type="submit" name="delete" style="width: 80px " class="btn btn-primary" value="削除">
    </form><br>
</div>
    @endforeach
 </ul>
<a href="/insert">データ追加</a>
@endsection
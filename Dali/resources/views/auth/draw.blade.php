@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!-- ボックスのタイトル -->
                <div class="card-header">書き込み</div>
                <div class="card-body">
                	<form action="/draw" method="post" enctype="multipart/form-data">
                		@csrf
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <textarea name="content" rows="4" cols="40" placeholder="自分を表現しよう" style=" height: 100px " class="form-control @error('content') is-invalid @enderror"></textarea>
                    @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <br>
                    <button type="submit" class="btn btn-primary">
                                    {{ __('投稿') }}
                     </button>
                     <input type="file" id="upload" name="image" style="cursor: pointer;" title="画像・動画を追加" class="img @error('image') is-invalid @enderror">
                  @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                 </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')
@section('content')
<div class="container">
<br>

<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!-- ボックスのタイトル -->
            <div class="card-header">プロフィールの編集</div>
             <div class="card-body">
               <form action="/edit" method="post" enctype="multipart/form-data">
                	 @csrf
            @foreach($data_mine as $d)
            <label for="upload" title="トップ画像編集">
            @if($d->image_top)
           <img src="{{asset('storage/images/' . $d->image_top)}}" width='70' height='70' class ='image_top'>
            @else
            <img src="{{asset('storage/images/man.svg')}}" width='100' height='100' class ='image_top_defalut'>
            @endif
             <input type="file" id="upload" name="image" style="cursor: pointer;" title="画像・動画を追加" class="img @error('image') is-invalid @enderror">
            </label>
                   @error('image')
                   <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                      </span>
                @enderror

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                     <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('名前') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $d->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                     <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail アドレス') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $d->email }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    <div align="right">
                     <a href="/profile" class="btn btn-primary">キャンセル</a>
                    <button type="submit" class="btn btn-primary">
                                   {{ __('保存') }}
                     </button>
                     </div>
                      @endforeach
                 </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
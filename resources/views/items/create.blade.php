@extends('layouts.app')

@section('content')

@extends('commons.header')

<main class="panel">
    <!-- ページタイトル -->
    <div class="panel-headline">
        <h2 class="current-page">アイテム登録</h2>
    </div>
    <!-- 登録フォーム -->
    <div class="panel-body">
        <div class="form-after-login">
            <form method="POST" action="{{ route('item.store') }}" enctype="multipart/form-data">
                @csrf

                <!-- アイテム画像を選択 -->
                <div class="form-group img-upload">
                    <label for="">アイテム画像を選択（必須）</label>
                    <br>
                    <input type="file" name="image" required>
                </div>
                <div class="form-group">
                    @if($errors->has('image'))
                    <p class="color-red errors">{{$errors->first('image')}}</p>
                    @endif
                </div>

                <!-- アイテム名 -->
                <div class="form-group">
                    <input type="text" name="name" class="text-box" placeholder="アイテム名（任意・30字以内）" maxlength="30">
                    @if($errors->has('name'))
                    <p class="color-red errors">{{$errors->first('name')}}</p>
                    @endif
                </div>
                <!-- タグ -->
                <div class="form-group">
                    <div class="tag-box">

                        <!-- タグがない場合 -->
                        @if (count($tags) == 0)
                        <div class="message">
                            <p class="nothing">タグがありません。</p>
                        </div>

                        <!-- タグがある場合 -->
                        @elseif (count($tags) > 0)
                        @foreach($tags as $tag)
                        <input type="checkbox" name="tag[]" value="{{ $tag->id }}">{{ $tag->name }}
                        @endforeach
                        @endif
                    </div>
                </div>

                <!-- 登録・キャンセルボタン -->
                <div class="form-group">
                    <div class="btn-group">
                        <a href="{{ route('items') }}" class="btn btn-reverse">キャンセル</a>
                        <button type="submit" class="btn btn-primary">登録</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</main>

@extends('commons.footer')

@endsection
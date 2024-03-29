@extends('layouts.app')

@section('content')

@extends('commons.header')

<!-- アイテム削除ボタン -->
<div class="delete-btn">
    <form method="POST" action="{{ route('item.destroy', $item->id) }}" id="delete-form" enctype="multipart/form-data">
        @csrf
        @method('DELETE')
        <input type="hidden" name="id" value="{{ $item->id }}">
        <a id="delete-modal-open" class="icon btn-icon dialog-open">
            <img src="{{ asset('/delete.png') }}" alt="">
            @extends('commons.delete_modal')
        </a>
    </form>
</div>

<main class="panel">
    <!-- ページタイトル -->
    <div class="panel-headline">
        <h2 class="current-page">アイテム詳細</h2>
    </div>
    <!-- アイテム詳細 -->
    <div class="panel-body">
        <div class="form-after-login">

            <!-- アイテム画像を選択 -->
            <div class="form-group">
                <img class="item-img item-img-detail" src="{{ asset('/storage/'.$item->image) }}" alt="アイテム写真">
            </div>

            <!-- アイテム名 -->
            <div class="form-group item-outfit-name">
                @if ($item->name == "")
                <h4>無題のアイテム</h4>
                @elseif ($item->name != "")
                <h4>{{ $item->name }}</h4>
                @endif
            </div>
            <!-- タグ -->
            <div class="form-group">
                <div class="tag-box">

                    <!-- タグ付けされていない場合 -->
                    @if (count($tags) == 0)
                    <div class="message">
                        <p class="nothing">タグ付けされていません。</p>
                    </div>

                    <!-- タグ付けされている場合 -->
                    @elseif (count($tags) > 0)
                    @foreach($tags as $tag)
                    <a class="tag-name" href="{{ route('items-of-tag', $tag->id) }}">#{{ $tag->name }}</a>
                    @endforeach
                    @endif
                </div>
            </div>

            <!-- 編集・キャンセルボタン -->
            <div class="form-group">
                <div class="btn-group">
                    <a href="{{ route('items') }}" class="btn btn-reverse">キャンセル</a>
                    <form method="GET" action="{{ route('item.edit', $item->id) }}">
                        <input type="hidden" name="id" value="{{ $item->id }}">
                        <button type="submit" class="btn btn-primary">編集</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

@extends('commons.footer')

@endsection
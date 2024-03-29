@extends('layouts.app')

@section('content')

@extends('commons.header')

<!-- ユーザー認証メニュー -->
<ul class="link">
    @guest
    @if (Route::has('login'))
    <li>
        <a class="btn btn-link" href="{{ route('login') }}">ログイン</a>
    </li>
    @endif

    @if (Route::has('register'))
    <li>
        <a class="btn btn-link" href="{{ route('register') }}">会員登録</a>
    </li>
    @endif
    @else
    <li>
        <a class="btn btn-link" href="{{ route('logout') }}">ログアウト</a>
            @csrf
    </li>
    @endguest
</ul>

<!-- アイテム一覧表示 -->
<main class="panel">
    <!-- ページタイトル -->
    <div class="panel-headline">
        <h2 class="current-page">すべてのアイテム</h2>
    </div>

    <div class="panel-body">
        <!-- アイテムがない場合 -->
        @if (count($items) == 0)
        <div class="message">
            <p class="nothing">アイテムがありません。</p>
        </div>

        <!-- アイテムがある場合 -->
        @elseif (count($items) > 0)
        <div class="data">
        @foreach ($items as $item)
            <a href="{{ route('item.detail', $item->id) }}">
                <img class="item-img item-img-index" type="image" src="{{ asset('/storage/'.$item->image) }}" alt="{{ $item->name }}">
            </a>
        @endforeach
        </div>
        @endif
    </div>
    
    <!-- アイテム登録画面リンク -->
    <div class="add-btn">
        <a href="{{ route('item.create') }}">
            <img class="icon" src="{{ asset('/plus.png') }}" alt="">
        </a>
    </div>

</main>

@extends('commons.footer')

@endsection
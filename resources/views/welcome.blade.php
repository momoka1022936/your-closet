@extends('layouts.app')

@section('content')
<div class="before-login">
    <div class="app-title">
        <h1 class="your-closet">Your Closet</h1>
    </div>
    <div class="to-auth">
        @if (Route::has('login'))
        @auth
        <div class="form-group welcome">
            <a href="{{ route('items') }}" class="btn btn-link btn-welcome">アイテム一覧へ</a>
        </div>
        @else
        <div class="form-group welcome">
            <a href="{{ route('login') }}" class="btn btn-link btn-welcome">ログイン</a>
        </div>
        @if (Route::has('register'))
        <div class="form-group welcome">
            <a href="{{ route('register') }}" class="btn btn-link btn-welcome">会員登録</a>
        </div>
        @endif
        @endauth
        @endif
    </div>
</div>
@endsection
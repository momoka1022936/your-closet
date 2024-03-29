@extends('layouts.app')

@section('content')

@extends('commons.header')

<!-- コーディネート一覧表示 -->
<main class="panel">
    <!-- ページタイトル -->
    <div class="panel-headline">
        <h2 class="current-page">すべてのコーディネート</h2>
    </div>

    <div class="panel-body">
        <!-- コーディネートがない場合 -->
        @if (count($outfits) == 0)
        <div class="message">
            <p class="nothing">コーディネートがありません。</p>
        </div>

        <!-- コーディネートがある場合 -->
        @elseif (count($outfits) > 0)
        <div class="data">
            @foreach ($outfits as $outfit)
            <!-- コーディネート一式 -->
            <a href="{{ route('outfit.detail', $outfit->id) }}">
                <div class="outfit">
                    @foreach ($outfit->items as $related_item)
                    <!-- コーディネートに紐づけられた各アイテム -->
                    <img class="item-img outfit-img-index" type="image"
                        src="{{ asset('/storage/'.$related_item->image) }}" alt="{{ $related_item->name }}">
                    @endforeach
                </div>
            </a>
            @endforeach
        </div>
        @endif
    </div>

    <!-- コーディネート登録画面リンク -->
    <div class="add-btn">
        <a href="{{ route('outfit.create') }}">
            <img class="icon" src="{{ asset('/plus.png') }}" alt="">
        </a>
    </div>

</main>

@extends('commons.footer')

@endsection
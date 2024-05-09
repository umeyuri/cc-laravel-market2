@extends('layouts.logged_in')

@section('content')
    <h2>新しい宝探しを始めよう！</h2>
    <a href="{{ route('items.create') }}">新規出品</a>
    <ul>
    @forelse ($items as $item)
        <li>{{ $item->isOrderd($item->id) ? '売り切れ' : '出品中' }}</li>
        <li>商品名：{{ $item->name }}</li>
        <li>価格：{{ $item->price }}円</li>
        <li>カテゴリ：{{ $item->category->name }}</li>
        @if ($item->image !== '')
            <a href="{{ route('items.show', $item->id ) }}"><img src="{{ asset('storage/' . $item->image) }}"></a>
        @else
        <a href="{{ route('items.show', $item->id ) }}"><img src="{{ asset('storage/' . 'no_image.png') }}"></a>
        @endif
        <a class="like_button">{{ $item->isLikedBy(Auth::user()->id) ? '★' : '☆' }}</a>
        <form method="post" class="like" action="{{ route('items.toggle_like', $item->id) }}">
            @csrf
            @method('patch')
        </form>
        <hr>
    @empty
        <li>商品はありません</li>
    @endforelse
    </ul>
@endsection
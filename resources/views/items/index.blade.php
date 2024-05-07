@extends('layouts.logged_in')

@section('content')
    <h2>新しい宝探しを始めよう！</h2>
    <a href="{{ route('items.create') }}">新規出品</a>
    <ul>
    @forelse ($items as $item)
        <li>商品名：{{ $item->name }}</li>
        <li>価格：{{ $item->price }}円</li>
        <li>カテゴリ：{{ $item->category->name }}</li>
        @if ($item->image !== '')
            <a href="{{ route('items.show', $item->id ) }}"><img src="{{ asset('storage/' . $item->image) }}"></a>
        @else
            <img src="{{ asset('storage/' . 'no_image.png') }}">
        @endif
        <hr>
    @empty
        <li>商品はありません</li>
    @endforelse
    </ul>
@endsection
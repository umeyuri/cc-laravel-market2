@extends('layouts.logged_in')

@section('title', $title)

@section('content')
    <h1>{{ $user->name }}さんの{{ $title }}</h1>
    <a href="{{ route('items.create') }}">新規出品</a>
    @forelse ($items as $item)
        <li>{{ $item->isOrderd($item->id) ? '売り切れ' : '出品中' }}</li>
        <li>商品名：{{ $item->name }}</li>
        <li>価格：{{ $item->price }}円</li>
        <li>カテゴリ：{{ $item->category->name }}</li>
        @if ($item->image !== '')
            <a href="{{ route('items.show', $item->id ) }}"><img src="{{ asset('storage/' . $item->image) }}"></a>
        @else
        <a href="{{ route('items.show', $item->id ) }}"><img src="{{ asset('storage/no_image.png') }}"></a>
        @endif
        <a href="{{ route('items.edit_image', $item->id) }}">画像編集</a>
        <form method="post" action="{{ route('items.delete', $item->id) }}">
            @csrf
            @method('delete')
            <input type="submit" value="削除">
        </form>
        <a href="{{ route('items.edit', $item->id) }}">商品編集画面</a>
        <hr>
    @empty
        <li>出品している商品はありません</li>
    @endforelse
@endsection
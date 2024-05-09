@extends('layouts.logged_in')

@section('title', $title)

@section('content')
    <h1>{{ $title }}</h1>
    @forelse ($likes as $like)
    <ul>
        <li>商品名：{{ $like->name }}</li>
        @if ($like->image)
            <a href="{{ route('items.show', $like->id) }}"><img src="{{ asset('storage/' . $like->image) }}"></a>
        @else
        <a href="{{ route('items.show', $like->id) }}"><img src="{{ asset('storage/no_image.png') }}"></a>
        @endif

        <li>カテゴリ：{{ $like->category->name }}</li>
        <li>価格：{{ $like->price }}円</li>
        <li>説明：{{ $like->description }}</li>
    </ul>
    <hr>
    @empty
        <p>お気に入り商品はありません</p>
    @endforelse
@endsection
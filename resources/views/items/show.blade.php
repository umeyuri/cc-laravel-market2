@extends('layouts.logged_in')

@section('title', $title)

@section('content')
    <h1>{{ $title }}</h1>
    <h2>商品詳細</h2>
    <ul>
        <li>商品名：{{ $item->name }}</li>
        @if ($item->image)
            <img src="{{ asset('storage/' . $item->image) }}">
        @else
            <img src="{{ asset('storage/no_image.png') }}">
        @endif

        <li>カテゴリ：{{ $item->category->name }}</li>
        <li>価格：{{ $item->price }}円</li>
        <li>説明：{{ $item->description }}</li>
    </ul>
    @if ($item->isOrderd($item->id))
        <p>売り切れ</p>
    @else
        <form method="post" action="{{ route('items.finish', $item->id) }}">
            @csrf
            <input type="submit" value="購入する">
        </form>
    @endif

@endsection
@extends('layouts.logged_in')

@section('title', $title)

@section('content')
    <h1>{{ $title }}</h1>
    <h2>商品詳細</h2>
    <ul>
        <li>商品名：{{ $item->name }}</li>
        <img src="{{ asset('storage/' . $item->image) }}">
        <li>カテゴリ：{{ $item->category->name }}</li>
        <li>価格：{{ $item->price }}円</li>
        <li>説明：{{ $item->description }}</li>
    </ul>
    <form method="post" action="{{ route('items.finish', $item->id) }}">
        @csrf
        <input type="submit" value="購入する">
    </form>
@endsection
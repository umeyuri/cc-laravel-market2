@extends('layouts.logged_in')

@section('title', $title)

@section('content')
    <h1>{{ $title }}</h1>
    <ul>
        <li>商品名：{{ $item->name }}</li>
        <img src="{{ asset('storage/' . $item->image) }}">
        <li>カテゴリ：{{ $item->category->name }}</li>
        <li>価格：{{ $item->price }}円</li>
        <li>説明：{{ $item->description }}</li>
    </ul>
    <a href="{{ route('items.index') }}">トップに戻る</a>
@endsection
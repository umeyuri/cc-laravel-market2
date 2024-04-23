@extends('layouts.default')

@section('title', 'フリマサイト')

@section('header')
    <div class="header_nav">
        <ul>
            <li><a href="{{ route('items.index') }}">Market</a></li>
            <li>こんにちは</li>
            <li><a href="{{ route('users.show', 1) }}">プロフィール</a></li>
            <li><a href="{{ route('likes.index') }}">お気に入り一覧</a></li>
            <li><a href="{{ route('users.exhibitions', 1) }}">出品商品一覧</a></li>
            <li>ログアウト</li>
        </ul>
    </div>
@endsection
@extends('layouts.logged_in')

@section('content')
    <h2>{{ $title }}</h2>
    <ul>
        <li>{{ $user->name }}さん</li>
       <li>出品数：{{ $user->items()->count() }}</li>
       <div class="user_image">
        @if (isset($user->image))
            <img src="{{ asset('storage/' . $user->image) }}">
        @else
            画像なし
        @endif
        </div>
       <li><a href="{{ route('profile.edit_image') }}">画像編集</a></li>
       <a href="{{ route('profile.edit') }}">ユーザープロフィール編集</a>
    </ul>
    <h2>購入履歴</h2>
    <ul>
        @forelse ($order_items as $item)
            <li>{{ $item->name }}: {{ $item->price }}円　出品者 {{ $item->user->name }}さん</li>
        @empty
            <li>購入履歴はありません</li>
        @endforelse
    </ul>
@endsection
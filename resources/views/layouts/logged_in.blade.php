@extends('layouts.default')

@section('title', 'フリマサイト')

@section('header')
    <div class="header_nav">
        <ul>
            <li><a href="{{ route('items.index') }}">Market</a></li>
            <li>こんにちは</li>
            <li><a href="{{ route('users.show', \Auth::user()->id) }}">プロフィール</a></li>
            <li>お気に入り一覧</li>
            <li>出品商品一覧</li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-dropdown-link :href="route('logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-dropdown-link>
                </form>
            </li>
        </ul>
    </div>
@endsection
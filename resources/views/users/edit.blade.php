@extends('layouts.logged_in')

@section('content')
    <h2>{{ $title }}</h2>
    <form method="post" action="{{ route('profile.update') }}">
        @csrf
        <div>名前：<input type="text" name="name" value="{{ $user->name }}"></div>
        <div>プロフィール:<br>
        <textarea>{{ $user->profile }}</textarea></div>
        <input type="submit" value="更新">
    </form>
@endsection
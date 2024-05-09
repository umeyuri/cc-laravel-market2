@extends('layouts.logged_in')

@section('title', $title)

@section('content')
    <h1>{{ $title}}</h1>
    <h2>現在の画像</h2>
    <div class="user_image">
    @if (isset($user->image))
        <img src="{{ asset('storage/' . $user->image) }}">
    @else
        画像なし
    @endif
    </div>
    <form method="post" action="{{ route('profile.update_image') }}" enctype="multipart/form-data">
        @csrf
        <div>
            <label>画像：<input type="file" name="image"></label>
        </div>
        <input type="submit" value="更新">
    </form>
@endsection
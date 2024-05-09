@extends('layouts.logged_in')

@section('title', $title)

@section('content')
    <h1>{{ $title }}</h1>
    <h2>現在の画像</h2>
    @if ($item->image !== '')
        <img src="{{ asset('storage/' . $item->image) }}">
    @else
        <img src="{{ asset('storage/no_image.png') }}">
    @endif
    <form method="post" action="{{ route('items.update_image', $item->id) }}" enctype="multipart/form-data">
        @csrf
        <div>画像を選択:<input type="file" name="image"></div>
        <input type="submit" value="更新">
    </form>
@endsection
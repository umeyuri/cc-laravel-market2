@extends('layouts.logged_in')

@section('title', $title)

@section('content')
    <h1>{{ $title }}</h1>
    <h2>商品追加フォーム</h2>
    <form method="post" action="{{ route('items.store') }}" enctype="multipart/form-data">
        @csrf
        <div><label>商品名：<br><input type="text" name="name"></label></div>
        <div><label>商品説明：<br><textarea cols="30" rows="10" name="description"></textarea></label></div>
        <div><label>価格：<br><input type="number" name="price"></label></div>
        <div><label>カテゴリー：<br>
            <select name="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id}}">{{ $category->name }}</option>
                @endforeach
            </select>
            </label>
        </div>
        <div><label>画像を選択：<br><input type="file" name="image"></label></div>
        <input type="submit" value="出品">
    </form>
@endsection
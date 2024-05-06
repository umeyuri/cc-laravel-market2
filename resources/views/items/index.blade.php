@extends('layouts.logged_in')

@section('content')
    <h2>新しい宝探しを始めよう！</h2>
    <a href="{{ route('items.create') }}">新規出品</a>
@endsection
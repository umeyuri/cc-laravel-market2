<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>@yield('title')</title>
    <style>
        .user_image {
            height: 200px;
            weight: 200px;
        }
        .user_image img {
            height: 100%;
            weight: 100%;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>
    @yield('header')
    @foreach ($errors->all() as $error)
        <p class="error">{{ $error }}</p>
    @endforeach

    @yield('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    /* global $ */
    $('.like_button').on('click', (event) => {
        $(event.currentTarget).next().submit();
    })
    </script>
</body>
</html>
<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="HandheldFriendly" content="true">
    <meta name="MobileOptimized" content="0">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
    >

    <title>Проект</title>

        <!-- Стили: -->
    <link
        rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
        crossorigin="anonymous"
    >
    @stack('stylesheets')
    <!-- Сценарии: -->
    <script
        defer
        src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"
    ></script>
    <script
        defer
        src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"
    ></script>
    <script
        defer
        src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"
    ></script>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <header  class="col-12 bg-danger text-white">Проект</nav>
        </div>
        <div class="row">
            <header  class="col-12 bg-danger text-white">Добро пожаловать</nav>
        </div>
        <div class="row">
            <nav     class="col-lg-4  col-xl-4 bg-info">
            Меню
            <br>
            <br>
            <a href="{{ route('messages.index') }}"><p class="text-white">Сообщения</p></a>
            <br>
            <a href="{{ route('roles.index') }}"><p class="text-white">Профиль</p></a>
            <br>
            <a href="{{ url('/home') }}"><p class="text-white">Страница</p></a>
            </nav>
            <article class="col-lg-8  col-xl-8 bg-info">@yield('main')</article>
            @if ($errors->count())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $e)
                        {{ $e }}
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</body>
</html>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Социальная сеть | {{ config('app.name') }}</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">Social</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                @if (Auth::check())
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Стена</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Друзья</a>
                        </li>

                        <form class="form-inline my-2 ml-2 my-lg-0" method="get" action="{{ route('search.results') }}">
                            <input class="form-control mr-sm-2" name="query" type="search" placeholder="Что ищем?" aria-label="Что ищем?">
                            <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Найти</button>
                        </form>
                    </ul>
                @endif

                <ul class="navbar-nav ml-auto">
                    @if (Auth::check())
                        <li class="nav-item">
                            <a href="{{ route('profile.index', Auth::user()->username) }}" class="nav-link">
                                {{ Auth::user()->getNameOrUsername() }}
                            </a>
                        </li>
                        <li class="nav-item"><a href="" class="nav-link">Обновить профиль</a></li>
                        <li class="nav-item"><a href="{{ route('auth.logout') }}" class="nav-link">Выйти</a></li>
                    @else
                        <li class="nav-item"><a href="{{ route('auth.register') }}" class="nav-link">Зарегистрироваться</a></li>
                        <li class="nav-item"><a href="{{ route('auth.login') }}" class="nav-link">Войти</a></li>
                    @endif
                </ul>
            </div>
        </div>

    </nav>
    <div class="container">
        @include('templates.partials.alerts')
        @yield("content")
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>

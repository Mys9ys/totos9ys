<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Тотосяус</title>

    <!-- Styles -->
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('public/block/header/style.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="{{ asset('public/css/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('public/js/jquery-3.0.0.min.js') }}"></script>
    <?//functions?>
    <?include_once(public_path().'/block/footer/functions.php');?>
</head>

<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->

            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                @if(Auth::guest())
                    <li class="dropdown">
                        <div class="login_social">Войти</div>
                    </li>
                @else
                    <?if(Auth::user()->role == 'admin'){ $active = 'Y';} else {$active = 'N';}?>
                    <div class="user_info" data-user="{{ Auth::user()->id }}" data-active="<?=$active?>"></div>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->nik }} <img class="avatar" style="border-radius: 0 20px 0  20px ;" src="{{ Auth::user()->avatar }}" alt=""><span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ route('forecast') }}">
                                   Мои прогнозы
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('message') }}" class="messages">
                                    Сообщения
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('profile') }}">
                                    Настройки
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Выйти
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>


@include('auth.social')
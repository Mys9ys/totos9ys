<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="{{ asset('public/css/welcome.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div id="block1">
    <div class="panel0">
        @if (Route::has('login'))
            <div class="top-right links">
                @if (Auth::check())
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ url('/login') }}">Login</a>
                    <a href="{{ url('/register') }}">Register</a>
                @endif
            </div>
        @endif
        <div class="panel1">
            <span>Т</span>
            <span>о</span>
            <span>т</span>
            <span>о</span>
            <span>с</span>
            <span>я</span>
            <span>у</span>
            <span>с</span>
        </div>
        <div class="panel2">
            Привествуем Вас на сайте любительских прогнозов Тотосяус.ру<br>
            Предлагаем Вам проверить свою интуицию и поучаствовать в прогнозах результатов матчей Кубка конфедерации 2017.<br>
            Результатом Вашего участия будет попадание в огромное количество рейтингов.
        </div>
    </div>
</div>
<div id="block2">
    <div class="panel0">
        <div class="panel1">
            <div class="words words-1">
                <span>Р</span>
                <span>е</span>
                <span>й</span>
                <span>т</span>
                <span>и</span>
                <span>н</span>
                <span>г</span>
                <span>и</span>
            </div>
        </div>
        <div class="panel2">
            <div class="wrapper">
                <ul class="tabs clearfix" data-tabgroup="first-tab-group">
                    <li><a href="#tab1" class="active">Общий</a></li>
                    <li><a href="#tab2">0-0</a></li>
                    <li><a href="#tab3">угловые</a></li>
                    <li><a href="#tab4"><i class="fa fa-square" aria-hidden="true" style="color: yellow"></i></a></li>
                    <li><a href="#tab5">50%/50%</a></li>
                    <li><a href="#tab6">исход</a></li>
                    <li><a href="#tab7"><i class="fa fa-futbol-o" aria-hidden="true" style="color: black"></i></a></li>
                    <li><a href="#tab8">+/- <i class="fa fa-futbol-o" aria-hidden="true" style="color: black"></i></a></li>
                    <li><a href="#tab9">пенальти</a></li>
                    <li><a href="#tab10"><i class="fa fa-square" aria-hidden="true" style="color: red"></i></a></li>
                    <li><a href="#tab11">больший %</a></li>
                </ul>
                <section id="first-tab-group" class="tabgroup">
                    <div id="tab1">
                        <h2>Общий рейтинг</h2>
                        @include('layouts.ratings', ['props' => $general])
                    </div>
                    <div id="tab2">
                        <h2>Точный счет матча</h2>
                        @include('layouts.ratings', ['props' => $score])
                    </div>
                    <div id="tab3">
                        <h2>Количество угловых</h2>
                        @include('layouts.ratings', ['props' => $corners])
                    </div>
                    <div id="tab4">
                        <h2>Желтые карточки</h2>
                        </div>
                    <div id="tab5">
                        <h2>Процент владения мячом</h2>
                        </div>
                    <div id="tab6">
                        <h2>Результат матча</h2>
                        </div>
                    <div id="tab7">
                        <h2>Количество голов</h2>
                        </div>
                    <div id="tab8">
                        <h2>Разница голов</h2>
                        </div>
                    <div id="tab9">
                        <h2>Пенальти</h2>
                        </div>
                    <div id="tab10">
                        <h2>Красные</h2>
                        </div>
                    <div id="tab11">
                        <h2>Команда с большим % владения</h2>
                        </div>
                </section>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('public/js/jquery.min.js') }}"></script>
<script src="{{ asset('public/js/welcome.js') }}"></script>
</body>
</html>










{{--@endsection--}}
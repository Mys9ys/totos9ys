@include('layouts.header')
<body>
    <div id="app">
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
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            {{--<li><a href="{{ route('login') }}">Login</a></li>--}}
                            {{--<li><a href="{{ route('register') }}">Register</a></li>--}}
                        @else
                            <li class="dropdown">
                                <a href="{{ route('preview') }}" class="dropdown-toggle" role="button" aria-expanded="false">
                                    Анонс
                                </a>
                            </li>
                            <li class="dropdown">
                                <a href="{{ route('forecast', ['id' => 1]) }}" class="dropdown-toggle" role="button" aria-expanded="false">
                                    Прогноз
                                </a>
                            </li>
                            <li class="dropdown">
                                <a href="{{ route('complited') }}" class="dropdown-toggle" role="button" aria-expanded="false">
                                    Результаты
                                </a>
                            </li>
                            <li class="dropdown">
                                <a href="{{ route('ratings') }}" class="dropdown-toggle" role="button" aria-expanded="false">
                                    Рейтинги
                                </a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->nik }} <img class="avatar" style="border-radius: 0 20px 0  20px ;" src="{{ Auth::user()->avatar }}" alt=""><span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>tyt</li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
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

        @yield('content')

    </div>

@include('layouts.footer')
    {{--<script src="{{ asset('public/js/bootstrap.min.js') }}"></script>--}}
</body>
</html>

<nav class="navbar navbar-expand-lg sticky-top navbar-dark" style="background-color:#E84118">
    <div class="container">
        <a class="navbar-brand" href="#">{{ Config::get('app.name', 'NewsCoin') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/') }}">Beranda <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('rewards') }}">Hadiah</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('get-coin') }}">Dapatkan Coin</a>
                </li>
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('my-article') }}">My Article</a>
                    </li>
                @endauth
                
            </ul>
            <ul class="navbar-nav ml-auto">
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:#fff">
                            {{ Auth::user()->user_name }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ url('account/panel') }}">Akunku</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ url('logout') }}">Logout</a>
                        </div>
                    </li>
                @endauth
                @guest
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('login') }}">Masuk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('register') }}">Daftar</a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

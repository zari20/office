<nav class="navbar navbar-expand-md navbar-light bg-blue-no-hover">
    <div class="container">
        <a class="navbar-brand text-light" href="{{ url('/') }}">
            IQ-Office
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <!-- Authentication Links -->
                @guest
                    <li><a class="nav-link text-light" href="{{ route('login') }}"> ورود </a></li>
                    <li><a class="nav-link text-light" href="{{ route('register') }}"> ثبت نام </a></li>
                @else

                    <li><a class="nav-link text-light" href="{{ route('home') }}"> <i class="fa fa-dashboard ml-1"></i> داشبورد </a></li>

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="fa fa-user ml-1"></i>
                            {{ Auth::user()->username ?? Auth::user()->mobile }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right text-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out ml-1"></i> خروج
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

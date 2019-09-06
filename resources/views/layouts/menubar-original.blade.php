<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand nav-link-active navBajar" 
                    href="{{ url('/') }}">
                    <ion-icon name="beer"></ion-icon>
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('faq') }}">
                                    <ion-icon name="help"></ion-icon> <br>
                                    {{ __('F.A.Q') }}
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('contact') }}">
                                    <ion-icon name="clipboard"></ion-icon> <br>
                                    {{ __('Contact') }}
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">
                                    <ion-icon name="contact"></ion-icon> <br>
                                    {{ __('Login') }}
                                </a>
                            </li>
                           
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">
                                       <ion-icon name="person-add"></ion-icon> <br>
                                        {{ __('Register') }}
                                    </a>
                                </li>
                            @endif
                        @else
                            @if (Auth::user()->is_admin == 1)
                                <a class="nav-link" href="{{ route('adminMenu') }}">AdminMenu</a>           
                            @else
                                @if ( substr(URL::previous(), 22, 4) == "cart")
                                    <a class="nav-link"href="{{ route('homeShop') }}">Volver</a>
                                @else    
                                    <a class="nav-link"href="{{ URL::previous() }}">Volver</a>       
                                @endif    
                            @endif
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
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
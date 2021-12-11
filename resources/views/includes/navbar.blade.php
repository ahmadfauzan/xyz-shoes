
<!-- Navbar -->
<div class="container container-navbar">
    <nav class="navbar navbar-expand-lg navbar-light ">
        <a href="/" class="navbar-brand mt-3">
            <img src="/frontend/images/logo.png" width="40" height="40" alt="Logo" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navb"
            aria-controls="navb" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navb">
            <div class="center-nav-items ms-auto me-auto">
                <ul class="navbar-nav">
                    <li class="nav-item mx-md-2">
                        <a href="/" class="nav-link {{ $active == 'home' ? 'active' : '' }}">Home</a>
                    </li>
                    <li class="nav-item mx-md-2">
                        <a href="#" class="nav-link">Sale</a>
                    </li>
                    <li class="nav-item mx-md-2">
                        <a href="/men" class="nav-link {{ $active == 'men' ? 'active' : '' }}">Men</a>
                    </li>
                    <li class="nav-item mx-md-2">
                        <a href="/women" class="nav-link {{ $active == 'women' ? 'active' : '' }}">Women</a>
                    </li>
                    <li class="mt-3 ms-2">
                        <form class="d-flex">
                            <span class="icon" data-feather="search"></span>
                            <input class="form-control me-2" type="search" aria-label="Search">
                        </form>
                    </li>
                </ul>
            </div>


            <div class="right-nav-items ms-auto">
                <ul class="navbar-nav">
                    <li class="me-2 mt-3">
                        <a href="/cart">
                            <i data-feather="shopping-bag">  
                            </i>
                            @auth
                                @if ($cart->count()>0)     
                                    <span class="position-absolute top-1 start-80 translate-middle badge rounded-pill bg-danger">
                                        {{ $cart->count() }}
                                       
                                        <span class="visually-hidden">unread messages</span>
                                    </span>
                                @endif      
                            @endauth
                        </a>
                    </li>
                    <li class="mt-3  dropstart">
                        <a href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            @auth
                                <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}" height="25"
                                    class="rounded-circle">
                            @endauth
                            @guest
                                <i data-feather="user"></i>
                            @endguest
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
                            @auth
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <li><a class="dropdown-item" data-bs-toggle="modal" href="route('logout')"
                                            onclick="event.preventDefault();
                                                                                                                        this.closest('form').submit();" role="button">Logout</a>
                                    </li>


                                </form>
                            @endauth
                            @guest

                                <li><a class="dropdown-item" data-bs-toggle="modal" href="#exampleModalToggle"
                                        role="button">Login</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal"
                                        href="#">Register</a></li>
                            @endguest
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>

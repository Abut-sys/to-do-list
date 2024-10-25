<nav class="navbar navbar-expand-lg bg-info navbar-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('image/logo.png') }}" alt="Logo" style="height: 50px; border-radius: 5px;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @auth
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('home') ? 'active' : '' }}" href="{{ url('home') }}">
                            <i class="fas fa-home"></i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('tasks') ? 'active' : '' }}" href="{{ route('tasks.index') }}">
                            <i class="fas fa-tasks"></i> Tasks
                        </a>
                    </li>
                @endauth
            </ul>

            <!-- Move user dropdown to the right -->
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user-circle"></i> {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="userDropdown">
                            <li>
                                <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                    <i class="fas fa-user-edit"></i> Profile
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('login') ? 'active' : '' }}" href="{{ route('login') }}">
                            <i class="fas fa-sign-in-alt"></i> Login
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('register') ? 'active' : '' }}" href="{{ route('register') }}">
                            <i class="fas fa-user-plus"></i> Register
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<style>
    .navbar-nav .nav-link {
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .navbar-nav .nav-link:hover {
        background-color: rgba(255, 255, 255, 0.2);
        color: #fff;
        border-radius: 5px;
    }

    .navbar-nav .nav-link.active {
        background-color: rgba(255, 255, 255, 0.2);
        border-radius: 5px;
    }

    .dropdown-menu {
        background-color: #f8f9fa;
    }

    .dropdown-menu .dropdown-item {
        color: #212529;
        transition: background-color 0.5s ease;
    }

    .dropdown-menu .dropdown-item:hover {
        background-color: #e2e6ea;
        color: #0d6efd;
    }

    .dropdown-menu .dropdown-divider {
        background-color: rgba(0, 0, 0, 0.1);
    }
</style>

<header class="bg-light p-3 mb-3">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="{{ route('dashboard') }}"
                class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none fw-bold fs-5 me-3">
                {{ env('APP_NAME') }}
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                @guest

                @else
                <li><a href="{{ route('dashboard') }}" class="nav-link px-2 text-dark">Dashboard</a></li>
                <li><a href="{{ route('item') }}" class="nav-link px-2 text-dark">Items</a></li>
                <li><a href="{{ route('supplier') }}" class="nav-link px-2 text-dark">Suppliers</a></li>
                <li><a href="{{ route('category') }}" class="nav-link px-2 text-dark">Category</a></li>
                <li><a href="{{ route('department') }}" class="nav-link px-2 text-dark">Department</a></li>
                <li><a href="{{ route('borrower') }}" class="nav-link px-2 text-dark">Borrower</a></li>
                @endguest
            </ul>

            @guest
            <div class="text-end">
                <a href="{{ route('index') }}" class="px-2 text-dark text-decoration-none">Sign in</a>
                <a href="{{ route('register') }}" class="px-2 text-dark text-decoration-none">Sign up</a>
            </div>
            @else
            <div class="text-end">
                <div class="dropdown">
                    <a class="dropdown-toggle px-2 text-dark text-decoration-none" href="#" role="button"
                        id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}">Log out</a></li>
                    </ul>
                </div>
            </div>
            @endguest
        </div>
    </div>
</header>

<style>
    .ts-navbar {
        background: #fff;
        border-bottom: 1px solid #E5E7EB;
        padding: 0.75rem 1.5rem;
        font-family: 'Google Sans Flex', system-ui, sans-serif;
    }
    .ts-brand {
        font-weight: 700;
        font-size: 1.1rem;
        color: #16212D;
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 0.4rem;
    }
    .ts-brand:hover { color: #16212D; }
    .ts-nav-link {
        color: #4B5563;
        font-size: 0.92rem;
        font-weight: 500;
        padding: 0.4rem 0.9rem !important;
        border-radius: 6px;
    }
    .ts-nav-link.active-home {
        background: #EEF2FF;
        color: #1D4ED8;
    }
    .ts-nav-link:hover { color: #16212D; }
    .ts-icon-btn {
        width: 38px;
        height: 38px;
        border-radius: 8px;
        border: 1px solid #E5E7EB;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #4B5563;
        background: #fff;
    }
    .ts-icon-btn:hover { background: #F9FAFB; }
    .ts-signin-btn {
        font-size: 0.88rem;
        font-weight: 600;
        color: #16212D !important;
        padding: 0.45rem 0.9rem !important;
    }
    .navbar-avatar {
        width: 38px;
        height: 38px;
        border-radius: 50%;
        background-color: #0E7C6B;
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 13px;
        text-decoration: none;
    }
    .navbar-avatar:hover { color: #fff; opacity: 0.9; }
    .logout-btn {
        width: 38px;
        height: 38px;
        border-radius: 8px;
        color: #dc2626;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #fff;
    }
    .logout-btn:hover { background: #fef2f2; color: #dc2626; }

   
    .ts-nav-active {
        /* box-shadow: 0 0 0 3px rgba(14, 124, 107, 0.18); */
        /* background: #d7d2dd; */
        text-decoration: underline;
        text-decoration-thickness: 3px;
        text-underline-offset: 8px;
        font-weight: bold;
        /* color: #16212D !important; */
    }
</style>

<nav class="navbar navbar-expand-lg ts-navbar" dir="ltr">
  <div class="container-fluid d-flex align-items-center">

    <a class="navbar-brand ts-brand" href="#">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="#2563eb" stroke-width="2" viewBox="0 0 24 24">
            <rect x="3" y="4" width="18" height="12" rx="2"/><path d="M8 20h8"/><path d="M12 16v4"/>
        </svg>
        TECH STORE
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse d-flex align-items-center" id="navbarSupportedContent">

      <ul class="navbar-nav mx-auto mb-2 mb-lg-0 gap-1">
        <li class="nav-item">
  <a class="nav-link ts-nav-link {{ request()->routeIs('home') ? 'ts-nav-active' : '' }}" href="{{ route('home') }}">Home</a>
</li>
<li class="nav-item">
  <a class="nav-link ts-nav-link {{ request()->routeIs('products.*') ? 'ts-nav-active' : '' }}" href="{{ route('products.index') }}">Products</a>
</li>

@if(auth()->check() && auth()->user()->role == 'customer')
<li class="nav-item">
  <a class="nav-link ts-nav-link {{ request()->routeIs('cart.*') ? 'ts-nav-active' : '' }}" href="{{ route('cart.index') }}">Cart</a>
</li>
<li class="nav-item">
  <a class="nav-link ts-nav-link {{ request()->routeIs('orders.*') ? 'ts-nav-active' : '' }}" href="{{ route('orders.index') }}">Orders</a>
</li>
@endif
@if(auth()->check() && auth()->user()->role == 'admin')
<li class="nav-item">
  <a class="nav-link ts-nav-link {{ request()->routeIs('categories.*') ? 'ts-nav-active' : '' }}" href="{{ route('categories.index') }}">Categories</a>
</li>

@auth
<li class="nav-item">
  <a class="nav-link ts-nav-link {{ request()->routeIs('dashboard') ? 'ts-nav-active' : '' }}" href="{{ route('dashboard') }}">Dashboard</a>
</li>
@endauth
@endif
      </ul>

      <ul class="navbar-nav align-items-center gap-2">
        @guest
            @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link ts-signin-btn" href="{{ route('login') }}">{{ __('Sign in') }}</a>
                </li>
            @endif
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link ts-signin-btn" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif
        @else
            <li class="nav-item">
                <a href="{{ route('profile.show') }}" class="navbar-avatar" title="{{ Auth::user()->name }}">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}{{ strtoupper(substr(strstr(Auth::user()->name, ' '), 1, 1)) }}
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('logout') }}"
                   class="logout-btn"
                   title="{{ __('Logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                        <polyline points="16 17 21 12 16 7"/>
                        <line x1="21" y1="12" x2="9" y2="12"/>
                    </svg>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        @endguest
      </ul>

    </div>
  </div>
</nav>
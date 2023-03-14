<!-- Dropdown Structure -->
<ul id="dropdown1" class="dropdown-content">
  <li>
    <a href="{{ route('logout') }}"
      onclick="event.preventDefault();
      document.getElementById('logout-form').submit();">
      {{ __('Logout') }}
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
      @csrf
    </form>
  </li>
</ul>
<nav>
  <div class="nav-wrapper">
      <a class="navbar-brand" href="{{ url('/') }}">
          {{ config('app.name', 'Laravel') }}
      </a>

          
          <!-- Right Side Of Navbar -->
          <ul id="nav-mobile" class="right">
            <!-- Authentication Links -->
              @guest
                  @if (Route::has('login'))
                      <li>
                          <a href="{{ route('login') }}">{{ __('Login') }}</a>
                      </li>
                  @endif

                  @if (Route::has('register'))
                      <li>
                          <a href="{{ route('register') }}">{{ __('Register') }}</a>
                      </li>
                  @endif
                  @else
                  <!-- Dropdown Trigger -->
                  <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">{{ Auth::user()->name }}<i class="material-icons right">arrow_drop_down</i></a></li>
                  
              @endguest
          </ul>
      </div>
  </div>
</nav>
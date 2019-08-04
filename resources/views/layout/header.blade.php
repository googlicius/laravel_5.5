<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Seeds Reader</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <!-- Right Side Of Navbar -->
    <ul class="nav navbar-nav navbar-right">
      <!-- Authentication Links -->
      @guest
      <li class="nav-item"><a href="{{ route('login') }}">Login</a></li>
      <li class="nav-item"><a href="{{ route('register') }}">Register</a></li>
      @else
      <li class="nav-item dropdown">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
          {{ Auth::user()->name }} <span class="caret"></span>
        </a>

        <div class="dropdown-menu">
          <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout
          </a>
        </div>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
        </form>
      </li>
      @endguest
    </ul>
  </div>
</nav>

@push('js')
<script type="text/javascript">
  var SignedInHeader = new App.Common.SignedInHeader()
</script>
@endpush
<nav class="text-center">
  @if (Route::has('login'))
      <div class="top-right links">
          @auth
              <a href="{{ url('/home') }}">Panel administrativo</a>
          @else
              <a href="{{ route('login') }}">Iniciar sesión</a>

              @if (Route::has('register'))
                  <a href="{{ route('register') }}">Registrarse</a>
              @endif
          @endauth
      </div>

  @endif
    <ul class="flex-container col-center li-noStyle text-center">
        <li class="col-nav padd2"><a href="#">Título1</a></li>
        <li class="col-nav padd2"><a href="#">Título2</a></li>
        <li class="col-nav padd2"><a href="#">Título3</a></li>
        <li class="col-nav padd2"><a href="#">Título4</a></li>
    </ul>
</nav>

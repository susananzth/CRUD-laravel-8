<nav class="text-center">
  @if (Route::has('login'))
      <div class="top-right links">
              <a href="{{ url('/home') }}">Panel administrativo</a>
      </div>

  @endif
    <ul class="flex-container col-center li-noStyle text-center">
        <li class="col-nav padd2"><a href="#">Título1</a></li>
        <li class="col-nav padd2"><a href="#">Título2</a></li>
        <li class="col-nav padd2"><a href="#">Título3</a></li>
        <li class="col-nav padd2"><a href="#">Título4</a></li>
    </ul>
</nav>

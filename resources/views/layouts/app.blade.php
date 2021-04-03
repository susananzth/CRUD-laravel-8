@include('partials.top')
@include('partials.header')
@include('partials.nav')

<div class="container-fluid">
    @yield('content')
</div>

@include('partials.footer')

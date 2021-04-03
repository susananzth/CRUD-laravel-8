@include('partials.top')
@include('partials.nav')
@include('partials.header')
<div class="container-fluid">
    @yield('content')
</div>
@include('partials.footer')
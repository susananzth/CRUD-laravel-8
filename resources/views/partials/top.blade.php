<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Etiquetas meta -->
        <meta charset="utf-8">
        <meta name="DC.Language" scheme="RFC1766" content="Spanish">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="Página de guía donde coloco todo lo aprendido en cursosde laravel. Desarrollado por Susana Piñero @susananzth"/>
        <meta name="keywords" content="Laravel, Laravel 8, PHP, Tutorial de Laravel"/>
        <meta name="author" content="Susana Piñero Rodríguez" />
        <meta name="copyright" content="Susana Piñero Rodríguez" />
        <meta name="reply-to" content="susananzth@gmail.com">
        <link rev="made" href="mailto:susananzth@gmail.com">
        <meta http-equiv="cache-control" content="no-cache"/>
        <meta http-equiv="expires" content="43200"/>
        <meta name="Resource-type" content="content">
        <meta name="DateCreated" content="Thu, 02 Apr 2021 00:00:00 GMT-5">
        <meta name="Revisit-after" content="1 days">
        <meta name="robots" content="ALL">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Título de la página -->
        <title>@yield('title') - Laravel 8</title>
        <!-- Ícono -->
        <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico')}}" />
        <!-- Fuentes -->
        <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.24.1/feather.min.js" crossorigin="anonymous"></script>
        <!-- Estilos -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link href="{{  asset('css/style.css')}}" rel="stylesheet" type="text/css">
        @yield('css')
    </head>
    <body>

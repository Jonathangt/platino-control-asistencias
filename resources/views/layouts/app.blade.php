<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CONTROL DE ASISTENCIA - PLATINO</title>
    <link rel="shortcut icon" href="{{ asset('img/icono.png') }}">
    <link rel="stylesheet" href="{{ asset('css/plantilla.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
   <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.0/dist/alpine.js" defer></script> 

    <style>
        .btn-primary {
            color: #fff;
            background-color: #2c4f97 !important;
            border-color: #2c4f97 !important;
        }
    </style>
</head>

<body style="background-color: #f3f4fa;" class="hold-transition sidebar-mini layout-fixed app footer-fixed">
    <div class="row">
        <div class="col-md-12"> 
            @livewire('navigation-dropdown')
        </div>
    </div>

    <!-- Main Sidebar Container -->
    <div id="app">
        <div class="row">
            <div class="col-md-12"> 
                <div class="col-md-12">
                    <aside class="main-sidebar sidebar-dark-primary elevation-4">
                        <!-- Brand Logo -->
                        <a href="/platino" class="brand-link">
                           <!--  <img src="{{ asset('img/icono.png') }}" alt="PLATINO " class="brand-image img-circle elevation-3" 
                            style="opacity: .8"> -->
                            <span class="brand-text font-weight-light"> PLATINO </span>
                        </a>

                        <!-- Sidebar -->
                        <div class="sidebar">
                            <menu-componente></menu-componente>
                        </div>
                    </aside>
                </div>


                <div class="col-md-12"><!--  class="col-lg-12 col-md-12 col-sm-8" -->
                    <!-- Contenido Principal -->
                        <app></app>
                    <!-- Fin Contenido Principal -->
                </div>
            </div>
        </div>

    </div>

    <footer class="main-footer">
        <strong>Copyright &copy; 2020-2021 <a href="/">PLATINO</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Versión</b> 0.0.1
        </div>
    </footer>


    <script src="{{ asset('js/plantilla.js') }}"></script>
    <script src="{{ asset('js/app.js') }} " async></script> 
</body>

</html>

<!DOCTYPE html>
<html lang="ru" ng-app="app">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{asset('css/adminlte.min.css')}}">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper" id="app">

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>

                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/" class="nav-link">Главная</a>
                </li>

            </ul>

            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        <button class="btn btn-outline-secondary">
                            <i class="fas fa-sign-out-alt mr-1"></i>
                            Выйти
                        </button>
                    </form>
                </li>

            </ul>

        </nav>


        <aside class="main-sidebar sidebar-dark-primary elevation-4">

            <a href="/" class="brand-link">
                <img src="http://kazinkas.kz/img/logo.svg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                     style="opacity: .8; width: 50px; height: 50px">
                <span class="brand-text font-weight-light">TechHub</span>
            </a>

            <div class="sidebar">

                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="info">

                    </div>
                </div>

                <nav class="mt-2">

                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                        <li class="nav-item">
                            <a href="/" class="nav-link @if(isset($PAGE) && $PAGE === 'dashboard') active @endif">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Главная
                                </p>
                            </a>
                        </li>

                    </ul>

                </nav>

            </div>

        </aside>


        <div class="content-wrapper">

            <div class="content-header">

                <div class="container-fluid">

                    <h1 class="m-0 text-dark">
                        @if(isset($PAGE_TITLE)) {{$PAGE_TITLE}} @endif
                    </h1>

                </div>

            </div>

            <section class="content">
                @yield('content')
            </section>

            <br>

        </div>

    </div>

    <footer class="main-footer">
        <strong>Copyright &copy; 2020 </strong>
        Все права защищены.
    </footer>

    <script src="{{mix('js/manifest.js')}}"></script>
    <script src="{{mix('js/vendor.js')}}"></script>
    <script src="{{mix('js/app.js')}}"></script>

</body>
</html>
<!DOCTYPE html>
<html lang="ru" ng-app="app">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{asset('css/adminlte.min.css')}}">
    <link href="{{ mix('css/control-panel.css') }}" rel="stylesheet">
</head>
<body class="layout-fixed sidebar-mini hold-transition" ng-controller="MainController">

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
                    <form  method="post">
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
                <img src="https://adminlte.io/themes/v3/dist/img/AdminLTELogo.png"
                     alt="TechHub Logo"
                     class="brand-image img-circle elevation-3"
                     style="opacity: .8;">
                <span class="brand-text font-weight-light">TechHub</span>
            </a>

            <div class="sidebar">

                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Alexander Pierce</a>
                    </div>
                </div>

                <nav class="mt-2">

                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                        <li class="nav-item">
                            <a href="/" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Главная
                                </p>
                            </a>
                        </li>

                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Программы
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/control-panel/programs" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Список</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/control-panel/programs/create" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Добавить программу</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Заяки</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon far fa-plus-square"></i>
                                <p>
                                    Мероприятия
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon far fa-plus-square"></i>
                                <p>
                                    Услуги
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon far fa-plus-square"></i>
                                <p>
                                    Сотрудники
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon far fa-plus-square"></i>
                                <p>
                                    Участники
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon far fa-plus-square"></i>
                                <p>
                                    Участники
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

                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">
                                @if(isset($PAGE_TITLE)) {{$PAGE_TITLE}} @endif
                            </h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard v1</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                </div>

            </div>

            <section class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
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
    <script>
        window
            .angular
            .module('app')
            .constant('AUTH_USER', {!! \Auth::user() !!})
            .constant('AUTH_ROLES', {!! $AUTH_ROLES !!})
            .constant('AUTH_PERMISSIONS', {!! $AUTH_PERMISSIONS !!})
    </script>
</body>
</html>

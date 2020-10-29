<!DOCTYPE html>
<html lang="ru" ng-app="app">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ mix('css/control-panel.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/adminlte.min.css')}}">
</head>
<body class="layout-fixed sidebar-mini hold-transition">

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

        @include('admin.navigation')

        <div class="content-wrapper">

            <div class="content-header">

                <div class="container-fluid">

                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">
                                @if(isset($PAGE_TITLE)) {{\Str::limit($PAGE_TITLE, 70)}} @endif
                            </h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                @foreach($breadcrumb as $item)
                                    @if ($item[0])
                                        <li class="breadcrumb-item"><a href="{{$item[0]}}">{{\Str::limit($item[1], 70)}}</a></li>
                                    @else
                                        <li class="breadcrumb-item active">{{\Str::limit($item[1], 70)}}</li>
                                    @endif
                                @endforeach
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

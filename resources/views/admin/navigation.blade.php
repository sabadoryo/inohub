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
{{--                <img src="https://randomuser.me/api/portraits/men/32.jpg" class="img-circle elevation-2" alt="User Image">--}}
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <nav class="mt-2">

            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="/admin" class="nav-link {{$activePage == 'main' ? 'active' : ''}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Главная
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/admin/modules" class="nav-link {{$activePage == 'modules' ? 'active' : ''}}">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Модули
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/admin/posts" class="nav-link {{$activePage == 'posts' ? 'active' : ''}}">
                        <i class="nav-icon fas fa-paper-plane"></i>
                        <p>Посты</p>
                    </a>
                </li>

                                {{--       USERS            --}}
                <li class="nav-item">
                    <a href="/admin/users" class="nav-link {{$activePage == 'users' ? 'active' : ''}}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Пользователи</p>
                    </a>
                </li>

            </ul>

        </nav>

    </div>

</aside>

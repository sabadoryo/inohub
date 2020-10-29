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
                    <a href="/control-panel" class="nav-link {{$activePage == 'control-panel' ? 'active' : ''}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Главная</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/control-panel/acl" class="nav-link {{$activePage == 'acl' ? 'active' : ''}}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Настройка ролей</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/control-panel/admin-users" class="nav-link {{$activePage == 'admin-users' ? 'active' : ''}}">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>Сотрудники</p>
                    </a>
                </li>

                @if($currentOrganization->hasModule('astanahub_members'))
                    <li class="nav-item">
                        <a href="/control-panel/members" class="nav-link {{$activePage == 'members' ? 'active' : ''}}">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>Участники AstanaHub</p>
                        </a>
                    </li>
                @endif

                <li class="nav-item">
                    <a href="/control-panel/programs" class="nav-link {{$activePage == 'programs' ? 'active' : ''}}">
                        <i class="nav-icon fab fa-buromobelexperte"></i>
                        <p>Программы</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/control-panel/applications" class="nav-link {{$activePage == 'applications' ? 'active' : ''}}">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Заявки
                        </p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="/control-panel/news" class="nav-link {{$activePage == 'news' ? 'active' : ''}}">
                        <i class="nav-icon far fa-newspaper"></i>
                        <p>Новости</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/control-panel/events" class="nav-link {{$activePage == 'events' ? 'active' : ''}}">
                        <i class="nav-icon fas fa-calendar"></i>
                        <p>Мероприятия</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/control-panel/vacancies" class="nav-link {{$activePage == 'vacancies' ? 'active' : ''}}">
                        <i class="nav-icon fas fa-scroll"></i>
                        <p>Вакансии</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/control-panel/posts" class="nav-link {{$activePage == 'posts' ? 'active' : ''}}">
                        <i class="nav-icon fas fa-paper-plane"></i>
                        <p>Посты</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/control-panel/projects" class="nav-link {{$activePage == 'projects' ? 'active' : ''}}">
                        <i class="nav-icon fas fa-cubes"></i>
                        <p>Проекты</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/control-panel/forms" class="nav-link {{$activePage == 'forms' ? 'active' : ''}}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Настройка форм</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/control-panel/users" class="nav-link {{$activePage == 'users' ? 'active' : ''}}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Пользователи</p>
                    </a>
                </li>





                <li class="nav-item">
                    <a href="/control-panel/roles" class="nav-link {{$activePage == 'roles' ? 'active' : ''}}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Роли</p>
                    </a>
                </li>



                @can('applications.show')
                    <li class="nav-item">
                        <a href="/control-panel/applications" class="nav-link {{$activePage == 'applications' ? 'active' : ''}}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Заявки</p>
                        </a>
                    </li>
                @endcan

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-plus-square"></i>
                        <p>
                            Услуги
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview">
                    <a href=""
                       class="nav-link {{$activePage === 'corp-task-solutions' || $activePage === 'corp-tasks' ? 'active' : ''}}">
                        <i class="nav-icon fas fa-credit-card"></i>
                        <p>
                            Корп.инновации
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/control-panel/corp-task-solutions" class="nav-link {{$activePage === 'corp-task-solutions' ? 'active' : ''}}">
                                <i class="far fa-circle"></i>
                                <p>
                                    Решения
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/control-panel/corp-tasks" class="nav-link {{$activePage === 'corp-tasks' ? 'active' : ''}}">
                                <i class="far fa-circle"></i>
                                <p>
                                    Задачи
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="/control-panel/hub-space-tenants" class="nav-link {{$activePage == 'hub-space-tenants' ? 'active' : ''}}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Арендаторы Hub Space</p>
                    </a>
                </li>

            @can('applications.show')
                    <li class="nav-item">
                        <a href="/control-panel/applications" class="nav-link {{$activePage == 'applications' ? 'active' : ''}}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Заявки</p>
                        </a>
                    </li>
                @endcan






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

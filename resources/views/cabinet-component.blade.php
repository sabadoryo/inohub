@extends('main.layout')

@section('content')

    <div class="content__welcome-section profile-welcome-section">

        <a href="#" class="profile-welcome-section__img-box">
            <img src="/img/user-avatar.png" alt="" class="profile-welcome-section__img">
        </a>

        <div class="profile-welcome-section__text">
            <div class="profile-welcome-section__name">Олжас Аскаров</div>
            <div class="profile-welcome-section__username">@olzh01</div>
        </div>

        <div class="profile-welcome-section__circles"></div>

    </div>

    <div class="content__tabs tabs">

        <div class="tabs__links">
            <a href="/cabinet" class="tabs__link {{$activeTab == 'profile' ? 'tabs__link--active' : ''}}">
                Профиль
            </a>
            <a href="/cabinet/applications" class="tabs__link {{$activeTab == 'applications' ? 'tabs__link--active' : ''}}">
                Заявки
            </a>
            <a href="/astana-hub/notifications" class="tabs__link {{$activeTab == 'notifications' ? 'tabs__link--active' : ''}}">
                Уведомления
                <span class="tabs__badge as-badge">12</span>
            </a>
        </div>

        <div class="tabs-content tabs-inner">

            <{{$component}}
            @if(isset($bindings))
                @foreach($bindings as $key => $value)
                    {{$key}}="{{$value}}"
                @endforeach
            @endif></{{$component}}>

        </div>

    </div>


{{--    <div class="container" ng-controller="CabinetController">--}}
{{--        <div class="row">--}}
{{--            <div class="col-3">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-body">--}}
{{--                        <ul class="nav nav-pills flex-column">--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link {{$activeTab == 'profile' ? 'active' : null}}" href="/cabinet">Профиль</a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link {{$activeTab == 'projects' ? 'active' : null}}" href="/cabinet/project">Анкета проекта</a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-9">--}}

{{--                <{{$component}}--}}
{{--                @if(isset($bindings))--}}
{{--                    @foreach($bindings as $key => $value)--}}
{{--                        {{$key}}="{{$value}}"--}}
{{--                    @endforeach--}}
{{--                @endif></{{$component}}>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

@endsection

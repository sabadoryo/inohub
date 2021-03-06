@extends('main.layout')

@section('content')

    <div class="content__welcome-section welcome-section">

        <img src="/img/astana-hub-poster.png" alt="" class="welcome-section__poster">

        <div class="welcome-section__title">Astana Hub</div>

    </div>

    <div class="content__tabs tabs">

        <div class="tabs__links">
            <a href="/astana-hub/about" class="tabs__link {{$activePage == 'about' ? 'tabs__link--active' : ''}}">
                О нас
            </a>
            <a href="/astana-hub/programs" class="tabs__link {{$activePage == 'programs' ? 'tabs__link--active' : ''}}">
                Программы
            </a>
            <a href="/astana-hub/corporate-innovations" class="tabs__link {{$activePage == 'corp-innovations' ? 'tabs__link--active' : ''}}">
                Корпоративные инновации
            </a>
            <a href="/astana-hub/hub-space" class="tabs__link {{$activePage == 'hub-space' ? 'tabs__link--active' : ''}}">
                Hub Space
            </a>
            <a href="/astana-hub/r-and-d" class="tabs__link {{$activePage == 'randd' ? 'tabs__link--active' : ''}}">
                R&D
            </a>
            <a href="/astana-hub/resources" class="tabs__link {{$activePage == 'resources' ? 'tabs__link--active' : ''}}">
                Ресурсы
            </a>
        </div>

        <{{$component}}
            @if(isset($bindings))
                @foreach($bindings as $key => $value)
                    {{$key}}="{{$value}}"
                @endforeach
            @endif>
        </{{$component}}>

    </div>

@endsection
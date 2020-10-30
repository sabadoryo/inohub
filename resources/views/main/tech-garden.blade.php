@extends('main.layout')

@section('content')

    <div class="content__welcome-section welcome-section">

        <img src="/img/astana-hub-poster.png" alt="" class="welcome-section__poster">

        <div class="welcome-section__title">Tech Garden</div>

    </div>

    <div class="content__tabs tabs">

        <div class="tabs__links">
            <a href="/tech-garden/about" class="tabs__link {{$activePage == 'about' ? 'tabs__link--active' : ''}}">
                О нас
            </a>
            <a href="/tech-garden/programs" class="tabs__link {{$activePage == 'programs' ? 'tabs__link--active' : ''}}">
                Программы
            </a>
            <a href="/tech-garden/smart-store" class="tabs__link {{$activePage == 'smart-store' ? 'tabs__link--active' : ''}}">
                Smart Store
            </a>
            <a href="/tech-garden/laboratories" class="tabs__link {{$activePage == 'hub-space' ? 'tabs__link--active' : ''}}">
                Технологические лаборатории
            </a>
            <a href="/tech-garden/library" class="tabs__link {{$activePage == 'randd' ? 'tabs__link--active' : ''}}">
                База знании
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

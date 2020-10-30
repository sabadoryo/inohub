@extends('main.layout')

@section('content')

    <div class="content__welcome-section welcome-section">

        <img src="/img/cett-poster.png" alt="" class="welcome-section__poster">

        <div class="welcome-section__title">АО ЦИТТ</div>

    </div>

    <div class="content__tabs tabs">

        <div class="tabs__links">
            <a href="/ao-cett/about" class="tabs__link {{$activePage == 'about' ? 'tabs__link--active' : ''}}">
                О нас
            </a>
            <a href="/ao-cett/grants" class="tabs__link {{$activePage == 'grants' ? 'tabs__link--active' : ''}}">
                Гранты
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

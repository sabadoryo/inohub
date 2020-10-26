@extends('main.layout')

@section('content')

    <div class="container" ng-controller="CabinetController">
        <div class="row">
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-pills flex-column">
                            <li class="nav-item">
                                <a class="nav-link {{$activeTab == 'profile' ? 'active' : null}}" href="/cabinet">Профиль</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{$activeTab == 'projects' ? 'active' : null}}" href="/cabinet/project">Анкета проекта</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-9">

                <{{$component}}
                @if(isset($bindings))
                    @foreach($bindings as $key => $value)
                        {{$key}}="{{$value}}"
                    @endforeach
                @endif></{{$component}}>

            </div>
        </div>
    </div>

@endsection

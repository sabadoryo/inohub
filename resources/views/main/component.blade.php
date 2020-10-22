@extends('main.layout')

@section('content')

    <div class="container">
        <{{$component}}
            @if(isset($bindings))
                @foreach($bindings as $key => $value)
                    {{$key}}="{{$value}}"
                @endforeach
            @endif>
        </{{$component}}>
    </div>

@endsection
@extends('main.layout')

@section('content')

    <{{$component}}
        @if(isset($bindings))
            @foreach($bindings as $key => $value)
                {{$key}}="{{$value}}"
            @endforeach
        @endif>
    </{{$component}}>

@endsection
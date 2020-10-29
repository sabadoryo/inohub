@extends('main.layout')

@section('content')

    <div style="font-size: 16px">

        <div style="margin-bottom: 30px; font-weight: bold">{{$news->title}}</div>

        @foreach($news->data as $item)
            @if($item['type'] == 'text')
                <div style="margin-bottom: 10px">
                    {!! $item['content'] !!}
                </div>
            @endif
            @if($item['type'] == 'image')
                <div style="margin-bottom: 10px">
                    <img src="{{$item['image']}}" style="display: block; width: 400px" alt="">
                </div>
            @endif
        @endforeach
    </div>

@endsection
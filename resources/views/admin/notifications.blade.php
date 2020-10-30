@extends('admin.layout')

@section('content')

    @foreach($notifications as $notification)
        <div class="card mb-2">
            <div class="card-body">
                @switch($notification->type)
                    @case('App\Notifications\NewStartupCreated')
                        Пользователь {{$notification->data['user_full_name']}} добавил новый стартап
                        "{{$notification->data['project_name']}}".
                        <a href="/admin/startups?id={{$notification->data['startup_id']}}">Открыть</a>
                        @break;
                @endswitch
            </div>
        </div>
    @endforeach

    {!! $notifications->links() !!}

@endsection
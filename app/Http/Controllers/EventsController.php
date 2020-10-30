<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function index()
    {

        $events = Event::all();
        $eventsWeek = Event::query()->where('start_date')->get();
        $eventsMonth = Event::query()->where('start_date')->get();
        $eventsOverMonth = Event::query()->where('start_date')->get();

        $bindings = [
            'eventsWeek' => $eventsWeek,
            'eventsMonth' => $eventsMonth,
            'eventsOverMonth' => $eventsOverMonth
        ];

        return view('main.component', [
            'PAGE_TITLE' => 'Мероприятия',
            'activePage' => 'events',
            'component' => 'events-list',
            'bindings' => $bindings
        ]);
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);

        $bindings = [
            'event' => $event
        ];

        return view('main.component', [
            'PAGE_TITLE' => 'Мероприятия',
            'activePage' => 'events',
            'component' => 'event-page',
            'bindings' => $bindings
        ]);
    }
}

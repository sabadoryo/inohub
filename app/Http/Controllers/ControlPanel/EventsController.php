<?php

namespace App\Http\Controllers\ControlPanel;

use App\Event;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function index()
    {
        $breadcrumb = [
            ['/control-panel', 'Главная'],
            [null, 'Мероприятия']
        ];

        $bindings = [
//            'organizations' => $organizations
        ];

        return view('control-panel.component', [
            'PAGE_TITLE' => 'Мероприятия',
            'activePage' => 'events',
            'breadcrumb' => $breadcrumb,
            'component' => 'events-control',
            'bindings' => $bindings
        ]);
    }

    public function getList()
    {
        $events = Event::all();

        return $events;
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'startDate' => 'required',
            'endDate' => 'required|after:startDate',
            'startDateTime' => 'required|min:5',
            'endDateTime' => 'required|min:5',
            'image' => 'required|file'
        ]);

        $startDate = explode('T', $request->startDate);
        $endDate = explode('T', $request->endDate);

        $startDateTime = explode(':', $request->startDateTime);
        $endDateTime = explode(':', $request->endDateTime);

        $path = null;
        if ($request->image !== "null") {
            $path = \Storage::disk('public')->put('events_images',$request->image);
        }

        $event = Event::create([
            'name' => $data['name'],
            'start_date' => Carbon::create($startDate[0])->setHour($startDateTime[0])->setMinute($startDateTime[1]),
            'end_date' => Carbon::create($endDate[0])->setHour($endDateTime[0])->setMinute($endDateTime[1]),
            'short_description' => $request->shortDescription,
            'image_path' => $path,
        ]);

        return $event;
    }
}

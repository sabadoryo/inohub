<?php

namespace App\Http\Controllers\ControlPanel;

use App\Event;
use App\Form;
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
        ];

        return view('control-panel.component', [
            'PAGE_TITLE' => 'Мероприятия',
            'activePage' => 'events',
            'breadcrumb' => $breadcrumb,
            'component' => 'events-control',
            'bindings' => $bindings
        ]);
    }

    public function getList(Request $request)
    {
        $query = Event::query();
    
        if ($request->name) {
            $query->where(
                'name',
                'like',
                $request->name . '%'
            );
        }
    
        $result = $query->orderBy('id', 'desc')
            ->paginate(10);

        return $result;
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'start_date' => 'required',
            'start_date_time' => 'required',
        ]);
        
        $date = new Carbon($request->start_date);
        $time = new Carbon($request->start_date_time);
        $date->setTimeFrom($time);
        
        $event = Event::create([
            'name' => $request->name,
            'start_date' => $date,
        ]);
        
        return ['id' => $event->id];
    }
    
    public function mainForm($id)
    {
        $event = Event::find($id);
    
        $breadcrumb = [
            ['/control-panel', 'Главная'],
            ['/control-panel/events', 'Мероприятия'],
            [null, $event->name],
        ];
        
        $event->start_date = $event->start_date->format('Y-m-d H:i');
        
        return view('control-panel.component', [
            'component' => 'event-main-form',
            'bindings' => [
                'event' => $event,
            ],
            'PAGE_TITLE' => $event->name,
            'activePage' => 'events',
            'breadcrumb' => $breadcrumb,
        ]);
    }
    
    public function pageForm($id)
    {
        $event = Event::find($id);
        
        $breadcrumb = [
            ['/control-panel', 'Главная'],
            ['/control-panel/events', 'Мероприятия'],
            [null, $event->name],
        ];
        
        return view('control-panel.component', [
            'component' => 'event-page-form',
            'bindings' => [
                'event' => $event,
            ],
            'PAGE_TITLE' => $event->name,
            'activePage' => 'events',
            'breadcrumb' => $breadcrumb,
        ]);
    }
    
    public function forms($id)
    {
        $event = Event::with(['forms'])->find($id);
        
        $breadcrumb = [
            ['/control-panel', 'Главная'],
            ['/control-panel/events', 'Мероприятия'],
            [null, $event->name],
        ];
        
        return view('control-panel.component', [
            'component' => 'event-forms',
            'bindings' => [
                'event' => $event,
            ],
            'PAGE_TITLE' => $event->name,
            'activePage' => 'events',
            'breadcrumb' => $breadcrumb,
        ]);
    }
    
    public function updateMain(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3|max:255',
            'start_date' => 'required',
            'start_date_time' => 'required',
        ], [
            'name.required' => 'Введите название мероприятия',
            'name.min' => 'Название мероприятия должно содержать больше :min символов',
            'name.max' => 'Название мероприятия должен содержать меньше :max символов',
            'start_date.required' => 'Выберите дату провидения мероприятия',
            'start_date_time.required' => 'Выберите время провидения мероприятия',
        ]);
        
        $event = Event::find($id);
    
        $date = new Carbon($request->start_date);
        $time = new Carbon($request->start_date_time);
        $date->setTimeFrom($time);
    
        $path = null;
        if ($request->image !== "null") {
            $path = \Storage::disk('public')->put('events_images',$request->image);
        }
        
        $event->update([
            'name' => $request->name,
            'start_date' => $date,
            'short_description' => $request->short_description,
            'image_path' => $path,
        ]);
        
        return [];
    }
    
    public function updateFormsList($id)
    {
        $forms = Form::all();
        
        return [
            'forms' => $forms,
        ];
    }
    
    public function updateForms(Request $request, $id)
    {
        $event = Event::find($id);
        
        $data = [];
        
        foreach ($request->forms as $key => $form) {
            $data[$form['id']] = [
                'order_number' => $key,
            ];
        }
    
        $event->forms()->sync($data);
        
        return [];
    }
    
    public function publish($id, Request $request)
    {
        $event = Event::find($id);
        
        $event->update([
            'status' => 'published',
        ]);
    }
}

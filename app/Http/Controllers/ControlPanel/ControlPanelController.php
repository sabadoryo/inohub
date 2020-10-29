<?php

namespace App\Http\Controllers\ControlPanel;

use App\Application;
use App\Http\Controllers\Controller;
use App\Member;
use App\TestModel;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ControlPanelController extends Controller
{
    protected $organization;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->organization = \Auth::user()
                ->organization()
                ->with('modules')
                ->first();

            view()->share('currentOrganization', $this->organization);

            return $next($request);
        });
    }

    public function controlPanel()
    {
        $breadcrumb = [
            [null, 'Главная']
        ];

        return view('control-panel.component', [
            'PAGE_TITLE' => 'Панель управления',
            'component' => 'control-panel',
            'breadcrumb' => $breadcrumb,
            'activePage' => 'control-panel'
        ]);
    }

    public function getApplicationsList(Request $request)
    {
        if ($request->app_date_range === 'day') {
             $applications = Application::where('created_at', '>=', Carbon::today())->get();
        } elseif ($request->app_date_range === 'month') {
            $query = Application::query();
            $applications = $query->where('created_at', '<', Carbon::today()->addDay())
                                    ->where('created_at', '>=', Carbon::today()->subMonth())->get();
        } elseif ($request->app_date_range === 'year') {
            $query = Application::query();
            $applications = $query->where('created_at', '<', Carbon::today()->addDay())
                ->where('created_at', '>=', Carbon::today()->subYear())->get();
        }

        $open = $applications->where('status', 'process');

        $processing = $applications->where('status', 'processing');

        $closed = $applications->where('status', 'closed');

        return ['open' => $open, 'closed' => $closed, 'processing' => $processing];
    }

    public function getChartMembersList(Request $request)
    {
        $days = 31;

        $members = Member::all();

        $today = Carbon::today();

        $chartMembers = [];

        while ($days) {
            $date = $today->copy()->subDays($days);
            $chartMembers[] = $members->where('created_at', '<=', $date)->count();
            $days--;
        }

        return ['chartMembers' => $chartMembers];
    }

    public function getUsersList(Request $request)
    {
        $users = User::with('applications')->get();

        foreach ($users as $user) {
            if ($request->user_apps_date_range === 'day') {
                $user->applications = Application::where('created_at', '>=', Carbon::today())->get();
            } elseif ($request->user_apps_date_range === 'month') {
                $query = Application::query();
                $user->applications = $query->where('created_at', '<', Carbon::today()->addDay())
                    ->where('created_at', '>=', Carbon::today()->subMonth())->get();
            } elseif ($request->user_apps_date_range === 'year') {
                $query = Application::query();
                $user->applications = $query->where('created_at', '<', Carbon::today()->addDay())
                    ->where('created_at', '>=', Carbon::today()->subYear())->get();
            }

            $user->processingApps = $user->applications->where('status', 'processing')->count();

            $user->closedApps = $user->applications->where('status', 'closed')->count();
        }

        return ['users' => $users];
    }


}

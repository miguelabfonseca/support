<?php

namespace App\Http\Controllers\Tenant\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;

class DashboardController extends Controller
{
    /**
     * Display the dashboard view.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        // $array = config('filesystems.links');
        // $array[public_path('cl/6cbb79eb-f898-435e-947b-55e64eaee63d')] = storage_path('storage6cbb79eb-f898-435e-947b-55e64eaee63d/app/public');
        // config(['filesystems.links' => $array]);
        // Artisan::call('storage:link');

        return view('tenant.dashboard.index', ['themeAction' => 'dashboard_1']);
    }

}

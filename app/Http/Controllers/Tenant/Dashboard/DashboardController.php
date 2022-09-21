<?php

namespace App\Http\Controllers\Tenant\Dashboard;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Display the dashboard view.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        return view('tenant.dashboard.index', ['themeAction' => 'dashboard_1']);
    }

}

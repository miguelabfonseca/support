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
        $action = 'dashboard_1';

        return view('tenant.dashboard.index', compact('action'));
    }


}

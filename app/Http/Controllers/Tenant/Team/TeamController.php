<?php

namespace App\Http\Controllers\Tenant\Team;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;

class TeamController extends Controller
{
    /**
     * Display the user list.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $action = 'table_datatable_basic';
        return view('tenant.team.index', compact('action'));
    }

}

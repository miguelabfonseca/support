<?php

namespace App\Http\Controllers\Tenant\TeamMember;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Tenant\TeamMember\TeamMemberRepository;
use App\Http\Requests\Tenant\TeamMember\TeamMemberFormRequest;
use App\Models\Tenant\TeamMember;

class TeamMemberController extends Controller
{

    // public function __construct(private BrandsRepository $repository)
    // {

    // }
    /**
     * Display the customers list.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view('tenant.teammember.index', [
            'themeAction' => 'table_datatable_basic',
            'status' => session('status'),
            'message' => session('message'),
        ]);
    }

    /**
     * Create ustomer.
     *
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {
        $themeAction = 'form_element';
        return view('tenant.teammember.create', compact('themeAction'));
    }

    public function edit(TeamMember $teamMember)
    {
        $themeAction = 'form_element';
        return view('tenant.teammember.edit', compact('teamMember', 'themeAction'));
    }

    public function store(TeamMember $teamMember, TeamMemberFormRequest $request)
    {
        $teamMember = TeamMember::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile_phone' => $request->mobile_phone,
            'job' => $request->job,
            'additional_information' => $request->additional_information,
        ]);

        return to_route('tenant.team-member.index')
            ->with('message', __('Team member created with success!'))
            ->with('status', 'sucess');
    }

    public function update(TeamMember $teamMember, TeamMemberFormRequest $request)
    {
        $teamMember->fill($request->all());
        $teamMember->save();

        return to_route('tenant.team-member.index')
            ->with('message', __('Team member updated with success!'))
            ->with('status', 'sucess');
    }

    public function destroy(TeamMember $teamMember)
    {
        $teamMember->delete();
        return to_route('tenant.team-member.index')
            ->with('message', __('Team member deleted with success!'))
            ->with('status', 'sucess');
    }

}

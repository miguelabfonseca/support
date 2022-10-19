<?php

namespace App\Repositories\Tenant\TeamMember;

use App\Http\Requests\Tenant\TeamMember\TeamMemberFormRequest;
use App\Models\Tenant\TeamMember;
use Illuminate\Support\Facades\DB;

class EloquentTeamMemberRepository implements TeamMemberRepository
{
    public function add(TeamMemberFormRequest $request): TeamMember
    {
        return DB::transaction(function () use ($request) {
            $teamMember = TeamMember::create([
                'name' => $request->name,
                'email' => $request->email,
                'mobile_phone' => $request->mobile_phone,
                'job' => $request->job,
                'additional_info' => $request->additional_info,
            ]);
            return $teamMember;
        });
    }

}

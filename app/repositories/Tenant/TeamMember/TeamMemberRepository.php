<?php

namespace App\Repositories\Tenant\TeamMember;

use App\Http\Requests\Tenant\TeamMember\TeamMemberFormRequest;
use App\Models\Tenant\TeamMember;

interface TeamMemberRepository
{
    public function add(TeamMemberFormRequest $request): TeamMember;

    //public function update(BrandsFormRequest $request): Brands;

}

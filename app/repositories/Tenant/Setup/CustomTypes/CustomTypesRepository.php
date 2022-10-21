<?php

namespace App\Repositories\Tenant\Setup\CustomTypes;

use App\Http\Requests\Tenant\Setup\CustomTypes\CustomTypesFormRequest;
use App\Models\Tenant\CustomTypes;

interface CustomTypesRepository
{
    public function add(CustomTypesFormRequest $request): CustomTypes;

}

<?php

namespace App\Repositories\Tenant\Setup\Services;

use App\Http\Requests\Tenant\Setup\Services\ServicesFormRequest;
use App\Models\Tenant\Services;

interface ServicesRepository
{
    public function add(ServicesFormRequest $request): Services;

    public function update(ServicesFormRequest $request): Services;

}

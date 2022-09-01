<?php

namespace App\Repositories\Tenant\Setup\Brands;

use App\Http\Requests\Tenant\Setup\Brands\BrandsFormRequest;
use App\Models\Tenant\Brands;

interface BrandsRepository
{
    public function add(BrandsFormRequest $request): Brands;
}

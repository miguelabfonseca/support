<?php

namespace App\Repositories\Tenant\CustomerLocations;

use App\Http\Requests\Tenant\CustomerLocations\CustomerLocationsFormRequest;
use App\Models\Tenant\CustomerLocations;

interface CustomerLocationsRepository
{
    public function add(CustomerLocationsFormRequest $request): CustomerLocations;

    //public function update(BrandsFormRequest $request): Brands;

}

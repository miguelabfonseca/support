<?php

namespace App\Repositories\Tenant\CustomerLocations;

use App\Http\Requests\Tenant\CustomerLocations\CustomerLocationsFormRequest;
use App\Models\Tenant\CustomerLocations;
use Illuminate\Support\Facades\DB;

class EloquentCustomerLocationsRepository implements CustomerLocationsRepository
{
    public function add(CustomerLocationsFormRequest $request): CustomerLocations
    {
        return DB::transaction(function () use ($request) {
            $teamMember = CustomerLocations::create([
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

<?php

namespace App\Repositories\Tenant\Setup\Services;


use App\Http\Requests\Tenant\Setup\Services\ServicesFormRequest;
use App\Models\Tenant\Services;
use Illuminate\Support\Facades\DB;

class EloquentServicesRepository implements ServicesRepository
{
    public function add(ServicesFormRequest $request): Services
    {
        return DB::transaction(function () use ($request) {
            $service = Services::create([
                'name' => $request->name,
                'description' => $request->description,
                'type' => $request->type,
                'payment' => $request->payment
            ]);
            return $service;
        });
    }

    public function update(ServicesFormRequest $request): Services
    {
        dd($request);
    }

}

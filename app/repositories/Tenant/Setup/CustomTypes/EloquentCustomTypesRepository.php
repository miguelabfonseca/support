<?php

namespace App\Repositories\Tenant\Setup\CustomTypes;

use App\Http\Requests\Tenant\Setup\CustomTypes\CustomTypesFormRequest;
use App\Models\Tenant\CustomTypes;
use Illuminate\Support\Facades\DB;

class EloquentCustomTypesRepository implements CustomTypesRepository
{
    public function add(CustomTypesFormRequest $request): CustomTypes
    {
        return DB::transaction(function () use ($request) {
            $customTypes = CustomTypes::create([
                'name' => $request->name,
                'description' => $request->description,
                'type' => $request->type,
                'payment' => $request->payment
            ]);
            return $customTypes;
        });
    }

}

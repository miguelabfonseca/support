<?php

namespace App\Repositories\Tenant\Setup\Brands;

use App\Http\Requests\Tenant\Setup\Brands\BrandsFormRequest;
use App\Models\Tenant\Brands;
use Illuminate\Support\Facades\DB;

class EloquentBrandsRepository implements BrandsRepository
{
    public function add(BrandsFormRequest $request): Brands
    {
        return DB::transaction(function () use ($request) {
            $brand = Brands::create([
                'name' => $request->name,
                'image' => $request->image,
            ]);
            return $brand;
        });
    }

    public function update(BrandsFormRequest $request): Brands
    {
        dd($request);
    }

}

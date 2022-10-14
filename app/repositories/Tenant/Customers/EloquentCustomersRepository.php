<?php

namespace App\Repositories\Tenant\Customers;

use App\Http\Requests\Tenant\Customers\CustomersFormRequest;
use App\Models\Tenant\Customers;
use Illuminate\Support\Facades\DB;

class EloquentCustomersRepository implements CustomersRepository
{
    public function add(CustomersFormRequest $request): Customers
    {
        return DB::transaction(function () use ($request) {
            $Customer = Customers::create([
                'name' => $request->name,
                'vat' => $request->vat,
                'phone' => $request->phone,
                'email' => $request->email,
                'address' => $request->address,
                'district' => $request->district,
                'county' => $request->county,
                'zipcode' => $request->zipcode,
            ]);
            return $Customer;
        });
    }

}


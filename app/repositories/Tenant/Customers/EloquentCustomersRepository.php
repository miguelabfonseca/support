<?php

namespace App\Repositories\Tenant\Customers;

use App\Http\Requests\Tenant\Customers\CustomersFormRequest;
use App\Models\Tenant\CustomerLocations;
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
                'contact' => $request->contact,
                'email' => $request->email,
                'address' => $request->address,
                'district' => $request->district,
                'county' => $request->county,
                'zipcode' => $request->zipcode,
            ]);
            $CustomerLocation = CustomerLocations::create([
                'description' => __('Main address'),
                'customer_id' => $Customer->id,
                'address' => $request->address,
                'zipcode' => $request->zipcode,
                'district_id' => $request->district,
                'county_id' => $request->county,
                'contact' => $request->contact,
                'manager_name' => '-',
                'manager_contact' => '0',
            ]);
            return $Customer;
        });
    }

}


<?php

namespace App\Repositories\Tenant\Customers;

use App\Http\Requests\Tenant\Customers\CustomersFormRequest;
use App\Models\Tenant\Customers;

interface CustomersRepository
{
    public function add(CustomersFormRequest $request): Customers;

    //public function update(BrandsFormRequest $request): Brands;

}

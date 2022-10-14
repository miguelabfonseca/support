<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Tenant\Customers\CustomersRepository;
use App\Repositories\Tenant\Customers\EloquentCustomersRepository;

class CustomersRepositoryProvider extends ServiceProvider
{
    public array $bindings = [
        CustomersRepository::class => EloquentCustomersRepository::class
    ];
}

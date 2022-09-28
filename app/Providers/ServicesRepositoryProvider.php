<?php

namespace App\Providers;

use App\Repositories\Tenant\Setup\Services\EloquentServicesRepository;
use App\Repositories\Tenant\Setup\Services\ServicesRepository;
use Illuminate\Support\ServiceProvider;

class ServicesRepositoryProvider extends ServiceProvider
{
    public array $bindings = [
        ServicesRepository::class => EloquentServicesRepository::class
    ];
}

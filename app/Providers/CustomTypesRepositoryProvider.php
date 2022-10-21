<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\Tenant\Setup\CustomTypes\CustomTypesRepository;
use App\Repositories\Tenant\Setup\CustomTypes\EloquentCustomTypesRepository;

class CustomTypesRepositoryProvider extends ServiceProvider
{
    public array $bindings = [
        CustomTypesRepository::class => EloquentCustomTypesRepository::class
    ];
}

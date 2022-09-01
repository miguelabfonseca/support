<?php

namespace App\Providers;

use App\Repositories\Tenant\Setup\Brands\EloquentBrandsRepository;
use App\Repositories\Tenant\Setup\Brands\BrandsRepository;
use Illuminate\Support\ServiceProvider;

class BrandsRepositoryProvider extends ServiceProvider
{
    public array $bindings = [
        BrandsRepository::class => EloquentBrandsRepository::class
    ];
}

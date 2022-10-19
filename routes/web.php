<?php

use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/foo', function () {
//     return view('welcome');
// })->middleware(['universal', InitializeTenancyByDomain::class]);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/createdemo/{domain}', function ($domain) {
    $tenant1 = App\Models\Tenant::create();
    $tenant1->domains()->create(['domain' => $domain, 'tenant_id' => $tenant1->id]);
    App\Models\Tenant::all()->runForEach(function () {//erro
        App\Models\User::factory()->create();
    });
    mkdir(storage_path('tenants/' . $tenant1->id));
    mkdir(storage_path('tenants/' . $tenant1->id . '/app'));
    mkdir(storage_path('tenants/' . $tenant1->id . '/app/public'));

    $array = config('filesystems.links');
    $array[public_path('cl/' . $tenant1->id)] = storage_path('tenants/' . $tenant1->id . '/app/public');
    config(['filesystems.links' => $array]);
    print_r($array);
    Artisan::call('storage:link');
    echo (tenant_asset('sd'));

});



require __DIR__.'/auth.php';

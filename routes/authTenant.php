<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Tenant\Team\TeamController;
use App\Http\Controllers\Tenant\Tasks\TasksController;
use App\Http\Controllers\Tenant\Setup\BrandsController;
use App\Http\Controllers\Tenant\Setup\ServicesController;
use App\Http\Controllers\Tenant\Auth\NewPasswordController;
use App\Http\Controllers\Tenant\Auth\VerifyEmailController;
use App\Http\Controllers\Tenant\Setup\CustomTypesController;
use App\Http\Controllers\Tenant\Auth\RegisteredUserController;
use App\Http\Controllers\Tenant\Customers\CustomersController;
use App\Http\Controllers\Tenant\Dashboard\DashboardController;
//use App\Http\Controllers\Tenant\User\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Tenant\TeamMember\TeamMemberController;
use App\Http\Controllers\Tenant\Auth\PasswordResetLinkController;
use App\Http\Controllers\Tenant\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Tenant\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Tenant\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Tenant\CustomerServices\CustomerServicesController;
use App\Http\Controllers\Tenant\CustomerLocations\CustomerLocationsController;



Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store'])
        ->name('tenant.verify');

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.update');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    // Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
    //     ->middleware('throttle:6,1')
    //     ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    Route::get('dashboard', [DashboardController::class, 'show'])
        ->name('tenant.dashboard');

    // Route::prefix('tasks')->group(function () {
    //     Route::get('list', [TeamController::class, 'index'])
    //         ->name('tenant.tasks.list');
    //     Route::prefix('reports')->group(function () {
    //         Route::get('list', [TeamController::class, 'index'])
    //             ->name('tenant.tasks.reports.list');
    //     });
    // });

    // Route::prefix('devices')->group(function () {
    //     Route::get('list', [TeamController::class, 'index'])
    //         ->name('tenant.devices.list');
    // });

    // Route::prefix('services')->group(function () {
    //     Route::get('list', [TeamController::class, 'index'])
    //         ->name('tenant.services.list');
    // });


    // Route::prefix('partners')->group(function () {
    //     Route::get('list', [TeamController::class, 'index'])
    //         ->name('tenant.partners.list');
    // });

    // Route::prefix('team')->group(function () {
    //     Route::get('list', [TeamController::class, 'index'])
    //         ->name('tenant.team.list');
    // });
    Route::resource('tasks', TasksController::class, [
        'as' => 'tenant'
    ]);

    Route::resource('services', CustomerServicesController::class, [
        'as' => 'tenant'
    ]);


    Route::resource('customers', CustomersController::class, [
        'as' => 'tenant'
    ]);

    Route::resource('team-member', TeamMemberController::class, [
        'as' => 'tenant'
    ]);

    Route::resource('customer-locations', CustomerLocationsController::class, [
        'as' => 'tenant'
    ]);


    Route::prefix('setup')->group(function () {
        // Route::prefix('devices')->group(function () {
        //     Route::get('list', [TeamController::class, 'index'])
        //         ->name('tenant.setup.devices.list');
        // });

        Route::resource('brands', BrandsController::class, [
            'as' => 'tenant.setup'
        ]);

        Route::resource('services', ServicesController::class, [
            'as' => 'tenant.setup'
        ]);

        Route::resource('custom-types', CustomTypesController::class, [
            'as' => 'tenant.setup'
        ]);


        // Route::prefix('parts')->group(function () {
        //     Route::get('list', [TeamController::class, 'index'])
        //         ->name('tenant.setup.parts.list');
        // });
        // Route::prefix('attributes')->group(function () {
        //     Route::get('list', [TeamController::class, 'index'])
        //         ->name('tenant.setup.attributes.list');
        // });
        // Route::prefix('attributesvalues')->group(function () {
        //     Route::get('list', [TeamController::class, 'index'])
        //         ->name('tenant.setup.attributesvalues.list');
        // });
    });

});

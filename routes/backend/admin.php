<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\LanguageController;
use App\Http\Controllers\Backend\TextLanguageController;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.'.
Route::redirect('/', '/admin/dashboard', 301);
Route::get('dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Home'), route('admin.dashboard'));
    });

    // Language name route
    Route::group([
        'prefix' => 'lang',
        'as' => 'lang.',
        'middleware' => 'role:'.config('boilerplate.access.role.admin'),
    ], function () {
        Route::get('lang', [LanguageController::class, 'lang'])
            ->name('landMenu')
            ->breadcrumbs(function (Trail $trail) {
                $trail->push(__('Manage Language'), route('admin.lang'));
            });

        Route::get('manage', [LanguageController::class, 'index'])
        ->name('manage')
        ->breadcrumbs(function (Trail $trail) {
            $trail->push(__('Manage Language'), route('admin.lang.manage'));
        });

        Route::get('create', [LanguageController::class, 'create'])
        ->name('create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->push(__('Create Language'), route('admin.lang.create'));
        });
        
        Route::post('/store', [LanguageController::class, 'store'])->name('store');

        // Route::group(['prefix' => '{user}'], function () {
        //     Route::get('edit', [LanguageController::class, 'edit'])
        //         ->name('edit')
        //         ->breadcrumbs(function (Trail $trail, User $user) {
        //             $trail->parent('admin.auth.user.show', $user)
        //                 ->push(__('Edit'), route('admin.auth.user.edit', $user));
        //         });

        //     Route::patch('/', [LanguageController::class, 'update'])->name('update');
        //     Route::delete('/', [LanguageController::class, 'destroy'])->name('destroy');
        // });

        // Route::group(['prefix' => '{deletedUser}'], function () {
        //     Route::patch('restore', [LanguageController::class, 'update'])->name('restore');
        //     Route::delete('permanently-delete', [LanguageController::class, 'destroy'])->name('permanently-delete');
        // });
    });

    // Language text route
    Route::group([
        'prefix' => 'textlang',
        'as' => 'textlang.',
        'middleware' => 'role:'.config('boilerplate.access.role.admin'),
    ], function () {
        Route::get('manage', [TextLanguageController::class, 'index'])
            ->name('manage')
            ->breadcrumbs(function (Trail $trail) {
                $trail->push(__('Manage Content'), route('admin.textlang.manage'));
        });

        Route::get('create', [TextLanguageController::class, 'create'])
        ->name('create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->push(__('Create Content'), route('admin.textlang.create'));
        });
        
        Route::post('/store', [TextLanguageController::class, 'store'])->name('store');

    });
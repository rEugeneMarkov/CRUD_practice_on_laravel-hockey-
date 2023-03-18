<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::controller(App\Http\Controllers\Main\IndexController::class)->group(function () {
    Route::get('/', 'index')->name('main.index');
});

Route::controller(App\Http\Controllers\Tournament\IndexController::class)
    ->prefix('tournaments')
    ->name('tournament.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{tournament:title}', 'show')->name('show');
        Route::get('/{tournament:title}/teams', 'teams')->name('teams');
        Route::get('/{tournament:title}/games', 'games')->name('games');
        Route::get('/{tournament:title}/teams/{team:title}', 'team') ->name('team');
    });

Route::controller(App\Http\Controllers\Admin\Main\IndexController::class)
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/', 'index')->name('main.index');

        Route::controller(App\Http\Controllers\Admin\Tournament\IndexController::class)
        ->prefix('tournament')
        ->name('tournament.')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{tournament}', 'show')->name('show');
            Route::get('/{tournament}/edit', 'edit')->name('edit');
            Route::patch('/{tournament}', 'update')->name('update');
            Route::delete('/{tournament}', 'delete')->name('delete');
        });

        Route::controller(App\Http\Controllers\Admin\Group\IndexController::class)
        ->prefix('group')
        ->name('group.')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{group}', 'show')->name('show');
            Route::get('/{group}/edit', 'edit')->name('edit');
            Route::patch('/{group}', 'update')->name('update');
            Route::delete('/{group}', 'delete')->name('delete');
        });

        Route::controller(App\Http\Controllers\Admin\Team\IndexController::class)
        ->prefix('team')
        ->name('team.')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{team}', 'show')->name('show');
            Route::get('/{team}/edit', 'edit')->name('edit');
            Route::patch('/{team}', 'update')->name('update');
            Route::delete('/{team}', 'delete')->name('delete');
        });

        Route::controller(App\Http\Controllers\Admin\Player\IndexController::class)
        ->prefix('player')
        ->name('player.')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{player}', 'show')->name('show');
            Route::get('/{player}/edit', 'edit')->name('edit');
            Route::patch('/{player}', 'update')->name('update');
            Route::delete('/{player}', 'delete')->name('delete');
        });
    });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

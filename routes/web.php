<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Auth;

Route::prefix('admin')
->namespace('Admin')
->middleware(['auth', 'admin'])
->group(function(){
        Route::get('/', [DashboardController::class, 'index'])
        ->name('admin');
        
        // Route::get('/users', [UserController::class, 'index'])
        // ->name('users.index');
        // Route::get('/users/create', [UserController::class, 'create'])
        // ->name('users.create');
        // Route::post('/users', [UserController::class, 'store'])
        // ->name('users.store');
        // Route::get('/users/{id}', [UserController::class, 'edit'])
        // ->name('users.edit');
        // Route::put('/users/{id}', [UserController::class, 'update'])
        // ->name('users.update');
        // Route::delete('/users/{id}', [UserController::class, 'destroy'])
        // ->name('users.destroy');
        

        Route::resource('users', App\Http\Controllers\Admin\UserController::class);
    });


Route::get('/', function(){
    return view ('welcome');
});
    
Auth::routes();

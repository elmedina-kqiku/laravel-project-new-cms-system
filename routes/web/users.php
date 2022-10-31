<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::put('/users/{user}/update', [UserController::class, 'update'])->name('user.profile.update');

Route::delete('/users/{user}/destroy', [UserController::class, 'destroy'])->name('admin.users.destroy');

Route::middleware(['role:admin', 'auth'])->group(function(){

    Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');

    Route::put('/users/{role}/attach', [UserController::class, 'attach'])->name('user.role.attach');

});


Route::middleware(['auth'])->group(function (){

    Route::get('/users/{user}/profile', [UserController::class, 'show'])
        ->can('view', 'user')
        ->name('user.profile.show');

});

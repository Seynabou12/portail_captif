<?php

use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::middleware(['auth', 'role:admin'])->name('admin.')->prefix('admin')->group(function(){
    Route::get('/', [IndexController::class, 'index'])->name('index');
    Route::resource('/roles', RoleController::class);
    Route::post("/roles/create",[RoleController::class, 'store']);
    Route::resource('/permissions', PermissionController::class);
    Route::post("/permissions/create",[PermissionController::class, 'store']);
    Route::resource('/users', UserController::class);
    Route::post('/users/create', [UserController::class, 'store'])->name('admin.users.store');
    Route::resource('/profils', ProfileController::class);
    Route::post('/profils/create',[ProfileController::class, 'store'])->name('admin.profils.store');
});

require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\admin\CompanyController;
use App\Http\Controllers\admin\EmployeeController;
use App\Http\Controllers\admin\HomeController;
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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes(['register' => false]);
Route::name('admin.')->middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');


    Route::prefix('companies')->group(function () {
        Route::get('/', [CompanyController::class, 'index'])->name('index-companies');
        Route::get('/create', [CompanyController::class, 'create'])->name('create-companies');
        Route::post('/store', [CompanyController::class, 'store'])->name('store-companies');
        Route::get('show/{id}', [CompanyController::class, 'show'])->name('show-companies');
        Route::get('edit/{id}', [CompanyController::class, 'edit'])->name('edit-companies');
        Route::post('/update/{id}', [CompanyController::class, 'update'])->name('update-companies');
        Route::get('delete/{id}', [CompanyController::class, 'delete'])->name('delete-companies');
    });
    Route::prefix('employees')->group(function () {
        Route::get('/', [EmployeeController::class, 'index'])->name('index-employees');
        Route::get('/create', [EmployeeController::class, 'create'])->name('create-employees');
        Route::post('/store', [EmployeeController::class, 'store'])->name('store-employees');
        Route::get('show/{id}', [EmployeeController::class, 'show'])->name('show-employees');
        Route::get('edit/{id}', [EmployeeController::class, 'edit'])->name('edit-employees');
        Route::post('/update/{id}', [EmployeeController::class, 'update'])->name('update-employees');
        Route::get('delete/{id}', [EmployeeController::class, 'delete'])->name('delete-employees');
    });
});

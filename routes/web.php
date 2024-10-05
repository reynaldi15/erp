<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;

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

Route::resource('company', CompanyController::class);
// route tanpa resource
// Route::controller(CompanyController::class)->group(function(){
//     Route::get('/company', 'index')->name('company.index');;
//     Route::get('/company/create', 'create')->name('company.create');;
//     Route::get('/company', 'store')->name('company.store');;
//     Route::get('/company/{id}', 'show');
//     Route::get('/company/edit/{company}', 'edit')->name('company.edit');;
//     Route::get('/company/{id}', 'update');
//     Route::get('/company/delete/{id}', 'delete')->name('company.delete');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

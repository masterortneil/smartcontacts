<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
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

Route::get('/test', function () {
    return view('welcome');
});


Route::group(['middleware' => ['auth']], function (){
    Route::get('/', [CustomerController::class, 'index'])->name('customer.index');
    Route::get('/create', [CustomerController::class, 'create'])->name('customer.create');
    Route::post('/store', [CustomerController::class, 'store'])->name('customer.store');
    Route::get('/edit/{customer}', [CustomerController::class, 'edit'])->name('customer.edit');
    Route::delete('/delete/{customer}', [CustomerController::class, 'destroy'])->name('customer.delete');
});


require __DIR__.'/auth.php';

Route::get('register',  [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'create'] );
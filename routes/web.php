<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home;
use App\Http\Controllers\RegistrationController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home',[Home::class,'index'])->middleware('guard');
Route::get('/about',[Home::class,'about'])->middleware('guard');

Route::get('no-access', function (){
    echo "You are not authorized to access this page";
    die;
});

Route::group([],function (){
    // Route::get('/form',[RegistrationController::class, 'index']);
    // Route::post('/register',[RegistrationController::class, 'register']);
    Route::get('/customer',[CustomerController::class, 'index'])->name('customer.create')->middleware('guard2');
    Route::post('/customer',[CustomerController::class, 'store']);
    Route::get('/login',[CustomerController::class, 'login_form'])->name('customer.login')->middleware('guard2');
    Route::get('/check',[CustomerController::class, 'save_login']);
    Route::get('/logout',[CustomerController::class, 'logout']);

    Route::get('/customer/view',[CustomerController::class, 'view'])->middleware('guard');
    Route::get('/customer/delete/{id}',[CustomerController::class, 'delete'])->name('customer.delete')->middleware('guard');
    Route::get('/customer/edit/{id}',[CustomerController::class, 'edit'])->name('customer.edit')->middleware('guard');
    Route::post('/customer/update/{id}',[CustomerController::class, 'update'])->name('customer.update')->middleware('guard');
    Route::get('/customer/block_id/{id}',[CustomerController::class, 'Block'])->middleware('guard');
    Route::get('/customer/unblock_id/{id}',[CustomerController::class, 'Unblock'])->middleware('guard');

});

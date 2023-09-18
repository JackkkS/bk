<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\FieldController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ReserveController;
use App\Http\Controllers\BkController;
use App\Http\Middleware\AdminOnly;
use App\Http\Controllers\AuthenticationController;

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

Route::get('/',[BkController::class,'index'])->name('index');
Route::get('/about',[BkController::class,'about'])->name('about');
Route::get('/contract',[BkController::class,'contract'])->name('contract');
Route::get('/reserve',[BkController::class,'reserve'], )->name('reserve');
Route::get('/rule',[BkController::class,'rule'])->name('rule');
Route::get('/detail/{id}',[BkController::class,'detail']);
Route::post('/detail/add/{id}',[BkController::class,'store']);
Route::get('/payment',[BkController::class,'payment'], )->name('payment');
Route::post('/paid/{id}',[BkController::class,'paid'], );
Route::get('/thank',[BkController::class,'thank'],)->name('thank');
Route::get('/api/data', [BkController::class,'api']);


Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
Route::get('/dashboard', function () {
        $users = User::all();
        return view('dashboard' ,compact('users'));
    })->name('dashboard');
});

//หน้าแรก
Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/admin/index',[IndexController::class,'index'])->name('welcome');
    });


Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/admin/reserve',[ReserveController::class,'index'])->name('admin_reserve');
    Route::get('/reserve/delete/{id}',[ReserveController::class,'delete']);
    Route::get('/admin/reserve/checkin',[ReserveController::class,'checkin'])->name('checkin');
    Route::post('/admin/reserve/checkin/comfirm/{id}',[ReserveController::class,'confirmcheckin']);
    Route::get('/admin/reserve/checkout',[ReserveController::class,'checkout'])->name('checkout');
    Route::get('/admin/reserve/checkout/comfirm/{id}',[ReserveController::class,'confirmcheckout']);
    Route::post('/admin/reserve/checkoutsuccess/{id}',[ReserveController::class,'checkoutsuccess']);
    });

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/field/all',[FieldController::class,'index'])->name('fields');
    Route::get('/field/all/add',[FieldController::class,'add'])->name('fields_add');
    Route::post('/field/all/add/success',[FieldController::class,'store'])->name('add_success');
    Route::get('/field/edit/{id}',[FieldController::class,'edit']);
    Route::get('/field/delete/{id}',[FieldController::class,'delete']);
    Route::post('/field/update/{id}',[FieldController::class,'update']);
    Route::post('/field/update/status/{id}', 'App\Http\Controllers\FieldController@updateStatus')->name('field.update.status');

    Route::get('/auth/delete/{id}',[AuthenticationController::class,'delete']);

});







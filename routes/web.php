<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\Auth\RegistrationController as UserRegistrationController;
use App\Http\Controllers\User\Auth\LoginController as UserLoginController;

use App\Http\Controllers\User\ServicesController as UserServicesController;


use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\ServiceTypesController as AdminServiceTypesController;
use App\Http\Controllers\Admin\ServicesController as AdminServiceController;

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

Route::get("register", [UserRegistrationController::class, 'showUserRegister'])->name('user.register');
Route::post("register",[UserRegistrationController::class, 'userRegister'])->name('user.register');

Route::get("login", [UserLoginController::class, 'showUserLoginForm'])->name('user.login');
Route::post("login",[UserLoginController::class, 'userLogin'])->name('user.login');

Route::get("service",[UserServicesController::class, 'showServiceForm'])->name('user.service');
Route::post("service",[UserServicesController::class, 'registerServiceRequest'])->name('user.service');


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

	Route::get('/home', [AdminHomeController::class, 'index'])->name('admin.home');
	Route::resource('/service-type', AdminServiceTypesController::class);
	Route::resource('/service', AdminServiceController::class);
	Route::post("service/update-status/{service}",[AdminServiceController::class, 'updateStatus'])->name('service.update-status');


	
});
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\Auth\RegistrationController as UserRegistrationController;
use App\Http\Controllers\User\ServicesController as UserServicesController;

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
Route::get("service",[UserServicesController::class, 'showServiceForm'])->name('user.service');
Route::post("service",[UserServicesController::class, 'registerServiceRequest'])->name('user.service');

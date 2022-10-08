<?php

use App\Http\Controllers\BaseController;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::middleware(['cors'])->group(function () {

$baseController = "\App\Http\Controllers\BaseController";
$driverClass ="App\Models\Driver";

Route::get('/driver',['class' => $driverClass, 'uses' => $baseController.'@findAll'])->name("driver.findAll");
Route::get('/driver/{id}',['class' => $driverClass, 'uses' => $baseController.'@find'])->name("driver.find");
Route::post('/driver',['class' => $driverClass, 'uses' => $baseController.'@create'])->name("driver.create");
Route::put('/driver/{id}',['class' => $driverClass, 'uses' => $baseController.'@update'])->name("driver.update");
Route::delete('/driver/{id}',['class' => $driverClass, 'uses' => $baseController.'@delete'])->name("driver.delete");


$vehicleClass ="App\Models\Vehicle";

Route::get('/vehicle',['class' => $vehicleClass, 'uses' => $baseController.'@findAll'])->name("driver.findAll");
Route::get('/vehicle/{id}',['class' => $vehicleClass, 'uses' => $baseController.'@find'])->name("driver.find");
Route::post('/vehicle',['class' => $vehicleClass, 'uses' => $baseController.'@create'])->name("driver.create");
Route::put('/vehicle/{id}',['class' => $vehicleClass, 'uses' => $baseController.'@update'])->name("driver.update");
Route::delete('/vehicle/{id}',['class' => $vehicleClass, 'uses' => $baseController.'@delete'])->name("driver.delete");


$routeClass ="App\Models\Route";

Route::get('/route',['class' => $routeClass, 'uses' => $baseController.'@findAll'])->name("driver.findAll");
Route::get('/route/{id}',['class' => $routeClass, 'uses' => $baseController.'@find'])->name("driver.find");
Route::post('/route',['class' => $routeClass, 'uses' => $baseController.'@create'])->name("driver.create");
Route::put('/route/{id}',['class' => $routeClass, 'uses' => $baseController.'@update'])->name("driver.update");
Route::delete('/route/{id}',['class' => $routeClass, 'uses' => $baseController.'@delete'])->name("driver.delete");


Route::controller(AuthController::class)->group(function () {
    Route::post('/login', 'login')->name('login');
    Route::post('/register', 'register')->name('register');;
    Route::post('/logout', 'logout');
    Route::post('/refresh', 'refresh');

});

});




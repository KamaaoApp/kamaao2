<?php

use App\Http\Controllers\Api\web\AppModuleController;
use App\Http\Controllers\Api\Web\AppMudules;
use App\Http\Controllers\Api\Web\CompanyController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PincodeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login',[AuthController::class, 'login']);
 



/**** AppModules ROUTE STARTS *****/
Route::get('/app_modules', [AppModuleController::class, 'index']);
Route::get('/app_modules/{appMudules}', [AppModuleController::class, 'show']);
Route::post('/app_modules', [AppModuleController::class, 'store']);
Route::post('/app_modules/{appMudules}', fn()=> abort(403, 'Action not allowed'));
Route::delete('/app_modules/{appMudules}', [AppModuleController::class, 'destroy']);

/****COMPANY ROUTE STARTS *****/

Route::get('/company', [CompanyController::class, 'index'])->middleware(['auth:sanctum'])->middleware(['role_or_permission:Super Admin|Company-list']);;
Route::get('/company/{company}', [CompanyController::class, 'show']);
Route::post('/company', [CompanyController::class, 'store']);
Route::post('/company/{company}', [CompanyController::class, 'update']);
Route::delete('/company/{company}', [CompanyController::class, 'destroy']);

/****JOB ROUTE STARTS *****/

Route::middleware(['auth:sanctum'])->group(function (){
    Route::get('/test', function (Request $request){return "WebApi";});

Route::post('/logout',[AuthController::class, 'logout']);

});

Route::get('pincode/{id}', [PincodeController::class, 'show']);
Route::get('pincode/fetch', [PincodeController::class, 'fetch']);
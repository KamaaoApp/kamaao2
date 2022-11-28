<?php

use App\Http\Controllers\Api\web\AppModuleController;
use App\Http\Controllers\Api\Web\AppMudules;
use App\Http\Controllers\Api\Web\CompanyController;
use App\Http\Controllers\Api\Web\JobCategoryController;
use App\Http\Controllers\AuthController;

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
 
Route::middleware(['auth:sanctum'])->group(function (){
    Route::get('/test', function (Request $request){return "WebApi";});

    Route::post('/logout',[AuthController::class, 'logout']);

    // JOB CATEGORY ROUTE STARTS 
    Route::get('/job/category',[JobCategoryController::class, 'index']);
    Route::get('/job/category/{jobCategory}',[JobCategoryController::class, 'show']);
    Route::post('/job/category',[JobCategoryController::class, 'store']);
    Route::post('/job/category/{jobCategory}',[JobCategoryController::class, 'update']);
    Route::delete('/job/category/{jobCategory}',[JobCategoryController::class, 'destroy']);


});

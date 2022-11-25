<?php

use App\Http\Controllers\Api\web\AppModuleController;
use App\Http\Controllers\Api\Web\CompanyController;
use App\Http\Controllers\Api\web\DocumentTypeController;
use App\Http\Controllers\Api\Web\JobCategoryController;
use App\Http\Controllers\Api\Web\JobController;
use App\Http\Controllers\api\web\ProjectController;
use App\Http\Controllers\api\web\SkillsController;
use App\Http\Controllers\api\web\TaskController;
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

/*****JOB CATEGORY */
Route::get('/job/category',[JobCategoryController::class, 'index']);
Route::get('/job/category/{jobCategory}',[JobCategoryController::class, 'show']);
Route::post('/job/category',[JobCategoryController::class, 'store']);
Route::post('/job/category/{jobCategory}',[JobCategoryController::class, 'update']);
Route::delete('/job/category/{jobCategory}',[JobCategoryController::class, 'destroy']);


Route::get('/skill',[SkillsController::class, 'index']);
Route::get('/skill/{skills}',[SkillsController::class, 'show']);
Route::post('/skill',[SkillsController::class, 'store']);
Route::post('/skill/{skills}',[SkillsController::class, 'update']);
Route::delete('/skill/{skills}',[SkillsController::class, 'destroy']);


Route::get('pincode/{id}', [PincodeController::class, 'show']);
Route::get('pincode/fetch', [PincodeController::class, 'fetch']);


/******JOBS ****/

Route::get('/jobs',[JobController::class, 'index']);
Route::get('/jobs/{job}',[JobController::class, 'show']);
Route::post('/jobs',[JobController::class, 'store']);
Route::post('/jobs/{}',[JobController::class, 'update']);
Route::delete('/jobs/category/{jobCategory}',[JobController::class, 'destroy']);


/******PROJECT ****/

Route::get('/projects',[ProjectController::class, 'index']);
Route::get('/project/{project}',[ProjectController::class, 'show']);
Route::post('/project',[ProjectController::class, 'store']);
Route::post('/project/{project}',[ProjectController::class, 'update']);
Route::delete('/project/{project}',[ProjectController::class, 'destroy']);

/*** DOCUMENT TYPE */

Route::get('/document-type',[DocumentTypeController::class, 'index']);
Route::get('/document-type/{documentType}',[DocumentTypeController::class, 'show']);
Route::post('/document-type',[DocumentTypeController::class, 'store']);
Route::post('/document-type/{documentType}',[DocumentTypeController::class, 'update']);
Route::delete('/document-type/{documentType}',[DocumentTypeController::class, 'destroy']);



Route::get('/tasks',[TaskController::class, 'index']);

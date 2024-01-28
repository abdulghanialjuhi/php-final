<?php

use App\Http\Controllers\BusinessUnitController;
use App\Http\Controllers\DevloperController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\RequestController;
use App\Models\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'check_user_type:bu'])->group(function () {
    Route::get('/bu/busines-unit', [BusinessUnitController::class, 'index']);
    Route::get('/bu/busines-unit/requests', [BusinessUnitController::class, 'requests']);
    Route::get('/bu/request', function() {return view('bu.requestForm');});
    Route::get('/bu/enhancement-request/{id}', [BusinessUnitController::class, 'enhancement']);
    
    Route::post('/create-request', [BusinessUnitController::class, 'store']);
    Route::post('/create-enhancement-request', [BusinessUnitController::class, 'storeEnhancement']);
    Route::get('/bu/delete-request/{id}', [BusinessUnitController::class, 'deleteRequest']);
});

Route::middleware(['auth', 'check_user_type:manager'])->group(function () {
    Route::get('/manager/dashboard', [ManagerController::class, 'index']);
    Route::get('/manager/projects', [ManagerController::class, 'listProjects']);
    Route::get('/manager/project/details/{id}', [ManagerController::class, 'projectDetails']);
    Route::get('/manager/project/create/{id}', [ManagerController::class, 'createProjectForm']);
    
    Route::post('/manager/create-project-request', [ManagerController::class, 'createProjectRequest']);
    Route::get('/manager/close-project-request/{id}', [ManagerController::class, 'closeProject']);
});


Route::middleware(['auth', 'check_user_type:developer'])->group(function () {
    Route::get('/developer/dashboard', [DevloperController::class, 'index']);
    Route::get('/developer/project/details/{id}', [DevloperController::class, 'projectDetails']);
    Route::get('/developer/add-progress/{id}', [DevloperController::class, 'projectProgress']);
    
    Route::post('/developer/add-progress-request', [DevloperController::class, 'addProgressRequest']);
});




// Route::get('/del{id}', [StudentController::class, 'delData']);

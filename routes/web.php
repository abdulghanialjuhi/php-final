<?php

use App\Http\Controllers\BusinessUnitController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/bu/busines-unit', function() {return view('bu.dashboard');});
Route::get('/bu/request', function() {return view('bu.requestForm');});
Route::get('/bu/enhancement-request/{id}', function($id) {return view('bu.requestEnhanceForm', ['id'=>$id]);});


Route::post('/create-request', [BusinessUnitController::class, 'store']);
Route::post('/create-enhancement-request', [BusinessUnitController::class, 'storeEnhancement']);

// Route::get('/del{id}', [StudentController::class, 'delData']);

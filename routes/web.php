<?php

use App\Http\Controllers\LeaveApplicationController;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

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
Route::get('/', [PagesController::class, 'redirectToHomeView'])->name('indexView');
Route::get('/home', [PagesController::class, 'homeView'])->name('homeView');
Route::get('/apply', [PagesController::class, 'leaveApplicationView'])->name('applyView');
Route::post('/apply', [LeaveApplicationController::class, 'store'])->name('store');
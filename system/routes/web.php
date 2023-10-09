<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\KlController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\KodeakunController;
use App\Http\Controllers\Admin\KodebaController;
use App\Http\Controllers\Admin\PaguController;
use App\Http\Controllers\Admin\KodekabController;
use App\Imports\KodekabImport;

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
    return view('components.app');
});

// Route::get('/', function () {
//     return view('fontend.welcome');
// });

// Route::resource('user', UserController::class);


//import excel dari input



//login

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'loginProcess']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

//midleware
// Route::prefix('user')->middleware('auth:user')->group(function () {
//     Route::resource('user', UserController::class);
//     Route::resource('kl', KlController::class);
// });

Route::prefix('admin')->middleware('auth:admin')->group(function () {
    Route::resource('user', UserController::class);
    Route::get('/kl/create', [KlController::class, 'create'])->name('import.create');
    Route::post('/kl/store', [KlController::class, 'store'])->name('import.store');
    Route::get('kl/export/', [KlController::class, 'export']);
    Route::resource('kl', KlController::class);
    Route::resource('kodeakun', KodeakunController::class);
    Route::resource('kodeba', KodebaController::class);
    Route::resource('pagu', PaguController::class);
    Route::post('/pagu/store', [PaguController::class, 'store'])->name('import.store');
    Route::resource('kodeba', KodebaController::class);
    Route::post('/kodeba/store', [KodebaController::class, 'store'])->name('import.store');
    Route::resource('kodeakun', KodeakunController::class);
    Route::post('/kodeakun/store', [KodeakunController::class, 'store'])->name('import.store');
    Route::resource('kodekab', KodekabController::class);
    Route::post('/kodekab/store', [KodekabController::class, 'store'])->name('import.store');
});


//frontend
Route::get('dashboard', [DashboardController::class, 'index']);
Route::get('depan', [FrontendController::class, 'showdepan'])->name('frontend.depan');

Route::post('depan', [FrontendController::class, 'showdepan'])->name('frontend.depan');
// Route::get('map', [FrontendController::class, 'showmap']);
Route::get('map', [FrontendController::class, 'showmap'])->name('frontend.map');

Route::post('map', [FrontendController::class, 'showmap'])->name('frontend.map');


// Route::post('/depan', [DepanController::class, 'processForm']);

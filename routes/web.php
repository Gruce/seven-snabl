<?php

use App\Http\Controllers\CityController;
use App\Http\Livewire\City\Main as CityMain;
use App\Http\Livewire\Form\Main as FormMain;
use App\Http\Livewire\Index;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Form\Show;
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


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware(['auth'])->group(function () {

    Route::prefix('index')->group(function(){
        Route::get('/', Index::class)->name('index');
    });

    Route::prefix('forms')->group(function(){
        Route::get('/', FormMain::class)->name('forms');
        Route::get('/show', Show::class)->name('show');
    });

    Route::prefix('cities')->group(function(){
        Route::get('/', CityMain::class)->name('cities');
    });

    Route::get('/cities_select', CityController::class)->name('cities_select');
});




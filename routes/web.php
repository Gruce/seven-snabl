<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\SelectController;
use App\Http\Livewire\City\Main as CityMain;
use App\Http\Livewire\Form\Main as FormMain;
use App\Http\Livewire\Give\Show as GiveShow;
use App\Http\Livewire\Index;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Form\Show;
use App\Http\Livewire\Give\Main as GiveMain;
use App\Http\Livewire\GiveType\Main as GiveTypeMain;
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
        Route::get('/show/{id}', Show::class)->name('show');
    });

    Route::prefix('cities')->group(function(){
        Route::get('/', CityMain::class)->name('cities');
    });

    Route::prefix('give')->group(function(){
        Route::get('/', GiveMain::class)->name('gives');
        Route::get('/show', GiveShow::class)->name('give.show');
        Route::get('/type', GiveTypeMain::class)->name('give.type');
    });


    // Route::get('/cities_select', CityController::class)->name('cities_select');
    Route::controller(SelectController::class)->group(function () {
        Route::get('/cities_select', 'cities')->name('cities_select');
        Route::get('/give_types', 'giveTypes')->name('give_types_select');
    });
});




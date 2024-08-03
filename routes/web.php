<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\StartController;
use App\Http\Controllers\VenueController;
use App\Http\Controllers\WeatherController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->controller(EventController::class)->prefix('events')->as('event.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/show', 'show')->name('show');
    Route::get('/edit', 'edit')->name('edit');
    Route::put('/update', 'update')->name('update');
    Route::delete('/delete', 'destroy')->name('delete');
});

Route::middleware('auth')->controller(VenueController::class)->prefix('venues')->as('venue.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/show', 'show')->name('show');
    Route::get('/edit', 'edit')->name('edit');
    Route::put('/update', 'update')->name('update');
    Route::delete('/delete', 'destroy')->name('delete');
});

Route::get('/weather', [WeatherController::class, 'index'])->name('weather');

Route::get('/', [StartController::class, 'index'])->name('start')->middleware('auth');

Auth::routes();

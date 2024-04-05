<?php

use App\Http\Controllers\Mycontroller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/',[Mycontroller::class,'index'])->name('candidates.index');
Route::get('candidates/create',[Mycontroller::class,'create'])->name('candidates.create');
Route::post('candidates/store',[Mycontroller::class,'store'])->name('candidates.store');
Route::get('candidates/{id}/edit',[Mycontroller::class,'edit']);
Route::put('candidates/{id}/update',[Mycontroller::class,'update']);
Route::get('candidates/{id}/delete',[Mycontroller::class,'destroy']);
Route::get('dependent-dropdown', [MyController::class, 'country']);
Route::post('api/fetch-states', [MyController::class, 'fetchState']);
Route::post('api/fetch-cities', [MyController::class, 'fetchCity']);
// Route::post('api/fetch-cities', [MyController::class, 'modelCall']);
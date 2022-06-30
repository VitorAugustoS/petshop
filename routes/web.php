<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\EspecieController;

Route::get('/', function () {
    return view('welcome');
});

Route::Resources([
    "especie" => EspecieController::class,
    "animal" => AnimalController::class
]);
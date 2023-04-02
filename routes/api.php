<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AirPortController;

Route::post('airports',[AirPortController::class,'airports']);

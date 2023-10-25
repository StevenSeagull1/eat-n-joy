<?php

use App\Http\Controllers\BestellingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('bestelling',[BestellingController::class,'store']);

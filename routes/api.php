<?php

use App\Http\Controllers\ApiArticleController;
use App\Http\Controllers\ApiVideoController;
use App\Http\Controllers\ApiCompanyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('/article', ApiArticleController::class);
Route::apiResource('/video', ApiVideoController::class);
Route::apiResource('/company', ApiCompanyController::class);
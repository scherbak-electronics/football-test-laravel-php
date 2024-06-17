<?php

use App\Http\Controllers\MatchController;
use Illuminate\Support\Facades\Route;

Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '.*');
Route::get('/matches', [MatchController::class, 'index']);

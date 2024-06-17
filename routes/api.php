<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\LeagueController;
use App\Http\Controllers\API\FootballMatchController;

Route::apiResource('leagues', LeagueController::class);
Route::apiResource('matches', FootballMatchController::class);

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeployController;

Route::post('/webhook/deploy', [DeployController::class, 'handle']);

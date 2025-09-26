<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeployController;

// Route::get('/phpinfo', function () {
//     return phpinfo();
// });

Route::post('/webhook/deploy', [DeployController::class, 'handle']);

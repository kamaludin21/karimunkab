<?php

use App\Http\Controllers\SurveyController;
use Illuminate\Support\Facades\Route;

// Route::get('/phpinfo', function () {
//     return phpinfo();
// });

Route::get('/form/diskominfo', [SurveyController::class, 'index']);

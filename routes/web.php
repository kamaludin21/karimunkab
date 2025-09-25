<?php

use Illuminate\Support\Facades\Route;

Route::get('/phpinfo', function () {
    return phpinfo();
});

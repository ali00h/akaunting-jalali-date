<?php

use Illuminate\Support\Facades\Route;

/**
 * 'admin' middleware and 'jalali-date' prefix applied to all routes (including names)
 *
 * @see \App\Providers\Route::register
 */

Route::admin('jalali-date', function () {
    Route::get('/', 'Main@index');
});

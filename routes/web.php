<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if(config('common.disable_app_browser_cache')) {
        return response()
            ->view('index')
            ->header('Expires', 'Mon, 1 Jan 1970 00:00:00 GMT')
            ->header('Pragma', 'no-cache')
            ->header('Cache-Control', 'no-cache');
    } else {
        return view('index');
    }
});

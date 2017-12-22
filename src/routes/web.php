<?php


Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

include('lerova/core.php');





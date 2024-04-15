<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return hybridly('welcome');
});

Route::get('preload-users/1', function () {
    return hybridly('users.show');
})->name('preload.users.show');

Route::post('preload-users/{user}', function ($id) {
    dd("PRELOAD POST to {$id}");
})->name('preload.users.update');

Route::get('users/1', function () {
    return hybridly('users.show');
})->name('users.show');

Route::post('users/{user}', function ($id) {
    dd("NON PRELOAD POST to {$id}");
})->name('users.update');

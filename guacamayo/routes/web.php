<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SSOController;

Route::match(['get', 'post'],'/', [SSOController::class, 'index'])->name("index");

Route::group(['prefix'=>'api', 'as'=>'api.'], function(){
    Route::post('create', [SSOController::class, 'create'])->name("create");
    Route::post('read',   [SSOController::class, 'read'])->name("read");
    Route::post('update', [SSOController::class, 'update'])->name("update");
    Route::post('delete', [SSOController::class, 'delete'])->name("delete");
    Route::post('login', [SSOController::class, 'login'])->name("login");
    Route::post('logout', [SSOController::class, 'logout'])->name("logout");
});

<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\postcont;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/posts', function(){
    return view('cpost');
});
Route::get('/cpost', [postcont::class, 'create'])->name('cpost');
Route::post('/cpost', [postcont::class, 'store'] );
Route::get('/postshow', [postcont::class, 'show']) -> name('postshow');
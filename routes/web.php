<?php

namespace App\Http\Controllers;
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
    return view('app');
})->name('home');

Route::get('/detail/{id}', function ($id) {
    return view('detail', compact('id'));
});

Route::get('/type/{id}', function ($id) {
    return view('type', compact('id'));
});

Route::get('/series', function () {
    $type ='series';
    return view('type', compact('type'));
})->name('series');

Route::get('/feature', function () {
    $type ='single';
    return view('type', compact('type'));
})->name('single');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/user', function () {
    return view('userpage');
})->name('userpage');
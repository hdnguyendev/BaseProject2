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

Route::get('/detail/{id}',[ClientController::class, 'detailpage']);

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

// Route::get('/user', function () {
//     return view('userpage');
// })->name('userpage');

// Backend
Route::prefix('admin')->group(function () {
    Route::post('/login_handle',[AdminController::class, 'check_login']);
    Route::get('/logout',[AdminController::class, 'logout']);
    Route::get('/',[AdminController::class, 'index']);
    Route::get('/clients-list', [AdminController::class, 'clients_list']);
    Route::get('/login',[AdminController::class , 'sign_in']);
    Route::get('/ban/{id}', [AdminController::class, 'ban_client'])->name('ban_client');
    Route::get('/unban/{id}',[AdminController::class, 'unban_client'])->name('unban_client');
});

Route::get('/send-mail/{id}', [MailController::class, 'index'])->name('send_mail');
Route::post('/send-mail-id', [MailController::class, 'sendMail'])->name('send_mail_id');
Route::post('/check-login',[ClientController::class, 'checkLogin']);
Route::get('/logout',[ClientController::class,'logout']);
Route::post('/register', [ClientController::class,'register']);

Route::get('/user',[ClientController::class, 'userpage'])->name('userpage');
// Route::post('/update-profile',[ClientController::class, 'update_profile']);
Route::post('/change-avatar',[ClientController::class, 'change_avatar']);
Route::post('/change-password',[ClientController::class, 'change_password'])->name('change_password_ajax');
Route::post('/add-comment',[ClientController::class, 'add_comment'])->name('add_comment_ajax');


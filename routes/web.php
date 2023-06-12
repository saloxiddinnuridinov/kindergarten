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

Route::post('telegramBot', [\App\Http\Controllers\TelegramBotController::class, 'handle'])->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);;

Route::get('/webhook', function () {
    return file_get_contents("https://api.telegram.org/bot" . env('TELEGRAM_BOT_TOKEN') . "/setwebhook?url=" . env('WEBHOOK_URL') . "/telegramBot");
});


Route::get('/', [\App\Http\Controllers\PageController::class, 'homePage'])->name('boshSahifa');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');


Route::get('/login',[\App\Http\Controllers\PageController::class,'getLoginPage'])->name('login');

Route::post('/signin',[\App\Http\Controllers\PageController::class,'postSignIn'])->name('sign-in');



/////////////////////////Himoyalash qism group - middleware dan foydalanib//////////////////////

Route::group(['middleware'=>'auth'],function () {

    Route::get('/admin/user', [\App\Http\Controllers\UserController::class, 'getUser'])->name('admin.user');
    Route::get('/admin/edit-user-page/{id}', [\App\Http\Controllers\UserController::class, 'editUserContent'])->name('user.edit');
    Route::post('/admin/edit-user/{id}', [\App\Http\Controllers\UserController::class, 'editUser'])->name('edit-user');
    Route::get('/admin/delete-user/{id}', [\App\Http\Controllers\UserController::class, 'deleteUser'])->name('user.delete');
    Route::post('/admin/user-delete/{id}', [\App\Http\Controllers\UserController::class, 'setdeleteUser'])->name('delete_u');
    Route::get('/admin/send-user/{id}', [\App\Http\Controllers\UserController::class, 'sendUser'])->name('user.send');
    Route::post('/admin/send/{id}', [\App\Http\Controllers\UserController::class, 'send'])->name('send');
    Route::get('/admin/user/add', [\App\Http\Controllers\UserController::class,"UserContent"])->name('add.user');
    Route::post('/admin/add-user', [\App\Http\Controllers\UserController::class, 'addUser'])->name('add-user');
    Route::get('/admin/game', [\App\Http\Controllers\UserController::class, 'getParent'])->name('admin.game');

    Route::get('/logout', function () {
        Auth::logout();
        return redirect('/');
    })->name('logout');


});
/////////////////////////// END /////////////////////////////////////////////////////////////////////

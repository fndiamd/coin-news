<?php

use App\Http\Controllers\AccountController;
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

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CoinController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RewardController;
use Illuminate\Support\Facades\Auth;

Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);
Route::get('/get-coin', [CoinController::class, 'index']);
Route::get('/rewards', [RewardController::class, 'index']);

Auth::routes();
Route::get('logout', [LoginController::class, 'logout']);
Route::get('register', [RegisterController::class, 'index']);
Route::post('register', [RegisterController::class, 'store']);

Route::middleware('auth')->group(function () {
    Route::get('my-article', [ArticleController::class, 'dashboard']);
    Route::get('create-article', [ArticleController::class, 'showCreateForm']);
    Route::post('create-article', [ArticleController::class, 'store']);
    Route::get('article/edit/{slug}', [ArticleController::class, 'showUpdateForm']);
    Route::post('article/edit/{slug}', [ArticleController::class, 'update']);
    Route::get('article/delete/{slug}', [ArticleController::class, 'destroy']);

    Route::post('comment/{articleId}', [CommentController::class, 'store']);
    
    Route::get('reward/redeem/{id}', [RewardController::class, 'redeem']);
    
    Route::get('account/history/coin', [CoinController::class, 'history']);
    Route::get('account/history/reward', [RewardController::class, 'history']);
    Route::get('account/panel', [AccountController::class, 'index']);
    Route::get('account/setting', [AccountController::class, 'showSettingForm']);
    Route::post('account/update', [AccountController::Class, 'update']);
});

Route::get('article/{slug}', [ArticleController::class, 'showDetail']);

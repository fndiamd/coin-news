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

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\ArticleController as AdminArticle;
use App\Http\Controllers\Admin\RewardController as AdminReward;
use App\Http\Controllers\Admin\RedeemController;
use Illuminate\Support\Facades\Auth;

Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);
Route::get('/get-coin', [CoinController::class, 'index']);
Route::get('/rewards', [RewardController::class, 'index']);

Auth::routes();
Route::get('logout', [LoginController::class, 'logout']);
Route::get('register', [RegisterController::class, 'index']);
Route::post('register', [RegisterController::class, 'store']);

Route::middleware('auth:member')->group(function () {
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
    Route::post('account/update', [AccountController::class, 'update']);
});

Route::get('article/{slug}', [ArticleController::class, 'showDetail']);

Route::get('admin/login', [LoginController::class, 'showAdminLoginForm']);
Route::post('admin/login', [LoginController::class, 'adminLogin']);

Route::prefix('admin')->middleware('auth:admin')->group(function(){
    Route::get('logout', [LoginController::class, 'adminLogout']);
    Route::get('dashboard', [DashboardController::class, 'index']);
    Route::get('master/member', [MemberController::class, 'index']);
    Route::get('master/member/history-coin/{id}', [MemberController::class, 'historyCoin']);
    Route::get('master/article', [AdminArticle::class, 'index']);
    Route::get('master/reward', [AdminReward::class, 'index']);
    Route::get('master/reward/add', [AdminReward::class, 'showCreateForm']);
    Route::post('master/reward/add', [AdminReward::class, 'store']);
    Route::get('master/reward/delete/{id}', [AdminReward::class, 'destroy']);
    Route::get('master/reward/edit/{id}', [AdminReward::class, 'showUpdateForm']);
    Route::post('master/reward/edit/{id}', [AdminReward::class, 'update']);
    Route::get('transaction/redeem', [RedeemController::class, 'index']);
    Route::get('transaction/redeem/accept/{id}', [RedeemController::class, 'accept']);
});

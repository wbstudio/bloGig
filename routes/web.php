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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [\App\Http\Controllers\Page\Front\TopController::class, 'topPage'])->name('front.topPage');
Route::post('/search', [\App\Http\Controllers\Page\Front\ArticleController::class, 'searchArticleList'])->name('front.article.keyword');
Route::get('/auther/{auther_id}', [\App\Http\Controllers\Page\Front\AutherController::class, 'autherDetail'])->name('front.auther.detail');
Route::get('/auther/{auther_id}/category/{category_id}', [\App\Http\Controllers\Page\Front\ArticleController::class, 'searchArticleList'])->name('front.article.auther_category');
Route::get('/article/{article_id}', [\App\Http\Controllers\Page\Front\ArticleController::class, 'articleDetail'])->name('front.article.detail');

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });


//******************************//
//  管理者権限ページ
//******************************//
// ログイン周り
Route::get('admin', [\App\Http\Controllers\AdminAuthController::class, 'showLoginForm'])->name('admin.showLoginFOrm');
Route::post('admin', [\App\Http\Controllers\AdminAuthController::class, 'login'])->name('admin.login');
Route::get('admin/logout', [\App\Http\Controllers\AdminAuthController::class, 'logout'])->name('admin.logout');

// ログイン後
Route::prefix('admin')->middleware('auth:admins')->group(function(){
    //topページ
    Route::get('/home', [\App\Http\Controllers\AdminAuthController::class, 'home'])->name('admin.home');

    //記事管理
    Route::group(['prefix' => 'article'], function () {
        Route::get('list', [\App\Http\Controllers\Page\Admin\ArticleController::class, 'getList'])->name('article.list');
        Route::post('list', [\App\Http\Controllers\Page\Admin\ArticleController::class, 'getList'])->name('article.list.search');
        Route::post('delete', [\App\Http\Controllers\Page\Admin\ArticleController::class, 'delete'])->name('article.delete');
        Route::get('/regist/form', [\App\Http\Controllers\Page\Admin\ArticleController::class, 'registShowForm'])->name('article.regist.showForm');
        Route::post('/regist/confirm', [\App\Http\Controllers\Page\Admin\ArticleController::class, 'registConfirm'])->name('article.regist.confirm');
        Route::post('/regist/execution', [\App\Http\Controllers\Page\Admin\ArticleController::class, 'registExecution'])->name('article.regist.execution');
        Route::get('/edit/{id}', [\App\Http\Controllers\Page\Admin\ArticleController::class, 'editShowForm'])->name('article.edit.showForm');
        Route::post('/edit/confirm', [\App\Http\Controllers\Page\Admin\ArticleController::class, 'editConfirm'])->name('article.edit.confirm');
        Route::post('/edit/execution', [\App\Http\Controllers\Page\Admin\ArticleController::class, 'editExecution'])->name('article.edit.execution');
    });

    //筆者管理
    Route::group(['prefix' => 'auther'], function () {
        Route::get('list', [\App\Http\Controllers\Page\Admin\AutherController::class, 'getList'])->name('auther.list');
        Route::post('delete', [\App\Http\Controllers\Page\Admin\AutherController::class, 'autherDelete'])->name('auther.delete');
        Route::get('/regist/form', [\App\Http\Controllers\Page\Admin\AutherController::class, 'registShowForm'])->name('auther.regist.showForm');
        Route::post('/regist/confirm', [\App\Http\Controllers\Page\Admin\AutherController::class, 'registConfirm'])->name('auther.regist.confirm');
        Route::post('/regist/execution', [\App\Http\Controllers\Page\Admin\AutherController::class, 'registExecution'])->name('auther.regist.execution');
        Route::get('/edit/{id}', [\App\Http\Controllers\Page\Admin\AutherController::class, 'editShowForm'])->name('auther.edit.showForm');
        Route::post('/edit/confirm', [\App\Http\Controllers\Page\Admin\AutherController::class, 'editConfirm'])->name('auther.edit.confirm');
        Route::post('/edit/execution', [\App\Http\Controllers\Page\Admin\AutherController::class, 'editExecution'])->name('auther.edit.execution');
    });

    //カテゴリー管理
    Route::group(['prefix' => 'category'], function () {
        Route::get('list', [\App\Http\Controllers\Page\Admin\CategoryController::class, 'getList'])->name('category.list');
        Route::post('delete', [\App\Http\Controllers\Page\Admin\CategoryController::class, 'delete'])->name('category.delete');
        Route::get('/regist/form', [\App\Http\Controllers\Page\Admin\CategoryController::class, 'registShowForm'])->name('category.regist.showForm');
        Route::post('/regist/confirm', [\App\Http\Controllers\Page\Admin\CategoryController::class, 'registConfirm'])->name('category.regist.confirm');
        Route::post('/regist/execution', [\App\Http\Controllers\Page\Admin\CategoryController::class, 'registExecution'])->name('category.regist.execution');
        Route::get('/edit/{id}', [\App\Http\Controllers\Page\Admin\CategoryController::class, 'editShowForm'])->name('category.edit.showForm');
        Route::post('/edit/confirm', [\App\Http\Controllers\Page\Admin\CategoryController::class, 'editConfirm'])->name('category.edit.confirm');
        Route::post('/edit/execution', [\App\Http\Controllers\Page\Admin\CategoryController::class, 'editExecution'])->name('category.edit.execution');
    });

    //タグ管理
    Route::group(['prefix' => 'tag'], function () {
        Route::get('list', [\App\Http\Controllers\Page\Admin\TagController::class, 'getList'])->name('tag.list');
        Route::post('regist', [\App\Http\Controllers\Page\Admin\TagController::class, 'regist'])->name('tag.regist');
        Route::post('delete', [\App\Http\Controllers\Page\Admin\TagController::class, 'delete'])->name('tag.delete');
        Route::get('edit/{id}/{name}', [\App\Http\Controllers\Page\Admin\TagController::class, 'edit']);
    });

    //カテゴリー管理
    Route::group(['prefix' => 'pickUp'], function () {
        Route::get('list', [\App\Http\Controllers\Page\Admin\PickUpController::class, 'getList'])->name('pickUp.list');
        Route::post('delete', [\App\Http\Controllers\Page\Admin\PickUpController::class, 'delete'])->name('pickUp.delete');
        Route::get('/regist/form', [\App\Http\Controllers\Page\Admin\PickUpController::class, 'registShowForm'])->name('pickUp.regist.showForm');
        Route::post('/regist/form', [\App\Http\Controllers\Page\Admin\PickUpController::class, 'registShowForm'])->name('pickUp.regist.showForm');
        Route::post('/regist/confirm', [\App\Http\Controllers\Page\Admin\PickUpController::class, 'registConfirm'])->name('pickUp.regist.confirm');
        Route::post('/regist/execution', [\App\Http\Controllers\Page\Admin\PickUpController::class, 'registExecution'])->name('pickUp.regist.execution');
        Route::get('/edit/form/{id}', [\App\Http\Controllers\Page\Admin\PickUpController::class, 'editShowForm'])->name('pickUp.edit.showForm');
        Route::post('/edit/form/{id}', [\App\Http\Controllers\Page\Admin\PickUpController::class, 'editShowForm'])->name('pickUp.edit.showForm');
        Route::post('/edit/confirm', [\App\Http\Controllers\Page\Admin\PickUpController::class, 'editConfirm'])->name('pickUp.edit.confirm');
        Route::post('/edit/execution', [\App\Http\Controllers\Page\Admin\PickUpController::class, 'editExecution'])->name('pickUp.edit.execution');
    });

    //Ajax
    Route::group(['prefix' => 'ajax'], function () {
        Route::get('delete/profile/image/{image}', [\App\Http\Controllers\Admin\AjaxController::class, 'deleteProfileImage'])->name('ajax.delete.profile.image');
    });

});


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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


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


    //Ajax
    Route::group(['prefix' => 'ajax'], function () {
        Route::get('delete/profile/image/{image}', [\App\Http\Controllers\Admin\AjaxController::class, 'deleteProfileImage'])->name('ajax.delete.profile.image');
    });

});


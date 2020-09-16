<?php

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
Auth::routes();
Route::get('/', function () {
    return redirect(route("web.home"));
});

Route::get('web/{any?}', 'ApplicationController')->where('any', '.*')->fallback()->name('web.home');

Route::prefix("admin")->namespace("Admin")->group(function () {
    Route::get("login", "LoginController@form")->name("admin.login.form");
    Route::post("login", "LoginController@attempt")->name("admin.login.attempt");
});

Route::prefix("admin")->namespace("Admin")->middleware("auth")->group(function () {
    Route::get("/", "HomeController@index")->name("admin.home.index");
    Route::resource("users", "UserController", ['as' => 'admin']);
    Route::post('users/remove/all','UserController@remove_all')->name('admin.users.delete.all');
    Route::resource("categories", "CategoryController", ["as" => "admin"]);
    Route::post('categories/remove/all','CategoryController@remove_all')->name('admin.categories.delete.all');
    Route::resource("articles", "ArticleController", ["as" => "admin"]);
    Route::post('articles/remove/all','ArticleController@remove_all')->name('admin.articles.delete.all');
});

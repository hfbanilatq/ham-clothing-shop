<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\HomeController@index')->name("home.index");
Route::get('/search', 'App\Http\Controllers\HomeController@search')->name("home.search");
Route::get('/products', 'App\Http\Controllers\ProductController@index')->name("product.index");
Route::get('/products/create', 'App\Http\Controllers\ProductController@create')->name("product.create");
Route::post('/products/save', 'App\Http\Controllers\ProductController@save')->name("product.save");
Route::get('/products/{id}', 'App\Http\Controllers\ProductController@show')->name("product.show");
Route::get('/cart', 'App\Http\Controllers\CartController@index')->name("cart.index");
Route::get('/cart/delete', 'App\Http\Controllers\CartController@delete')->name("cart.delete");
Route::post('/cart/add/{id}', 'App\Http\Controllers\CartController@add')->name("cart.add");
Route::get('/api/products', 'App\Http\Controllers\Api\ProductApi@index')->name("api.product.index");
Route::get('/api/products/{id}', 'App\Http\Controllers\Api\ProductApi@show')->name("api.product.show");

Route::middleware('auth')->group(function () {
    Route::get('/cart/purchase', 'App\Http\Controllers\CartController@purchase')->name("cart.purchase");
    Route::get('/my-account/orders', 'App\Http\Controllers\MyAccountController@orders')->name("myaccount.orders");
});


Route::middleware('admin')->group(function () {
    Route::get('/admin', 'App\Http\Controllers\Admin\AdminHomeController@index')->name("admin.home.index");
    Route::get('/admin/products', 'App\Http\Controllers\Admin\AdminProductController@index')
    ->name("admin.product.index");
    Route::get('/admin/products/search', 'App\Http\Controllers\Admin\AdminProductController@search')
    ->name("admin.product.search");
    Route::get('/admin/products/create', 'App\Http\Controllers\Admin\AdminProductController@create')
    ->name("admin.product.create");
    Route::post('/admin/products/store', 'App\Http\Controllers\Admin\AdminProductController@store')
    ->name("admin.product.store");
    Route::delete('/admin/products/{id}/delete', 'App\Http\Controllers\Admin\AdminProductController@destroy')
    ->name("admin.product.delete");
    Route::get('/admin/products/{id}/edit', 'App\Http\Controllers\Admin\AdminProductController@edit')
    ->name("admin.product.edit");
    Route::put('/admin/products/{id}/update', 'App\Http\Controllers\Admin\AdminProductController@update')
    ->name("admin.product.update");
    Route::get('/admin/categories', 'App\Http\Controllers\Admin\AdminCategoryController@index')
    ->name("admin.category.index");
    Route::get('/admin/categories/search', 'App\Http\Controllers\Admin\AdminCategoryController@search')
    ->name("admin.category.search");
    Route::get('/admin/categories/create', 'App\Http\Controllers\Admin\AdminCategoryController@create')
    ->name("admin.category.create");
    Route::post('/admin/categories/store', 'App\Http\Controllers\Admin\AdminCategoryController@store')
    ->name("admin.category.store");
    Route::delete('/admin/categories/{id}/delete', 'App\Http\Controllers\Admin\AdminCategoryController@destroy')
    ->name("admin.category.delete");
    Route::get('/admin/categories/{id}/edit', 'App\Http\Controllers\Admin\AdminCategoryController@edit')
    ->name("admin.category.edit");
    Route::put('/admin/categories/{id}/update', 'App\Http\Controllers\Admin\AdminCategoryController@update')
    ->name("admin.category.update");
    Route::get('/admin/goals', 'App\Http\Controllers\Admin\AdminGoalController@index')->name("admin.goal.index");
    Route::get('/admin/goals/search', 'App\Http\Controllers\Admin\AdminGoalController@search')
    ->name("admin.goal.search");
    Route::get('/admin/goals/create', 'App\Http\Controllers\Admin\AdminGoalController@create')
    ->name("admin.goal.create");
    Route::post('/admin/goals/store', 'App\Http\Controllers\Admin\AdminGoalController@store')->name("admin.goal.store");
    Route::delete('/admin/goals/{id}/delete', 'App\Http\Controllers\Admin\AdminGoalController@destroy')
    ->name("admin.goal.delete");
    Route::get('/admin/goals/{id}/edit', 'App\Http\Controllers\Admin\AdminGoalController@edit')
    ->name("admin.goal.edit");
    Route::put('/admin/goals/{id}/update', 'App\Http\Controllers\Admin\AdminGoalController@update')
    ->name("admin.goal.update");
});

Auth::routes();

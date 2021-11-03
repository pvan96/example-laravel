<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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

Route::get('login', 'AuthController@showLoginView')->name('showLoginView');
Route::get('/', 'AuthController@showLoginView')->name('showLoginView');
Route::post('login', 'AuthController@login')->name('login');
Route::get('logout', 'AuthController@logout')->name('logout');

// Route::get('top', function () {
//     echo ('hihi');
// })->name('top');

Route::group([
    'prefix' => 'categories',
    'as' => 'categories.',
    'middleware' => ['auth:web']
], function () {
    Route::get('/', 'CategoryController@index')->name('list');
    Route::get('create', 'CategoryController@viewCreate')->name('viewCreate');
    Route::post('create', 'CategoryController@create')->name('create');
    Route::get('edit/{id}', 'CategoryController@viewEdit')->name('viewEdit');
    Route::post('edit/{id}', 'CategoryController@update')->name('update');
    Route::get('delete/{id}', 'CategoryController@delete')->name('delete');
});

Route::group([
    'prefix' => 'brands',
    'as' => 'brands.',
    'middleware' => ['auth:web']
],function () {
    Route::get('/', 'BrandController@index')->name('list');
    Route::get('create', 'BrandController@viewCreate')->name('viewCreate');
    Route::post('create', 'BrandController@create')->name('create');
    Route::get('edit/{id}', 'BrandController@viewEdit')->name('viewEdit');
    Route::post('edit/{id}', 'BrandController@update')->name('update');
});
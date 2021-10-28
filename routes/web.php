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
// Route::get('hihihi/{mi}/{you?}', function($mi, $you=null){
//     echo ('hello '. $mi . ' '. $you);
// });

Route::get('categories', 'CategoryController@index')->name('listCategory');

Route::post('login', 'AuthController@login')->name('login');

Route::get('top', function (){
 echo ('hihi');
})->name('top');
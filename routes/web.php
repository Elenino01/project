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

// Объявляем маршруты для всех стандартных методов
// ресурсного контроллера MessageController,
// назначая слово messages префиксом URI
// (все создаваемые веб­‑адреса будут начинаться с /messages/)
Route::resource('messages', 'MessageController');

// Т. к. метод remove() не предусмотрен в ресурсных контроллерах,
// объявляем маршрут самостоятельно.
Route::get('messages/{message}/remove', 'MessageController@remove')
     ->name('messages.remove');

// Объявляем маршруты для всех стандартных методов
// ресурсного контроллера RoleController,
// назначая слово messages префиксом URI
// (все создаваемые веб­‑адреса будут начинаться с /roles/)
Route::resource('roles', 'RoleController');

// Т. к. метод remove() не предусмотрен в ресурсных контроллерах,
// объявляем маршрут самостоятельно.
Route::get('roles/{role}/remove', 'RoleController@remove')
     ->name('roles.remove');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

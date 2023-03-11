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

/*
 * Route::get('/', function () {
     * return view('welcome');
 * });
*/
Route::get('/', [\App\Http\Controllers\BbsController::class, 'index'])->name('index');
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/{bb}', [App\Http\Controllers\BbsController::class, 'detail'])->name('detail');
Route::get('/home/add', [App\Http\Controllers\HomeController::class, 'showAddBgForm'])->name('bb.add');
Route::post('/home', [App\Http\Controllers\HomeController::class, 'storeBb'])->name('bb.store');
Route::get('/home/{bb}/edit', [App\Http\Controllers\HomeController::class, 'showEditBgForm'])
    ->name('bb.edit')
    ->middleware('can:update,bb');
Route::patch('/home/{bb}', [App\Http\Controllers\HomeController::class, 'updateBb'])
    ->name('bb.update')
    ->middleware('can:update,bb');
Route::get('/home/{bb}/delete', [App\Http\Controllers\HomeController::class, 'showDeleteBgForm'])
    ->name('bb.delete')
    ->middleware('can:destroy,bb');
Route::delete('/home/{bb}', [App\Http\Controllers\HomeController::class, 'destroyBb'])
    ->name('bb.destroy')
    ->middleware('can:destroy,bb');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactsController;

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

Route::get('/dashboard', function () {

    return view('dashboard');
});

Route::get('/AdicionarContato', function () {
    return view('create');
});

Route::post('/store', [ContactsController::class, 'store']);
Route::get('/get', [ContactsController::class, 'read']);



Auth::routes();


<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\UserManageController;

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
    return view('home');
});

route::post('/registerUser', [UserManageController::class, 'registerUser']);
route::get('/loginUser', [UserManageController::class, 'loginUser']);


Route::get('/dashboard', function () {
    if(session()->has('info'))
    {
        return view('dashboard');
    }
    return redirect('/');
    
});

Route::get('/logout', function () {
    session()->forget('info');

    return redirect('/');
});




Route::get('/AdicionarContato', function () {
    if(session()->has('info'))
    {
        return view('create');
    }
    return redirect('/');
});

Route::post('/store', [ContactsController::class, 'store']);
Route::get('/get', [ContactsController::class, 'read']);


Route::get('/send-email', function(){
    $details = [
        'title'=>'Mail From surfisede',
        'body'=>'This is form testing'
    ];
    \Mail::to('leogomes16477@gmail.com')->send(new \App\Mail\SendingEmail($details));
    echo "Email Enviado";
});



Auth::routes();



<?php

use App\Http\Controllers\CiclesController;
use App\Http\Controllers\UsuariController;
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
    return view('index');
});
// Route::post('/cicles', 'CiclesController@store');
Route::resource('cicle', CiclesController::class);
Route::resource('usuari', UsuariController::class);
Route::get('usuari/{usuari}/password', [UsuariController::class, 'showPassword'])->name('usuari.showPassword');
Route::post('usuari/{usuari}/changePassword', [UsuariController::class, 'changePassword'])->name('usuari.showPassword');
Route::get('/login', [UsuariController::class, 'showLogin'])->name('login');
Route::post('/login', [UsuariController::class, 'login']);
Route::get('/logout', [UsuariController::class, 'logout']);


/** RUTAS AUTORIZADAS */
Route::middleware(['auth'])->group(function () {
    Route::get('/home', function () {
        $user = Auth::user();

        return view('home', compact('user'));
    });

});
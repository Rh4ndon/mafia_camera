<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CameraController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login');
});
Route::get('/signup', function () {
    return view('register');
});
Route::get('/dashboard', function () {
    return view('home');
});
Route::get('/userdashboard', function () {
    return view('userhome');
});
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout']);
Route::resource('cameras', CameraController::class);
Route::get('/cameras/create', [CameraController::class, 'create']);
Route::post('/cameras/store', [CameraController::class, 'store']);
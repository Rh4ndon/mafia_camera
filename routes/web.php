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
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/dashboard',  [CameraController::class, 'show']);
Route::get('/userdashboard', [CameraController::class, 'home']);
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout']);
Route::resource('cameras', CameraController::class);
Route::get('/cameras/create', [CameraController::class, 'create']);
Route::post('/cameras/store', [CameraController::class, 'store']);
//Edit
Route::get('/edit-camera/{camera}',[CameraController::class,'edit'])->name('edit');
//Update
Route::put('/edit-camera/{camera}',[CameraController::class,'updateCamera'])->name('updateCamera');
//Delete
Route::delete('/delete-camera/{id}',[CameraController::class,'destroy'])->name('deleteCamera');
//Add to Cart
Route::post('/camera/cart',[CameraController::class,'add']);
Route::get('/usercart', [CameraController::class, 'showCart']);
Route::put('/buy-camera/{camera}',[CameraController::class,'buyCamera'])->name('buyCamera');
Route::get('/sold-camera', [CameraController::class, 'soldCam']);

Route::get('/userorders', [CameraController::class, 'orders']);
Route::put('/deliver-camera/{camera}',[CameraController::class,'deliverCamera']);
Route::put('/checkout',[CameraController::class,'checkoutCamera']);
Route::get('/editUser',[UserController::class,'editUser']);
//Update
Route::put('/edit-user/{user}',[UserController::class,'updateUser']);
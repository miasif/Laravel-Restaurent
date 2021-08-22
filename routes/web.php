<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[HomeController::class,'index']);

Route::get('/redirects',[HomeController::class,'redirects']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//ADMIN
Route::get('/users',[AdminController::class,'user']);
Route::delete('/deleteuser/{id}',[AdminController::class,'deleteuser']);
//foodmenu
Route::delete('/deletemenu/{id}',[AdminController::class,'deletemenu']);
Route::get('/foodmenu',[AdminController::class,'foodmenu']);
Route::post('/uploadfood',[AdminController::class,'upload']);
Route::get('/updatefoodmenu/{id}',[AdminController::class,'updatefoodmenu']);
Route::post('/update/{id}',[AdminController::class,'update']);
//reservation
Route::post('/reservation',[AdminController::class,'reservation']);
Route::get('/viewreservation',[AdminController::class,'viewreservation']);
//checf
Route::get('/viewchef',[AdminController::class,'viewchef']);
Route::post('/uploadchefinfo',[AdminController::class,'uploadchefinfo']);
Route::delete('/deletechef/{id}',[AdminController::class,'deletechef']);
Route::get('/updatechefview/{id}',[AdminController::class,'updatechefview']);
Route::post('/updatechef/{id}',[AdminController::class,'updatechef']);
//cart
Route::post('/addcart/{id}',[HomeController::class,'addcart']);
Route::get('/showcart/{id}',[HomeController::class,'showcart']);
Route::get('/remove/{id}',[HomeController::class,'remove']);
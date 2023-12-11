<?php
  
use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\ImageController;
use App\Http\Controllers\API\ProfileController;
  
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

Route::middleware('auth:api')->group(function () {
    Route::post('/profile/update-profile', [ProfileController::class, 'update_profile']);
});
  
Route::controller(ImageController::class)->group(function(){
    Route::get('image-upload', 'index');
    Route::post('image-upload', 'store')->name('image.store');
});
Route::get('/', function () {
    return view('welcome');
});

<?php
// Laravel Framework 8.47.0

use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
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
// Route::get('/','PageController@index'); // in laravel 7
Route::get('/','App\Http\Controllers\PageController@index'); // in laravel 8
// Route::get('/',[PageController::class, 'index']); // in laravel 8


// For Products
//Route::get('products/create',[ ProductController::class, 'create']); //next method, need controller name declare in the top of page
Route::get('products/create','App\Http\Controllers\ProductController@create');
Route::post('products/create','App\Http\Controllers\ProductController@store');
Route::get('product/{id}/add_cart',[PageController::class, 'add_cart']);
Route::get('products/cart',[PageController::class, 'show']);


// in .env
/*MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"*/
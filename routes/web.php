<?php

use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/{slug}', [HomeController::class, 'page']);
Route::post('/{slug}', [HomeController::class, 'store']);
Route::get('/jadwal-dokter/{code}', [HomeController::class, 'doctor']);
Route::post('/{slug}/cetakan', [HomeController::class, 'generatePdf']);

/*
|||||||||||||||||||||||||||||||||||
|||                             |||
|||         ADMIN ROUTES        |||
|||                             |||
|||||||||||||||||||||||||||||||||||
*/


// SITEMAP ROUTE
Route::get('/sitemap.xml', [HomeController::class, 'sitemap']);
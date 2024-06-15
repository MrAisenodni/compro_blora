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
Route::get('/fasilitas-pelayanan', [HomeController::class, 'service_facilities']);
Route::get('/jadwal-dokter', [HomeController::class, 'doctor_schedule']);
Route::get('/tentang', [HomeController::class, 'about']);
Route::get('/kontak', [HomeController::class, 'contact']);
Route::post('/contact', [HomeController::class, 'store']);

/*
|||||||||||||||||||||||||||||||||||
|||                             |||
|||         ADMIN ROUTES        |||
|||                             |||
|||||||||||||||||||||||||||||||||||
*/


// SITEMAP ROUTE
Route::get('/sitemap.xml', [HomeController::class, 'sitemap']);
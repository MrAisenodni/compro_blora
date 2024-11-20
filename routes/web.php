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
Route::get('/proxy/poli/{day}', function ($day) {
    $url = env('API_URL') . "poli/" . $day;
    $client = new \GuzzleHttp\Client([
        'verify' => false,
    ]);
    $response = $client->get($url, [
        'headers' => [
            'x-token' => env('X_TOKEN')
        ],
        'allow_redirects' => true,
    ]);
    return response($response->getBody(), $response->getStatusCode())
        ->header('Content-Type', $response->getHeader('Content-Type'));
});

Route::get('/proxy/doctor/{day}/{poli}', function ($day, $poli) {
    $url = env('API_URL') . "doctor/" . $day . "/" . $poli;
    $client = new \GuzzleHttp\Client([
        'verify' => false,
    ]);
    $response = $client->get($url, [
        'headers' => [
            'x-token' => env('X_TOKEN')
        ],
        'allow_redirects' => true,
    ]);
    return response($response->getBody(), $response->getStatusCode())
        ->header('Content-Type', $response->getHeader('Content-Type'));
});

Route::get('/proxy/doctor_schedule/{day}/{poli}/{doctor}', function ($day, $poli, $doctor) {
    $url = env('API_URL') . "doctor_schedule/" . $day . "/" . $poli . "/" . $doctor;
    $client = new \GuzzleHttp\Client([
        'verify' => false,
    ]);
    $response = $client->get($url, [
        'headers' => [
            'x-token' => env('X_TOKEN')
        ],
        'allow_redirects' => true,
    ]);
    return response($response->getBody(), $response->getStatusCode())
        ->header('Content-Type', $response->getHeader('Content-Type'));
});

Route::get('/proxy/patient/{term}', function ($term) {
    $url = env('API_URL') . "patient/" . $term;
    $client = new \GuzzleHttp\Client([
        'verify' => false,
    ]);
    $response = $client->get($url, [
        'headers' => [
            'x-token' => env('X_TOKEN')
        ],
        'allow_redirects' => true,
    ]);
    return response($response->getBody(), $response->getStatusCode())
        ->header('Content-Type', $response->getHeader('Content-Type'));
});

// SITEMAP ROUTE
Route::get('/sitemap.xml', [HomeController::class, 'sitemap']);

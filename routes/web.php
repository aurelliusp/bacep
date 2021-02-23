<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Console\Kernel;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/maintenance', function () {
        return view('maintenance');
    });

    Route::get('/survey', function () {
        return view('survey');
    });

    Route::get('/mount', function () {
        return view('mount');
    });


    Route::get('/troubleshoot', function () {
        return view('troubleshoot');
    });

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/detail_survey/{id}', [HomeController::class, 'detail_permit_survey']);
    Route::post('/approve_survey', [HomeController::class, 'approve_survey']);
    Route::post('/survey_reject', [HomeController::class, 'survey_reject']);
});


Route::post('/submit_data', [App\Http\Controllers\HomeController::class, 'submit_data']);
Route::post('/submit_data_survey', [App\Http\Controllers\HomeController::class, 'submit_data_survey']);
Route::post('/submit_mounting', [App\Http\Controllers\HomeController::class, 'submit_mounting']);
Route::post('/submit_troubleshoot', [App\Http\Controllers\HomeController::class, 'submit_troubleshoot']);

Route::get('/hasil_survey', [App\Http\Controllers\HomeController::class, 'surveyview']);
Route::get('/hasil_maintenance', [App\Http\Controllers\HomeController::class, 'maintenance_view']);
Route::get('/hasil_troubleshoot', [App\Http\Controllers\HomeController::class, 'troubleshoot_view']);
Route::get('/hasil_mount', [App\Http\Controllers\HomeController::class, 'mounting_view']);

// Route::get('/detail_survey', [App\Http\Controllers\HomeController::class, 'approve_survey']);

Route::get('/survey_pdf/{id}', [App\Http\Controllers\HomeController::class, 'cetak_survey_pdf']);
Route::get('/maintenance_pdf', [App\Http\Controllers\HomeController::class, 'cetak_maintenance_pdf']);
Route::get('/troubleshoot_pdf', [App\Http\Controllers\HomeController::class, 'cetak_troubleshoot_pdf']);
Route::get('/mounting_pdf', [App\Http\Controllers\HomeController::class, 'cetak_mounting_pdf']);

Route::get('/survey_full', [App\Http\Controllers\HomeController::class, 'surveyfull']);

// Route::get('/survey_full', function () {
//     return view('survey_full');
// });

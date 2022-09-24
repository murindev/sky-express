<?php

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


// public
Route::get('/', function () {return view('root.home');})->name('home');
Route::get('/calculator', function () {return view('root.calculator');})->name('calculator');

Route::get('/fizicheskim-licam',[\App\Http\Controllers\Pages\IndividualController::class,'index'])->name('individuals');
Route::get('/fizicheskim-licam/{slug}',[\App\Http\Controllers\Pages\IndividualController::class,'show'])->name('individual');

Route::get('/juridicheskim-licam',[\App\Http\Controllers\Pages\LegalController::class,'index'])->name('legals');
Route::get('/juridicheskim-licam/{slug}',[\App\Http\Controllers\Pages\LegalController::class,'show'])->name('legal');

Route::get('/uslugi',[\App\Http\Controllers\Pages\ServiceController::class,'index'])->name('services');
Route::get('/uslugi/{slug}',[\App\Http\Controllers\Pages\ServiceController::class,'show'])->name('service');

Route::get('/dop-uslugi',[\App\Http\Controllers\Pages\AddServiceController::class,'index'])->name('add-services');
Route::get('/dop-uslugi/{slug}',[\App\Http\Controllers\Pages\AddServiceController::class,'show'])->name('add-service');

Route::get('/akcii',[\App\Http\Controllers\Pages\ActionController::class,'index'])->name('actions');
Route::get('/akcii/{slug}',[\App\Http\Controllers\Pages\ActionController::class,'show'])->name('action-page');


Route::get('/poleznaja-informacija', [\App\Http\Controllers\Pages\FaqController::class,'index'])->name('faq');

Route::get('/nashi-ofisy', [\App\Http\Controllers\Pages\OfficeController::class,'index'])->name('offices');

// personal
Route::get('/personal', function () { return view('personal.user');})->middleware('auth')->name('user');
Route::get('/personal/add-user', function () { return view('personal.add-user');})->middleware('auth')->name('add-user');
Route::get('/personal/departures', function () { return view('personal.departures');})->middleware('auth')->name('departures');
Route::get('/personal/address-book', function () { return view('personal.address-book');})->middleware('auth')->name('address-book');
Route::get('/personal/calculate', function () { return view('personal.calculator');})->middleware('auth')->name('calculate');
Route::get('/personal/docs', function () { return view('personal.docs');})->middleware('auth')->name('docs');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

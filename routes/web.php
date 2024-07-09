<?php

use Illuminate\Support\Facades\Route;

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

Route::view('/', 'welcome')->name('accueil');
Route::view('dashboard', 'dashboard')->middleware(['auth', 'verified'])->name('dashboard');
Route::view('profile', 'profile')->middleware(['auth'])->name('profile');


Route::middleware('auth')->group(function () {
    Route::view('liste-projet', 'pages.projets.lister')->name('lister-projet');
    Route::view('creation-projet', 'pages.projets.creer')->name('creer-projet');
    Route::view('details-projet/{id}', 'pages.projets.details')->name('details-projet');
    Route::view('modification-projet/{id}', 'pages.projets.modifier')->name('modifier-projet');
});
require __DIR__ . '/auth.php';

<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\clientcontroller;
use App\Http\Controllers\produitcontroller;
use App\Http\Controllers\utilisateurcontroller;
use App\Http\Controllers\commandeventecontroller;
use App\Http\Controllers\commandeachatcontroller;
use App\Http\Controllers\fournisseurecontroller;
use App\Http\Controllers\typeproduitcontroller;
use App\Http\Controllers\lignecommandeventecontroller;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('clients', clientcontroller::class);
Route::resource('commandevente', commandeventecontroller::class);
Route::resource('produit', produitcontroller::class);
Route::resource('fournisseur', fournisseurecontroller::class);
Route::resource('typeproduit',typeproduitcontroller::class);
Route::resource('commandeachat', commandeachatcontroller::class);
Route::resource('utilisateur',utilisateurcontroller::class);
Route::resource('lignecommandevente',lignecommandeventecontroller::class);

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

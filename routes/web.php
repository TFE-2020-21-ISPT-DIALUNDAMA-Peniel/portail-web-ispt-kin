<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RessourceController;
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
})->middleware(['auth'])->name('dashboard');
Route::get('/add-ressource', function () {
    return view('add-ressource-form');
})->middleware(['auth'])->name('addRessource');
Route::post('/add-ressource', [RessourceController::class, 'addRessourceForm'])->middleware(['auth'])->name('addRessourcePost');

Route::get('ressources/list', [RessourceController::class, 'getRessources'])->name('ressources.list');

Route::resource('ressources',RessourceController::class);
require __DIR__.'/auth.php';

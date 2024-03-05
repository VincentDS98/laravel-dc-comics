<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\MainController;

use App\Http\Controllers\Admin\ComicController;

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

// Route::METODO(PERCORSO CON CUI ARRIVARE ALLA PAGINA, FUNZIONE DI CALLBACK CHE MI CREA LA RISPOSTA DA DARE ALL UTENTE)

Route::get('/', [MainController::class, 'index'])->name('home');   // <--- Che vantaggi ho nominando le rotte?

Route::get('/chi-siamo', [MainController::class, 'about'])->name('about');



/*
    Questa istruzione definisce 7 rotte (in quest'ordine - perché è importante l'ordine delle rotte?):
    - GET       /comic                  -> comics.index
    - POST      /comic                  -> comics.store
    - GET       /comic/create           -> comics.create
    - GET       /comic/{comic}           -> comics.show
    - PUT       /comic/{comic}           -> comics.update
    - DELETE    /comic/{comic}           -> comics.destroy
    - GET       /comic/{comic}/edit      -> comics.edit
*/
Route::resource('comics', ComicController::class);

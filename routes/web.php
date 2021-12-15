<?php

use App\Models\Recipe;
use App\Http\Controllers\RecipeController;
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

Route::get('{any}', function () {
    return view('app');
})->where('any', '.*');



/*
Route::get('/', function () {
    return view('index', [
	    'recipes' => Recipe::latest('created_at')->get()
    ]);
});
*/

/*
Route::get('recipes/{recipe:slug}', function (Recipe $recipe) {
    
    return view('show', [
	    'recipe' => $recipe
    ]);
    
});

Route::get('recipes/{recipe:slug}/edit', function (Recipe $recipe) {
    
    return view('edit', [
	    'recipe' => $recipe
    ]);
    
});
*/



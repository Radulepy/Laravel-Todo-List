<?php

use Illuminate\Support\Facades\Route;

//*Import Controller:
use App\Http\Controllers\TodoListController;


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

//* // Default Route
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [TodoListController::class, 'index']); //


//* Add new item to DB route
Route::post('/saveItemRoute', [TodoListController::class, 'saveItem'])->name('saveItem'); //name to point to the route

//* Mark as Complete: Set is_complete = 1 to item ID
Route::post('/markCompleteRoute/{id}', [TodoListController::class, 'markComplete'])->name('markComplete'); 

//* Mark as In-Complete: Set is_complete = 0 to item ID
Route::post('/markIncompleteRoute/{id}', [TodoListController::class, 'markIncomplete'])->name('markIncomplete'); 
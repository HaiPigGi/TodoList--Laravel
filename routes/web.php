<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\todo\todoController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Define routes for TodoController
Route::middleware(['auth'])->group(function () {
    // Display Todo listing
    Route::get('/todos', [todoController::class, 'index'])->name('todos.index');
    Route::patch('/todos/{id}', [todoController::class, 'update'])->name('todos.update');

    // Store a new Todo
    Route::post('/todos', [todoController::class, 'store'])->name('todos.store');
});
<?php

use App\Http\Controllers\NotesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {

    return $request->user();
});
Route::get('/notes',[NotesController::class, 'index'])->name('notes.index');
Route::get('/notes/{note}', [NotesController::class,'show'])->name('notes.show');
Route::post('/notes', [NotesController::class, 'store'])->name('notes.store');
Route::get('/notes/{note}/edit', [NotesController::class,'edit'])->name('notes.edit');

Route::post('/notes/{note}', [NotesController::class, 'update'])->name('notes.update');

Route::delete('/notes/{note}', [NotesController::class,'destroy'])->name('notes.destroy');


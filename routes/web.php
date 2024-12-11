<?php

use App\Http\Controllers\CandidateController;
use App\Http\Controllers\SearchCandidateController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
//
//
Route::get('/', function () {
    return redirect('/admin');
});

Route::get('/form', [CandidateController::class, 'create'])->name('candidate.create');
Route::post('/form', [CandidateController::class, 'store'])->name('candidate.store');


Route::get('/search', [SearchCandidateController::class, 'showForm']);
Route::post('/search', [SearchCandidateController::class, 'search']);

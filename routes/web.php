<?php

use App\Livewire\ExperimentMain;
use App\Livewire\VariableMain;
use App\Models\Experiment;
use App\Models\Variable;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get("/variables",VariableMain::class)->name("variables");
Route::get("/experiments",ExperimentMain::class)->name("experiments");
// Route::get("/operaciones",VariableMain::class)->name("operaciones");
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

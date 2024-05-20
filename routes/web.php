<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Calculadora;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/calculadora', Calculadora::class);
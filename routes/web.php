<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChamadoController;


Route::resource('chamados', ChamadoController::class);
<?php

use Illuminate\Support\Facades\Route;

Route::post('/estrategiaWMS', [EstrategiaWMSController::class, 'store']);
Route::get('/estrategiaWMS/{cdEstrategia}/{dsHora}/{dsMinuto}/prioridade', [EstrategiaWMSController::class, 'getPrioridade']);


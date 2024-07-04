<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ContactsController;

Route::get('/contacts', [ContactsController::class, 'index']);
Route::post('/contacts', [ContactsController::class, 'store']);
Route::get('/contacts/{contact}', [ContactsController::class, 'show']);
Route::put('/contacts/{contact}', [ContactsController::class, 'update']);
Route::delete('/contacts/{contact}', [ContactsController::class, 'destroy']);
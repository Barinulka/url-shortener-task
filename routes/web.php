<?php

use App\Http\Controllers\RedirectController;
use Illuminate\Support\Facades\Route;

Route::get('/{shortCode}', [RedirectController::class, 'redirect']);

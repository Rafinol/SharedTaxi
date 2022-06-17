<?php

use App\Containers\AppSection\Drive\UI\WEB\Controllers\GetAllDrivesController;
use Illuminate\Support\Facades\Route;

Route::get('drives', [GetAllDrivesController::class, 'index'])
    ->middleware(['auth:web']);


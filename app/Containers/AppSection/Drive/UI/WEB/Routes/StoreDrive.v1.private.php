<?php

use App\Containers\AppSection\Drive\UI\WEB\Controllers\CreateDriveController;
use Illuminate\Support\Facades\Route;

Route::post('drives/store', [CreateDriveController::class, 'store'])
    ->middleware(['auth:web']);


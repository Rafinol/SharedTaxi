<?php

use App\Containers\AppSection\Drive\UI\WEB\Controllers\UpdateDriveController;
use Illuminate\Support\Facades\Route;

Route::patch('drives/{id}', [UpdateDriveController::class, 'update'])
    ->middleware(['auth:web']);


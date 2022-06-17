<?php

use App\Containers\AppSection\Drive\UI\WEB\Controllers\UpdateDriveController;
use Illuminate\Support\Facades\Route;

Route::get('drives/{id}/edit', [UpdateDriveController::class, 'edit'])
    ->middleware(['auth:web']);


<?php

use App\Containers\AppSection\Drive\UI\WEB\Controllers\DeleteDriveController;
use Illuminate\Support\Facades\Route;

Route::delete('drives/{id}', [DeleteDriveController::class, 'destroy'])
    ->middleware(['auth:web']);


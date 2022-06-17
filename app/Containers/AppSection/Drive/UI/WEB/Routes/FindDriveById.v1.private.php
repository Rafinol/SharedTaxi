<?php

use App\Containers\AppSection\Drive\UI\WEB\Controllers\FindDriveByIdController;
use Illuminate\Support\Facades\Route;

Route::get('drives/{id}', [FindDriveByIdController::class, 'show'])
    ->middleware(['auth:web']);


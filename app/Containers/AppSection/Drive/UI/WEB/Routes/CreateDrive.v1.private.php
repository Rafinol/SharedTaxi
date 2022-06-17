<?php

use App\Containers\AppSection\Drive\UI\WEB\Controllers\CreateDriveController;
use Illuminate\Support\Facades\Route;

Route::get('drives/create', [CreateDriveController::class, 'create'])
    ->middleware(['auth:web']);


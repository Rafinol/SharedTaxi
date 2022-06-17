<?php

use App\Containers\AppSection\Order\UI\WEB\Controllers\UpdateOrderController;
use Illuminate\Support\Facades\Route;

Route::get('orders/{id}/edit', [UpdateOrderController::class, 'edit'])
    ->middleware(['auth:web']);


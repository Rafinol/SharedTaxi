<?php

use App\Containers\AppSection\Order\UI\WEB\Controllers\UpdateOrderController;
use Illuminate\Support\Facades\Route;

Route::patch('orders/{id}', [UpdateOrderController::class, 'update'])
    ->middleware(['auth:web']);


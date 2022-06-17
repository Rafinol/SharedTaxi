<?php

use App\Containers\AppSection\Order\UI\WEB\Controllers\CreateOrderController;
use Illuminate\Support\Facades\Route;

Route::get('orders/create', [CreateOrderController::class, 'create'])
    ->middleware(['auth:web']);


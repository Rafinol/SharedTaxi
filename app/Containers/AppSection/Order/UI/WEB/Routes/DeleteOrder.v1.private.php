<?php

use App\Containers\AppSection\Order\UI\WEB\Controllers\DeleteOrderController;
use Illuminate\Support\Facades\Route;

Route::delete('orders/{id}', [DeleteOrderController::class, 'destroy'])
    ->middleware(['auth:web']);


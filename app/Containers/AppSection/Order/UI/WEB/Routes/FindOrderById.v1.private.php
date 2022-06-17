<?php

use App\Containers\AppSection\Order\UI\WEB\Controllers\FindOrderByIdController;
use Illuminate\Support\Facades\Route;

Route::get('orders/{id}', [FindOrderByIdController::class, 'show'])
    ->middleware(['auth:web'])
    ->name('findOrderById');


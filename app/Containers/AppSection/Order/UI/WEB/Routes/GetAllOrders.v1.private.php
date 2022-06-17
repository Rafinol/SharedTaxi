<?php

use App\Containers\AppSection\Order\UI\WEB\Controllers\GetAllOrdersController;
use Illuminate\Support\Facades\Route;

Route::get('orders', [GetAllOrdersController::class, 'index'])
    ->middleware(['auth:web']);


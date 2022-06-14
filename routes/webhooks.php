<?php

use Diagro\Webhooks\Server\Controllers\WebhookController;
use Illuminate\Support\Facades\Route;

Route::middleware('webhooks')
    ->post('/webhooks/register', [WebhookController::class, 'register']);

Route::middleware('webhooks')
    ->delete('/webhooks/unregister', [WebhookController::class, 'unregister']);
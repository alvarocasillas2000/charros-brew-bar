<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OpenpayRedirectController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Webhook routes (no CSRF protection needed)
Route::post('/openpay/webhook', [OpenpayRedirectController::class, 'receiveJson']);
Route::post('/openpay/webhook/receive', [OpenpayRedirectController::class, 'webhookEvents']);
Route::post('/json/receive', [OpenpayRedirectController::class, 'receiveJson']);
Route::post('/openpay/webhook2', [OpenpayRedirectController::class, 'receiveJson']);


// Test webhook endpoint
Route::post('/test-webhook', [OpenpayRedirectController::class, 'testWebhook']);
Route::get('/test-webhook', [OpenpayRedirectController::class, 'testWebhook']);

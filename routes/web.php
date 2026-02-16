<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BusinessDayController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\AreaXGamesController;
use App\Http\Controllers\PaymentController;
// use App\Models\Reservation;
// use App\Models\BusinessDay;
// use App\Models\Area;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OpenpayRedirectController;
use App\Http\Controllers\BoletomovilResponseController;

// Public routes
Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/contacto', function () {
    return view('contacto');
})->name('contacto');

Route::get('/menu', function () {
    return view('menu');
})->name('menu');

Route::get('/terminos', function () {
    $terms = file_get_contents(resource_path('markdown/terms.md'));
    $terms = \Illuminate\Support\Str::markdown($terms);
    return view('terms', compact('terms'));
})->name('terminos');

Route::get('/reserva', function () {
    return view('reserva');
})->name('reservation');


//CONTACTO
Route::post('/contacto', [ContactoController::class, 'enviar'])->name('contacto.enviar');



//RESERVATION
Route::get('/reserva', [ReservationController::class, 'show'])->name('reservation.show');
Route::post('/reservation/store', [ReservationController::class, 'store'])->name('reservation.store');
Route::get('/reservation/{transaction_id}', [ReservationController::class, 'showDetails'])->name('reservation.details');
Route::get('/reservation/search', [ReservationController::class, 'search'])->name('reservation.search');
Route::get('/search-by-email', [ReservationController::class, 'searchByEmail'])->name('reservation.searchByEmail');
Route::get('/resend-email/{id}', [ReservationController::class, 'resendEmail'])->name('reservation.resendEmail');
Route::get('/reservation/resended-email', [ReservationController::class, 'resendedEmail'])->name('resended.email');


//AREAS
Route::get('/api/game-areas/{businessDay}', [ReservationController::class, 'getGameAreas'])->name('api.game-areas');
Route::post('/api/check-availability', [ReservationController::class, 'checkRealTimeAvailability'])->name('api.check-availability');
Route::post('/api/check-availability', [ReservationController::class, 'checkRealTimeAvailability'])->name('api.check-availability');


//Payment
Route::get('/checkout/{id}', [PaymentController::class, 'checkout'])->name('checkout');
Route::get('/openpay/redirect', [OpenpayRedirectController::class, 'handle'])->name('openpay.redirect');
// Route::post('/create-preference', [PaymentController::class, 'testSimplePreference'])->name('payment-preference.create');
// Route::get('/mercadopago/success', [PaymentController::class, 'success'])->name('mercadopago.success');
// Route::get('/mercadopago/failed', [PaymentController::class, 'failed'])->name('mercadopago.failed');

// Route::get('/payment/success', [PaymentController::class, 'success'])->name('payment.success');
// Route::get('/payment/failure', [PaymentController::class, 'failure'])->name('payment.failure');
// Route::get('/payment/pending', [PaymentController::class, 'pending'])->name('payment.pending');
// Route::post('/payment/webhook', [PaymentController::class, 'handleNotification'])->name('payment.webhook');


// Authenticated routes (using Jetstream/Sanctum)
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Common authenticated routes
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //BUSINESS DAYS
    Route::get('/business-days', [BusinessDayController::class, 'index'])
        ->name('business-days.index');
    Route::get('/business-days/create', [BusinessDayController::class, 'create'])
        ->name('business-days.create');
    Route::post('/business-days', [BusinessDayController::class, 'store'])
        ->name('business-days.store');
    Route::get('/business-days/{businessDay}', [BusinessDayController::class, 'show'])
        ->name('business-days.show');
    Route::get('/business-days/{businessDay}/edit', [BusinessDayController::class, 'edit'])
        ->name('business-days.edit');
    Route::put('/business-days/{businessDay}', [BusinessDayController::class, 'update'])
        ->name('business-days.update');
    Route::get('/business-days/{businessDay}/export', [BusinessDayController::class, 'export'])
        ->name('business-days.export-csv');
    Route::get('/business-days/{businessDay}/export-pdf', [BusinessDayController::class, 'exportPdf'])
        ->name('business-days.export-pdf');

    //AREAS
    Route::get('/areas', [AreaXGamesController::class, 'index'])
        ->name('areas.index');
    Route::get('/areas/create', [AreaXGamesController::class, 'create'])
        ->name('areas.create');
    Route::post('/areas', [AreaXGamesController::class, 'store'])
        ->name('areas.store');
    Route::get('/areas/{area}', [AreaXGamesController::class, 'show'])
        ->name('areas.show');
    Route::get('/areas/{area}/edit', [AreaXGamesController::class, 'edit'])
        ->name('areas.edit');
    Route::put('/areas/{area}', [AreaXGamesController::class, 'update'])->name('areas.update');

    //RESERVATION PRIVATE
    Route::get('/reservations/{reservation}/notes/create', [ReservationController::class, 'createNote'])
        ->name('reservations.notes.create');
    Route::post('/reservations/{reservation}/notes', [ReservationController::class, 'storeNote'])
        ->name('reservations.notes.store');
    Route::get('/reservations/{transaction_id}/with-notes', [ReservationController::class, 'showDetailsWithNotes'])
        ->name('reservation.details.with-notes');
    Route::get('/reservations/{reservation}/add-extra', [ReservationController::class, 'addExtra'])
        ->name('reserva_extra');
    Route::post('/reservations/{reservation}/add-extra', [ReservationController::class, 'storeExtra'])
        ->name('reserva_extra.store');

    //BOLETOMOVIL RESPONSES
    Route::get('/boletomovil-responses', [BoletomovilResponseController::class, 'index'])
        ->name('boletomovil-responses.index');

    //REGISTER
    Route::get('/register', function () {
        return view('auth.register');
    })->name('register');
});



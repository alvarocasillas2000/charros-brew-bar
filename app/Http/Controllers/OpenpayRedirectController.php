<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Models\Reservation;
use App\Models\Payment;
use App\Models\BoletomovilResponse;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReservationSuccessMail;
use App\Mail\TicketReservationSuccessMail;
use App\Mail\NotificationReservationSuccessMail;
use App\Mail\ReservationSuccessMailType2;
use App\Mail\NotificationReservationSuccessMailType2;
use Illuminate\Contracts\Mail\Mailable;
use App\Mail\ResendedMail;

class OpenpayRedirectController extends Controller
{
    public function handle(Request $request)
    {
        $transactionId = $request->query('id');
        $transaction = null;
        $reservation = null;
        $error = null;
        $status = null;
        $amount = null;
        $orderId = null;
        $dueDate = null;

        if ($transactionId) {
            try {
                // Consulta la API de Openpay para obtener detalles de la transacción
                $merchantId = env('OPENPAY_MERCHANT_ID', '');
                $apiKey = env('OPENPAY_PRIVATE_KEY', '');
                $sandbox = env('OPENPAY_SANDBOX', true);
                $baseUrl = $sandbox ? "https://sandbox-api.openpay.mx/v1/{$merchantId}" : "https://api.openpay.mx/v1/{$merchantId}";
                //$baseUrl = env('OPENPAY_BASE_URL', 'https://api.openpay.mx/v1') . "/{$merchantId}";
                $url = $baseUrl . "/charges/{$transactionId}";

                Log::info('[Openpay] Consultando transacción', [
                    'url' => $url,
                    'merchantId' => $merchantId,
                    'sandbox' => $sandbox,
                    'transactionId' => $transactionId
                ]);


                //$response = Http::withBasicAuth($apiKey, '')->get($url);
                // Para modo sandbox, deshabilitamos la verificación SSL
                $response = Http::withOptions(['verify' => false])->withBasicAuth($apiKey, '')->get($url);

                Log::info('[Openpay] Respuesta', ['status' => $response->status(), 'body' => $response->body()]);
                if ($response->successful()) {
                    $transaction = $response->json();
                    $status = $transaction['status'] ?? null;
                    $amount = $transaction['amount'] ?? null;
                    $orderId = $transaction['order_id'] ?? null;
                    $dueDate = $transaction['due_date'] ?? null;
                    // Procesa la transacción (actualiza payment/reservation y envía mails)
                    $this->processTransaction($transaction);
                    // Busca la reserva por order_id para mostrar en la vista
                    if ($orderId) {
                        $reservation = Reservation::find($orderId);
                    }
                    if ($reservation && $reservation->transaction_id === null) {
                        $reservation->transaction_id = $transactionId;
                        $reservation->save();
                    }
                } else {
                    $error = 'No se pudo obtener la información del pago.';
                }
            } catch (\Exception $e) {
                Log::error('Error consultando Openpay: ' . $e->getMessage());
                $error = 'Ocurrió un error al consultar el estado del pago.';
            }
        } else {
            $error = 'No se recibió el ID de la transacción.';
        }

        // log con todos los datos 
        Log::info('[Openpay] Datos de la transacción', [
            'transactionId' => $transactionId,
            'transaction' => $transaction,
            'reservation' => $reservation,
            'error' => $error,
            'status' => $status,
            'amount' => $amount
        ]);


        // La persistencia y envío de correos ya la hace processTransaction();
        // Debug log to check if transaction_id is set
        Log::info('[Openpay] Antes de la vista', [
            'reservation_id' => $reservation ? $reservation->id : null,
            'reservation_transaction_id' => $reservation ? $reservation->transaction_id : null,
            'transaction_id_from_openpay' => $transaction ? $transaction['id'] : null
        ]);

        //redirige a la vista de éxito
        return view('openpay.redirect', compact('transaction', 'reservation', 'error', 'status', 'amount', 'dueDate'));
    }

    /**
     * Receive JSON data and log it
     */
    public function receiveJson(Request $request)
    {
        Log::info('[WEBHOOK] Received webhook data', $request->all());

        try {
            // Log the complete raw request
            // Log::info('[WEBHOOK] Complete request details', [
            //     'method' => $request->method(),
            //     'url' => $request->fullUrl(),
            //     'headers' => $request->headers->all(),
            //     'query_params' => $request->query(),
            //     'all_input' => $request->all(),
            //     'raw_content' => $request->getContent(),
            //     'content_type' => $request->header('Content-Type'),
            //     'user_agent' => $request->header('User-Agent'),
            //     'ip_address' => $request->ip()
            // ]);

            // Get transaction data from webhook
            $webhookData = $request->all();
            $transactionData = $webhookData['transaction'] ?? $webhookData;

            Log::info('[WEBHOOK] Transaction data extracted', [
                'transaction_data' => $transactionData
            ]);

            // If webhook only provides an ID, try to fetch full transaction
            $transactionId = $transactionData['id'] ?? null;
            if ($transactionId && (count($transactionData) === 1 || empty($transactionData['status']))) {
                $fetched = $this->fetchOpenpayTransaction($transactionId);
                if ($fetched) {
                    $transactionData = $fetched;
                    Log::info('[WEBHOOK] Fetched full transaction from Openpay', ['transaction' => $transactionData]);
                } else {
                    Log::warning('[WEBHOOK] Could not fetch transaction details from Openpay', ['transaction_id' => $transactionId]);
                }
            }

            // Extract key transaction fields
            $orderId = $transactionData['order_id'] ?? null;
            $status = $transactionData['status'] ?? null;
            $amount = $transactionData['amount'] ?? null;
            $method = $transactionData['method'] ?? null;

            Log::info('[WEBHOOK] Extracted fields', [
                'transaction_id' => $transactionId,
                'order_id' => $orderId,
                'status' => $status,
                'amount' => $amount,
                'method' => $method
            ]);

            // Delegate processing to shared method
            $result = $this->processTransaction($transactionData);

            $reservation = $result['reservation'] ?? null;
            $payment = $result['payment'] ?? null;

            // Return success response
            return response()->json([
                'status' => 'success',
                'message' => 'Webhook processed successfully',
                'transaction_id' => $transactionId,
                'reservation_id' => $reservation ? $reservation->id : null,
                'payment_status' => $status,
                'processed_at' => now()->toISOString()
            ], 200);
        } catch (\Exception $e) {
            Log::error('[WEBHOOK] Error processing webhook', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'raw_content' => $request->getContent()
            ]);

            return response()->json([
                'status' => 'error',
                'message' => 'Error processing webhook',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Simple test endpoint to verify webhooks work
     */
    public function testWebhook(Request $request)
    {
        Log::info('[TEST WEBHOOK] Endpoint hit!', [
            'method' => $request->method(),
            'all_data' => $request->all(),
            'headers' => $request->headers->all(),
            'raw_content' => $request->getContent(),
            'timestamp' => now()
        ]);

        return response()->json([
            'message' => 'Test webhook received successfully!',
            'received_data' => $request->all(),
            'timestamp' => now()
        ]);
    }

    public function webhookEvents(Request $request)
    {
        Log::info('[WEBHOOK] Received webhook data', $request->all());
    }

    /**
     * Fetch transaction details from Openpay API when only an id is available
     */
    private function fetchOpenpayTransaction(string $transactionId)
    {
        try {
            $merchantId = env('OPENPAY_MERCHANT_ID', '');
            $apiKey = env('OPENPAY_PRIVATE_KEY', '');
            $baseUrl = env('OPENPAY_BASE_URL', 'https://api.openpay.mx/v1') . "/{$merchantId}";
            $url = $baseUrl . "/charges/{$transactionId}";

            Log::info('[Openpay] Fetching transaction from Openpay', ['url' => $url]);

            $response = Http::withOptions(['verify' => false])->withBasicAuth($apiKey, '')->get($url);

            if ($response->successful()) {
                return $response->json();
            }
        } catch (\Exception $e) {
            Log::error('[Openpay] Error fetching transaction: ' . $e->getMessage());
        }

        return null;
    }

    /**
     * Process a transaction array: persist Payment, update Reservation and send mails
     */
    private function processTransaction(array $transaction)
    {
        $transactionId = $transaction['id'] ?? null;
        $orderId = $transaction['order_id'] ?? null;
        $status = $transaction['status'] ?? null;
        $amount = $transaction['amount'] ?? 0;

        // Find the associated reservation
        $reservation = $this->findReservation($orderId, $transactionId);

        // Check if transaction was already processed
        if ($this->isTransactionAlreadyProcessed($transactionId)) {
            return ['reservation' => $reservation, 'payment' => null];
        }

        // Create or update the payment record
        $payment = $this->createOrUpdatePayment($transaction, $reservation, $transactionId, $status, $amount);

        // Link transaction to reservation
        if ($reservation && $payment) {
            $reservation->transaction_id = $payment->transaction_id;
        }

        // Update reservation status based on transaction
        if ($reservation && $status) {
            $this->updateReservationStatus($reservation, $status, $transactionId);
        }

        return ['reservation' => $reservation, 'payment' => $payment];
    }

    /**
     * Find reservation by order ID or existing payment
     */
    private function findReservation(?string $orderId, ?string $transactionId): ?Reservation
    {
        // Try to find by order_id first
        if ($orderId) {
            $reservation = Reservation::find($orderId);
            if ($reservation) {
                return $reservation;
            }
        }

        // If not found and we have a transaction ID, try to find via existing payment
        if ($transactionId && empty($orderId)) {
            $existingPayment = Payment::where('transaction_id', $transactionId)->first();
            if ($existingPayment && $existingPayment->reservation_id) {
                return Reservation::find($existingPayment->reservation_id);
            }
        }

        return null;
    }

    /**
     * Check if transaction has already been processed
     */
    private function isTransactionAlreadyProcessed(?string $transactionId): bool
    {
        if (!$transactionId) {
            return false;
        }

        $alreadyProcessed = Payment::where('transaction_id', $transactionId)
            ->where('status', 'completed')
            ->exists();

        if ($alreadyProcessed) {
            Log::info('[WEBHOOK] Transacción ya procesada, ignorando repetición', [
                'transaction_id' => $transactionId
            ]);
        }

        return $alreadyProcessed;
    }

    /**
     * Create or update payment record
     */
    private function createOrUpdatePayment(
        array $transaction,
        ?Reservation $reservation,
        ?string $transactionId,
        ?string $status,
        float $amount
    ): ?Payment {
        if (!$transactionId) {
            return null;
        }

        $paymentData = [
            'reservation_id' => $reservation?->id,
            'provider' => 'openpay',
            'payment_method' => $transaction['method'] ?? '',
            'status' => $status ?? 'pending',
            'amount' => $amount,
            'raw_response' => json_encode($transaction),
        ];

        $payment = Payment::where('transaction_id', $transactionId)->first();

        if ($payment) {
            $payment->update($paymentData);
        } else {
            $payment = Payment::create(array_merge(['transaction_id' => $transactionId], $paymentData));
        }

        return $payment;
    }

    /**
     * Update reservation status based on transaction status
     */
    private function updateReservationStatus(Reservation $reservation, string $status, ?string $transactionId): void
    {
        $oldStatus = $reservation->status;

        switch ($status) {
            case 'completed':
                $this->handleCompletedTransaction($reservation, $transactionId);
                break;

            case 'failed':
            case 'rejected':
                $reservation->status = 'rejected';
                $reservation->save();
                break;

            case 'pending':
                $reservation->status = 'pending';
                $reservation->save();
                break;

            case 'cancelled':
                $reservation->status = 'cancelled';
                $reservation->save();
                break;
        }

        Log::info('[Openpay] Reserva actualizada por processTransaction', [
            'reservation_id' => $reservation->id,
            'old_status' => $oldStatus,
            'new_status' => $reservation->status,
            'transaction_id' => $transactionId
        ]);
    }

    /**
     * Handle completed transaction: confirm reservation, send emails and notify Boletomóvil
     */
    private function handleCompletedTransaction(Reservation $reservation, ?string $transactionId): void
    {
        // Prevent duplicate emails
        if ($reservation->status === 'confirmed') {
            Log::info('[MAIL] Reserva ya confirmada, no se reenviarán correos.', [
                'reservation_id' => $reservation->id
            ]);
            return;
        }

        $reservation->status = 'confirmed';
        $reservation->save();

        $dayType = $reservation->businessDay?->day_type;

        Log::info('[PROCESS] Procesando reserva según day_type', [
            'reservation_id' => $reservation->id,
            'day_type' => $dayType
        ]);

        if ($dayType == 1) {
            // Existing process for day_type 1
            $this->sendConfirmationEmails($reservation, $transactionId);
            $this->notifyBoletomovil($reservation);
        } elseif ($dayType == 2) {
            // New processes for day_type 2
            $this->sendConfirmationEmailsType2($reservation, $transactionId);
            $this->notifyBoletomovil($reservation);
        } else {
            Log::warning('[PROCESS] day_type no reconocido, usando proceso por defecto', [
                'reservation_id' => $reservation->id,
                'day_type' => $dayType
            ]);
            // Default to type 1 process if day_type is unknown or null
            $this->sendConfirmationEmails($reservation, $transactionId);
            $this->notifyBoletomovil($reservation);
        }
    }

    /**
     * Send confirmation emails
     */
    private function sendConfirmationEmails(Reservation $reservation, ?string $transactionId): void
    {
        try {
            Mail::to($reservation->email)->send(new ReservationSuccessMail($reservation));
            //Mail::to('info@charrosjalisco.com')->send(new TicketReservationSuccessMail($reservation));
            Mail::to('info@charrosjalisco.com')->send(new NotificationReservationSuccessMail($reservation));
            
            Log::info('[MAIL] Correos enviados correctamente', [
                'reservation_id' => $reservation->id,
                'transaction_id' => $transactionId
            ]);
        } catch (\Exception $e) {
            Log::error('[MAIL] Error enviando correos: ' . $e->getMessage(), [
                'reservation_id' => $reservation->id,
                'transaction_id' => $transactionId,
                'exception' => $e
            ]);
        }
    }

    /**
     * Notify Boletomóvil API about reservation
     */
    private function notifyBoletomovil(Reservation $reservation): void
    {
        $eventId = $reservation->businessDay?->event_id;
        $sandbox = env('OPENPAY_SANDBOX', true);

        Log::info('[BOLETOMOVIL] Enviando datos a Boletomóvil para reserva', [
            'reservation_id' => $reservation->id,
            'event_id' => $eventId,
            'people_count' => $reservation->people_count,
            'email' => $reservation->email,
        ]);

        $apiEndpoint = $sandbox ? 'https://api.boletomovil.com/dev-ticketing/charros/direct-purchase' : 'https://api.boletomovil.com/ticketing/charros/direct-purchase';
        $cardPayment = $reservation->people_count * $reservation->businessDay->ticket_price;
        
        try {
            $response = Http::withoutVerifying()->post($apiEndpoint, [
                'publicKey' => env('BOLETOMOVIL_PUBLIC_KEY'),
                'eventID' => $eventId,
                'quantity' => $reservation->people_count,
                'cardPayment' => $cardPayment,
                'email' => $reservation->email,
                'comment' => 'Sport Bar | ID de Reserva: ' . $reservation->id,
            ]);

            // Save response to database
            BoletomovilResponse::create([
                'reservation_id' => $reservation->id,
                'request_type' => 'type' . ($reservation->businessDay?->day_type ?? '1'),
                'api_endpoint' => $apiEndpoint,
                'event_id' => $eventId,
                'quantity' => $reservation->people_count,
                'card_payment' => $cardPayment,
                'email' => $reservation->email,
                'http_status' => $response->status(),
                'successful' => $response->successful(),
                'response_body' => $response->body(),
            ]);

            Log::info('[BOLETOMOVIL] Respuesta de la API', [
                'status' => $response->status(),
                'body' => $response->body(),
                'successful' => $response->successful()
            ]);
        } catch (\Exception $e) {
            // Save error to database
            BoletomovilResponse::create([
                'reservation_id' => $reservation->id,
                'request_type' => 'type1',
                'api_endpoint' => $apiEndpoint,
                'event_id' => $eventId,
                'quantity' => $reservation->people_count,
                'card_payment' => $cardPayment,
                'email' => $reservation->email,
                'successful' => false,
                'error_message' => $e->getMessage(),
            ]);
            
            Log::error('[BOLETOMOVIL] Error calling API: ' . $e->getMessage(), [
                'reservation_id' => $reservation->id,
                'exception' => $e
            ]);
        }
    }

    /**
     * Send confirmation emails for day_type 2
     */
    private function sendConfirmationEmailsType2(Reservation $reservation, ?string $transactionId): void
    {
        try {
            Mail::to($reservation->email)->send(new ReservationSuccessMailType2($reservation));
            Mail::to('info@charrosjalisco.com')->send(new NotificationReservationSuccessMailType2($reservation));
            
            Log::info('[MAIL TYPE 2] Correos enviados correctamente para day_type 2', [
                'reservation_id' => $reservation->id,
                'transaction_id' => $transactionId
            ]);
        } catch (\Exception $e) {
            Log::error('[MAIL TYPE 2] Error enviando correos: ' . $e->getMessage(), [
                'reservation_id' => $reservation->id,
                'transaction_id' => $transactionId,
                'exception' => $e
            ]);
        }
    }

    /**
     * Notify Boletomóvil API for day_type 2
     */
    // private function notifyBoletomovilType2(Reservation $reservation): void
    // {
    //     $eventId = $reservation->businessDay?->event_id;

    //     Log::info('[BOLETOMOVIL TYPE 2] Enviando datos a Boletomóvil para reserva day_type 2', [
    //         'reservation_id' => $reservation->id,
    //         'event_id' => $eventId,
    //         'people_count' => $reservation->people_count,
    //         'email' => $reservation->email,
    //     ]);

    //     $apiEndpoint = 'https://api.boletomovil.com/dev-ticketing/charros/direct-purchase';
    //     $cardPayment = $reservation->people_count * $reservation->businessDay->ticket_price;
        
    //     try {
    //         // TODO: Implement Boletomóvil API logic for day_type 2
    //         // This is where you'll add the specific API call for day_type 2
    //         $response = Http::withoutVerifying()->post($apiEndpoint, [
    //             'publicKey' => env('BOLETOMOVIL_PUBLIC_KEY'),
    //             'eventID' => $eventId,
    //             'quantity' => $reservation->people_count,
    //             'cardPayment' => $cardPayment,
    //             'email' => $reservation->email,
    //             'comment' => 'Sport Bar Type 2 | ID de Reserva: ' . $reservation->id,
    //         ]);

    //         // Save response to database
    //         BoletomovilResponse::create([
    //             'reservation_id' => $reservation->id,
    //             'request_type' => 'type2',
    //             'api_endpoint' => $apiEndpoint,
    //             'event_id' => $eventId,
    //             'quantity' => $reservation->people_count,
    //             'card_payment' => $cardPayment,
    //             'email' => $reservation->email,
    //             'http_status' => $response->status(),
    //             'successful' => $response->successful(),
    //             'response_body' => $response->body(),
    //         ]);

    //         Log::info('[BOLETOMOVIL TYPE 2] Respuesta de la API', [
    //             'status' => $response->status(),
    //             'body' => $response->body(),
    //             'successful' => $response->successful()
    //         ]);
    //     } catch (\Exception $e) {
    //         // Save error to database
    //         BoletomovilResponse::create([
    //             'reservation_id' => $reservation->id,
    //             'request_type' => 'type2',
    //             'api_endpoint' => $apiEndpoint,
    //             'event_id' => $eventId,
    //             'quantity' => $reservation->people_count,
    //             'card_payment' => $cardPayment,
    //             'email' => $reservation->email,
    //             'successful' => false,
    //             'error_message' => $e->getMessage(),
    //         ]);
            
    //         Log::error('[BOLETOMOVIL TYPE 2] Error calling API: ' . $e->getMessage(), [
    //             'reservation_id' => $reservation->id,
    //             'exception' => $e
    //         ]);
    //     }
    // }
}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Charros Sport Bar') }}
        </h2>
    </x-slot>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="https://resources.openpay.mx/lib/openpay-js/1.2.39/openpay.v1.min.js"></script>
    
    <script>
        OpenPay.setId("{{ env('OPENPAY_MERCHANT_ID') }}");
        OpenPay.setApiKey("{{ env('OPENPAY_PUBLIC_KEY') }}");
        OpenPay.setSandboxMode(true);

        function showPaymentModal() {
            const modal = document.getElementById('paymentProcessingModal');
            const overlay = document.getElementById('paymentProcessingOverlay');
            if (modal) {
                modal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
                // Prevent closing by clicking overlay
                if (overlay) {
                    overlay.style.pointerEvents = 'none';
                }
            }
        }

        function hidePaymentModal() {
            const modal = document.getElementById('paymentProcessingModal');
            const overlay = document.getElementById('paymentProcessingOverlay');
            if (modal) {
                modal.classList.add('hidden');
                document.body.style.overflow = 'auto';
                if (overlay) {
                    overlay.style.pointerEvents = 'auto';
                }
            }
        }

        function SUCCESS_CALLBACK(response) {
            // Keep modal visible while redirecting
            if (response && response['data'] && response['data']['checkout_link']) {
                window.location.replace(response['data']['checkout_link']);
            } else {
                hidePaymentModal();
                Swal.fire('Error', 'No se recibió el enlace de pago de Openpay.', 'error');
            }
        }

        function ERROR_CALLBACK(response) {
            hidePaymentModal();
            console.error('OpenPay Error:', response);
            Swal.fire('Error', response && response['data'] && response['data']['description'] ? response['data']['description'] : 'No se pudo procesar el pago', 'error');
            const checkoutBtn = document.getElementById('checkout-button');
            checkoutBtn.style.pointerEvents = '';
            checkoutBtn.style.opacity = '';
            checkoutBtn.innerHTML = '<i class="fas fa-lock"></i><span>Proceder al Pago</span>';
        }

        document.getElementById('checkout-button').addEventListener('click', function() {
            // Show loading modal immediately
            showPaymentModal();
            
            const checkoutBtn = document.getElementById('checkout-button');
            checkoutBtn.style.pointerEvents = 'none';
            checkoutBtn.style.opacity = '0.6';
            checkoutBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i><span>Procesando...</span>';
            const productInput = document.getElementById('product_id');
            if (!productInput) {
                hidePaymentModal();
                Swal.fire('Error', 'No se encontró la reserva. No es posible continuar con el pago.', 'error');
                checkoutBtn.style.pointerEvents = '';
                checkoutBtn.style.opacity = '';
                checkoutBtn.innerHTML = '<i class="fas fa-lock"></i><span>Proceder al Pago</span>';
                return;
            }
            const nombre = document.getElementById('name').textContent.trim().replace(/[^a-zA-Z0-9\s]/g, '');
            const email = document.getElementById('email').textContent.trim();
            const area = document.getElementById('area-name').textContent.trim();
            const phone = document.getElementById('phone').textContent.trim();
            const dia = document.getElementById('day').textContent.trim();
            const personas = document.getElementById('people').textContent.trim();
            const totalText = document.getElementById('total-cost').textContent.trim();
            const total = totalText.replace(/[$,]/g, '');
            const id = document.getElementById('product_id').value;
            const description = nombre + ' - ' + document.getElementById('description').textContent.trim().replace(/[^a-zA-Z0-9\s]/g, '');

            // Crear fecha de expiración (120 minutos desde ahora)
            const expirationDate = new Date();
            expirationDate.setMinutes(expirationDate.getMinutes() + 120);
            // Use toISOString and remove milliseconds and 'Z'
            const formattedExpirationDate = expirationDate.toISOString().slice(0, 19);

            const merchantid = "{{ env('OPENPAY_MERCHANT_ID') }}";
            const publickey = "{{ env('OPENPAY_PUBLIC_KEY') }}";
            console.log({
                merchantid,
                publickey,
                amount: parseFloat(total),
                currency: 'MXN',
                description: description,
                order_id: id,
                //send_email: false,
                expiration_date: formattedExpirationDate,
                customer: {
                    name: nombre,
                    phone_number: phone,
                    email: email
                },
                redirect_url: window.location.origin + '/openpay/redirect'
            });

            OpenPay.checkout.create({
                amount: parseFloat(total),
                currency: "MXN",
                description: description,
                order_id: id,
                send_email: false,
                //expiration_date: formattedExpirationDate,
                customer: {
                    name: nombre,
                    phone_number: phone,
                    email: email
                },
                redirect_url: window.location.origin + '/openpay/redirect'
            }, SUCCESS_CALLBACK, ERROR_CALLBACK);
            // const orderData = {
            //     amount: parseFloat(total),
            //     currency: 'MXN',
            //     description: description,
            //     order_id: id,
            //     send_email: false,
            //     expiration_date: formattedExpirationDate,
            //     customer: {
            //         name: nombre,
            //         phone_number: phone,
            //         email: email
            //     },
            //     redirect_url: window.location.origin + '/openpay/redirect'
            // };

            // OpenPay.checkout.create(orderData, SUCCESS_CALLBACK, ERROR_CALLBACK);
        });
    </script>
    @endpush

    <!-- Hero Section with Gradient Background -->
    <div class="min-h-screen bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
            <!-- Header -->
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-700 rounded-full mb-4 shadow-lg">
                    <i class="fas fa-shopping-cart text-white text-2xl"></i>
                </div>
                <h1 class="text-4xl font-bold text-gray-900 mb-2">
                    Finalizar Reserva
                </h1>
                <p class="text-gray-600">
                    Revisa los detalles de tu reserva antes de continuar
                </p>
            </div>

            @if(isset($reservation))
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Reservation Details Card -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
                        <div class="bg-gradient-to-r from-blue-600 via-blue-700 to-blue-800 px-6 py-4">
                            <h2 class="text-xl font-bold text-white flex items-center">
                                <i class="fas fa-file-invoice mr-3"></i>
                                Detalles de la Reserva
                            </h2>
                        </div>
                        
                        <div class="p-6 space-y-6">
                            <input type="hidden" id="product_id" value="{{ $reservation->id }}">
                            
                            <!-- Customer Information -->
                            <div class="border-b border-gray-200 pb-6">
                                <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-4">
                                    Información del Cliente
                                </h3>
                                <div class="space-y-3">
                                    <div class="flex items-start">
                                        <div class="flex-shrink-0 w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                                            <i class="fas fa-user text-blue-600"></i>
                                        </div>
                                        <div class="flex-1">
                                            <p class="text-xs text-gray-500 font-medium">Nombre</p>
                                            <p id="name" class="text-gray-900 font-semibold">{{ $reservation->name }}</p>
                                        </div>
                                    </div>
                                    
                                    <div class="flex items-start">
                                        <div class="flex-shrink-0 w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center mr-3">
                                            <i class="fas fa-envelope text-purple-600"></i>
                                        </div>
                                        <div class="flex-1">
                                            <p class="text-xs text-gray-500 font-medium">Email</p>
                                            <p id="email" class="text-gray-900 font-semibold break-all">{{ $reservation->email }}</p>
                                        </div>
                                    </div>
                                    
                                    <div class="flex items-start">
                                        <div class="flex-shrink-0 w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                                            <i class="fas fa-phone text-green-600"></i>
                                        </div>
                                        <div class="flex-1">
                                            <p class="text-xs text-gray-500 font-medium">Teléfono</p>
                                            <p id="phone" class="text-gray-900 font-semibold">{{ $reservation->phone }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Reservation Information -->
                            <div>
                                <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-4">
                                    Información de la Reserva
                                </h3>
                                <div class="space-y-3">
                                    <div class="flex items-start">
                                        <div class="flex-shrink-0 w-10 h-10 bg-indigo-100 rounded-lg flex items-center justify-center mr-3">
                                            <i class="fas fa-map-marker-alt text-indigo-600"></i>
                                        </div>
                                        <div class="flex-1">
                                            <p class="text-xs text-gray-500 font-medium">Área</p>
                                            <p id="area-name" class="text-gray-900 font-semibold">{{ $reservation->area->name ?? 'N/A' }}</p>
                                        </div>
                                    </div>
                                    
                                    <div class="flex items-start">
                                        <div class="flex-shrink-0 w-10 h-10 bg-pink-100 rounded-lg flex items-center justify-center mr-3">
                                            <i class="fas fa-calendar-day text-pink-600"></i>
                                        </div>
                                        <div class="flex-1">
                                            <p class="text-xs text-gray-500 font-medium">Día de Juego</p>
                                            <p id="day" class="text-gray-900 font-semibold">{{ $reservation->businessDay->date->format('d-m-Y') ?? 'N/A' }}</p>
                                            <p id="description" class="text-sm text-gray-600 mt-1">{{ $reservation->businessDay->description ?? '' }}</p>
                                        </div>
                                    </div>
                                    
                                    <div class="flex items-start">
                                        <div class="flex-shrink-0 w-10 h-10 bg-orange-100 rounded-lg flex items-center justify-center mr-3">
                                            <i class="fas fa-users text-orange-600"></i>
                                        </div>
                                        <div class="flex-1">
                                            <p class="text-xs text-gray-500 font-medium">Número de Personas</p>
                                            <p id="people" class="text-gray-900 font-semibold">{{ $reservation->people_count }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Payment Summary Card -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100 sticky top-8">
                        <div class="bg-gradient-to-r from-blue-600 via-blue-700 to-blue-800 px-6 py-4">
                            <h2 class="text-xl font-bold text-white flex items-center">
                                <i class="fas fa-receipt mr-3"></i>
                                Resumen
                            </h2>
                        </div>
                        
                        <div class="p-6 space-y-6">
                            <!-- Cost Breakdown -->
                            <div class="space-y-3">
                                <div class="flex justify-between items-center pb-3 border-b border-gray-200">
                                    <span class="text-gray-600">Subtotal</span>
                                    <span class="font-semibold text-gray-900">${{ number_format($reservation->total_cost, 2) }}</span>
                                </div>
                                
                                <div class="flex justify-between items-center pb-3 border-b border-gray-200">
                                    <span class="text-gray-600">Personas</span>
                                    <span class="font-semibold text-gray-900">{{ $reservation->people_count }}</span>
                                </div>
                                
                                <div class="bg-gradient-to-r from-green-50 to-emerald-50 rounded-xl p-4 border border-green-200">
                                    <div class="flex justify-between items-center">
                                        <span class="text-lg font-bold text-gray-900">Total</span>
                                        <span id="total-cost" class="text-2xl font-bold bg-gradient-to-r from-green-600 to-emerald-600 bg-clip-text text-transparent">
                                            ${{ number_format($reservation->total_cost, 2) }}
                                        </span>
                                    </div>
                                    <p class="text-xs text-gray-600 mt-2">MXN (Pesos Mexicanos)</p>
                                </div>
                            </div>

                            <!-- Payment Button -->
                            <button id="checkout-button" 
                                class="w-full bg-gradient-to-r from-blue-600 via-blue-700 to-blue-800 hover:from-blue-700 hover:via-blue-800 hover:to-blue-900 text-white font-bold py-4 px-6 rounded-xl transition-all duration-300 transform hover:scale-105 hover:shadow-2xl flex items-center justify-center space-x-2 group">
                                <i class="fas fa-lock group-hover:scale-110 transition-transform"></i>
                                <span>Proceder al Pago</span>
                            </button>

                            <!-- Security Badge -->
                            <div class="flex items-center justify-center space-x-2 text-sm text-gray-500 pt-4 border-t border-gray-200">
                                <i class="fas fa-shield-alt text-green-600"></i>
                                <span>Pago 100% Seguro</span>
                                <img src="{{ asset('assets/img/openpay-logo.svg') }}" alt="logo Openpay" class="h-10 lg:h-8">
                            </div>

                            <!-- Payment Info -->
                            <div class="bg-blue-50 rounded-xl p-4 border border-blue-200">
                                <div class="flex items-start space-x-3">
                                    <i class="fas fa-info-circle text-blue-600 mt-1"></i>
                                    <div class="flex-1">
                                        <p class="text-sm text-gray-700 font-medium mb-1">Información de Pago</p>
                                        <p class="text-xs text-gray-600">
                                            El enlace de pago expirará en 2 horas. Procesado de forma segura mediante OpenPay.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100 p-12 text-center">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-red-100 rounded-full mb-6">
                    <i class="fas fa-exclamation-triangle text-red-600 text-3xl"></i>
                </div>
                <h2 class="text-2xl font-bold text-gray-900 mb-2">Reserva No Encontrada</h2>
                <p class="text-gray-600 mb-6">No se encontró la información de la reserva solicitada.</p>
                <a href="{{ route('reservation.show') }}" 
                   class="inline-flex items-center space-x-2 bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white font-bold py-3 px-6 rounded-xl transition-all duration-300">
                    <i class="fas fa-arrow-left"></i>
                    <span>Volver a Reservar</span>
                </a>
            </div>
            @endif
        </div>
    </div>

    <!-- Payment Processing Modal -->
    <div id="paymentProcessingModal" class="hidden fixed inset-0 z-50 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <!-- Background overlay -->
            <div class="fixed inset-0 transition-opacity bg-gray-900 bg-opacity-75 backdrop-blur-sm" id="paymentProcessingOverlay"></div>

            <!-- Modal panel -->
            <div class="inline-block align-bottom bg-white rounded-3xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-gradient-to-r from-blue-600 to-blue-800 px-6 py-4">
                    <h3 class="text-2xl font-bold text-white flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-7 h-7">
                            <path d="M1 4.25a3.733 3.733 0 0 1 2.25-.75h13.5c.844 0 1.623.279 2.25.75A2.25 2.25 0 0 0 16.75 2H3.25A2.25 2.25 0 0 0 1 4.25ZM1 7.25a3.733 3.733 0 0 1 2.25-.75h13.5c.844 0 1.623.279 2.25.75A2.25 2.25 0 0 0 16.75 5H3.25A2.25 2.25 0 0 0 1 7.25ZM7 8a1 1 0 0 1 1 1 2 2 0 1 0 4 0 1 1 0 0 1 1-1h3.75A2.25 2.25 0 0 1 19 10.25v5.5A2.25 2.25 0 0 1 16.75 18H3.25A2.25 2.25 0 0 1 1 15.75v-5.5A2.25 2.25 0 0 1 3.25 8H7Z" />
                        </svg>
                        Procesando Pago
                    </h3>
                </div>
                <div class="bg-white px-6 py-8">
                    <div class="space-y-6">
                        <div class="flex flex-col items-center justify-center py-8">
                            <div class="relative">
                                <div class="w-24 h-24 border-8 border-blue-200 border-t-blue-600 rounded-full animate-spin"></div>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-10 h-10 text-blue-600 animate-pulse">
                                        <path fill-rule="evenodd" d="M10 1a4.5 4.5 0 0 0-4.5 4.5V9H5a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2v-6a2 2 0 0 0-2-2h-.5V5.5A4.5 4.5 0 0 0 10 1Zm3 8V5.5a3 3 0 1 0-6 0V9h6Z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                            <p class="mt-6 text-xl font-bold text-gray-800">Preparando tu pago seguro...</p>
                            <p class="mt-2 text-sm text-gray-600 text-center">Por favor espera mientras te redirigimos a la pasarela de pago</p>
                        </div>
                        <div class="bg-blue-50 rounded-xl p-4 border-2 border-blue-200">
                            <div class="flex items-start gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 text-blue-600 flex-shrink-0 mt-0.5">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0Zm-7-4a1 1 0 1 1-2 0 1 1 0 0 1 2 0ZM9 9a.75.75 0 0 0 0 1.5h.253a.25.25 0 0 1 .244.304l-.459 2.066A1.75 1.75 0 0 0 10.747 15H11a.75.75 0 0 0 0-1.5h-.253a.25.25 0 0 1-.244-.304l.459-2.066A1.75 1.75 0 0 0 9.253 9H9Z" clip-rule="evenodd" />
                                </svg>
                                <p class="text-sm text-blue-900">
                                    <span class="font-semibold">No cierres esta ventana.</span> Estamos generando tu enlace de pago seguro con OpenPay.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Payment Processing Modal -->

    <!-- Evitar el tener una sesión iniciada -->
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
</x-app-layout>
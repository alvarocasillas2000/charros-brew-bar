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
        OpenPay.setSandboxMode("{{env('OPENPAY_SANDBOX')}}");

        function SUCCESS_CALLBACK(response) {
            if (response && response.data && response.data.checkout_link) {
                window.location.replace(response.data.checkout_link);
            } else {
                Swal.fire('Error', 'No se recibió el enlace de pago de Openpay.', 'error');
            }
        }

        function ERROR_CALLBACK(response) {
            Swal.fire('Error', response && response.data && response.data.description ? response.data.description : 'No se pudo procesar el pago', 'error');
            const checkoutBtn = document.getElementById('checkout-button');
            checkoutBtn.style.pointerEvents = '';
            checkoutBtn.style.opacity = '';
            checkoutBtn.innerHTML = '<i class="fas fa-lock"></i><span>Proceder al Pago</span>';
        }

        document.getElementById('checkout-button').addEventListener('click', function() {
            const checkoutBtn = document.getElementById('checkout-button');
            checkoutBtn.style.pointerEvents = 'none';
            checkoutBtn.style.opacity = '0.6';
            checkoutBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i><span>Procesando...</span>';
            const productInput = document.getElementById('product_id');
            if (!productInput) {
                Swal.fire('Error', 'No se encontró la reserva. No es posible continuar con el pago.', 'error');
                checkoutBtn.style.pointerEvents = '';
                checkoutBtn.style.opacity = '';
                checkoutBtn.innerHTML = '<i class="fas fa-lock"></i><span>Proceder al Pago</span>';
                return;
            }
            const nombre = document.getElementById('name').textContent.trim();
            const email = document.getElementById('email').textContent.trim();
            const area = document.getElementById('area-name').textContent.trim();
            const phone = document.getElementById('phone').textContent.trim();
            const dia = document.getElementById('day').textContent.trim();
            const personas = document.getElementById('people').textContent.trim();
            const totalText = document.getElementById('total-cost').textContent.trim();
            const total = totalText.replace(/[$,]/g, '');
            const id = document.getElementById('product_id').value;
            const description = nombre + ' - ' + document.getElementById('description').textContent.trim();

            // Crear fecha de expiración (120 minutos desde ahora)
            const expirationDate = new Date();
            expirationDate.setMinutes(expirationDate.getMinutes() + 120);
            const formattedExpirationDate = expirationDate.getFullYear() + '-' + 
                String(expirationDate.getMonth() + 1).padStart(2, '0') + '-' + 
                String(expirationDate.getDate()).padStart(2, '0') + ' ' + 
                String(expirationDate.getHours()).padStart(2, '0') + ':' + 
                String(expirationDate.getMinutes()).padStart(2, '0');

            const orderData = {
                amount: parseFloat(total),
                currency: 'MXN',
                description: description,
                order_id: id,
                send_email: false,
                expiration_date: formattedExpirationDate,
                customer: {
                    name: nombre,
                    phone_number: phone,
                    email: email
                },
                redirect_url: window.location.origin + '/openpay/redirect'
            };

            OpenPay.checkout.create(orderData, SUCCESS_CALLBACK, ERROR_CALLBACK);
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

    <!-- SDK de Mercado Pago -->

    <!-- @push('scripts') -->
    <!-- <script src="https://sdk.mercadopago.com/js/v2"></script>
    <script>
        const mp = new MercadoPago("{{ env('MP_PUBLIC_KEY') }}");

        document.getElementById('checkout-button').addEventListener('click', function() {
            const checkoutBtn = document.getElementById('checkout-button');
            checkoutBtn.style.pointerEvents = 'none';
            checkoutBtn.style.opacity = '0.6';
            checkoutBtn.textContent = 'Procesando...';
            const productInput = document.getElementById('product_id');
            if (!productInput) {
                alert('No se encontró la reserva. No es posible continuar con el pago.');
                // Si no se encuentra el ID del producto, rehabilitar el botón
                checkoutBtn.style.pointerEvents = '';
                checkoutBtn.style.opacity = '';
                checkoutBtn.textContent = 'Pagar';
                return;
            }
            const nombre = document.getElementById('name').textContent.split(':')[1].trim();
            const email = document.getElementById('email').textContent.split(':')[1].trim();
            const description = nombre + ' - ' + document.getElementById('description').textContent.split(':')[1].trim();
            const area = document.getElementById('area-name').textContent.split(':')[1].trim();
            const phone = document.getElementById('phone').textContent.split(':')[1].trim();
            const dia = document.getElementById('day').textContent.split(':')[1].trim();
            const personas = document.getElementById('people').textContent.split(':')[1].trim();
            const total = document.getElementById('total-cost').textContent.split(':')[1].trim();
            const id = document.getElementById('product_id').value;
            const title = nombre + ' - ' + area + ' - ' + dia;
            const unit_price = parseFloat(total.replace(/[$,]/g, '')) / parseInt(personas);
            console.log('title', phone);

            const orderData = {
                product: [{
                    id: id,
                    title: title,
                    description: description,
                    currency_id: "MXN",
                    quantity: total,
                    unit_price: unit_price,
                }],
                name: nombre,
                email: email,
                phone: phone,
            };

            console.log('Datos del pedido:', orderData);

            fetch('/create-preference', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                    },
                    body: JSON.stringify(orderData)
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Error en la respuesta del servidor');
                    }
                    return response.json();
                })
                .then(preference => {
                    if (preference.error) {
                        throw new Error(preference.error);
                    }
                    mp.checkout({
                        preference: {
                            id: preference.id
                        },
                        autoOpen: true
                    });
                    console.log('Respuesta de la preferencia:', preference);
                })
                .catch(error => {
                    console.error('Error al crear la preferencia:', error);
                    // Si exite error, rehabilitar el botón
                    checkoutBtn.style.pointerEvents = '';
                    checkoutBtn.style.opacity = '';
                    checkoutBtn.textContent = 'Pagar';
                });
        });
    </script> -->
    <!-- @endpush -->

    <!-- Evitar el tener una sesión iniciada -->
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
</x-app-layout>
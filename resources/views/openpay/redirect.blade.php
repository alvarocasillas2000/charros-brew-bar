<x-app-layout>
    
    <!-- Hero Section with Gradient Background -->
    <div class="min-h-screen bg-gradient-to-br from-gray-50 via-gray-50 to-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto">
            
            @if($error)
                <!-- Error State -->
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-red-200">
                    <div class="bg-gradient-to-r from-red-500 to-pink-600 px-6 py-8 text-center">
                        <div class="inline-flex items-center justify-center w-20 h-20 bg-white rounded-full mb-4 shadow-lg">
                            <i class="fas fa-exclamation-circle text-red-600 text-4xl"></i>
                        </div>
                        <h1 class="text-3xl font-bold text-white mb-2">
                            Error en el Pago
                        </h1>
                    </div>
                    
                    <div class="p-8 text-center">
                        <div class="bg-red-50 border border-red-200 rounded-xl p-6 mb-6">
                            <p class="text-red-700 font-semibold text-lg">{{ $error }}</p>
                        </div>
                        
                        <div class="space-y-4">
                            <a href="/" 
                               class="inline-flex items-center space-x-2 bg-gradient-to-r from-gray-600 to-gray-600 hover:from-gray-700 hover:to-gray-700 text-white font-bold py-3 px-6 rounded-xl transition-all duration-300 transform hover:scale-105">
                                <i class="fas fa-home"></i>
                                <span>Volver al Inicio</span>
                            </a>
                            
                            <div class="pt-4 border-t border-gray-200">
                                <p class="text-gray-600">
                                    Si necesitas ayuda, por favor 
                                    <a href="{{ route('contacto') }}" class="text-gray-600 hover:text-gray-700 underline font-semibold">
                                        contáctanos
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <!-- Success/Status State -->
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
                    <!-- Header with Status -->
                    @if($status === 'confirmed' || $status === 'completed')
                        <div class="bg-gradient-to-r from-green-500 to-emerald-600 px-6 py-8 text-center">
                            <div class="inline-flex items-center justify-center w-20 h-20 bg-white rounded-full mb-4 shadow-lg animate-bounce">
                                <i class="fas fa-check-circle text-green-600 text-4xl"></i>
                            </div>
                            <h1 class="text-3xl font-bold text-white mb-2">
                                ¡Pago Completado!
                            </h1>
                            <p class="text-green-100">
                                Tu reservación ha sido confirmada exitosamente
                            </p>
                        </div>
                    @elseif($status === 'in_progress')
                        <div class="bg-gradient-to-r from-yellow-500 to-orange-500 px-6 py-8 text-center">
                            <div class="inline-flex items-center justify-center w-20 h-20 bg-white rounded-full mb-4 shadow-lg">
                                <i class="fas fa-clock text-yellow-600 text-4xl"></i>
                            </div>
                            <h1 class="text-3xl font-bold text-white mb-2">
                                Pago en Proceso
                            </h1>
                            <p class="text-yellow-100">
                                Tu pago está siendo verificado
                            </p>
                        </div>
                    @else
                        <div class="bg-gradient-to-r from-gray-500 to-gray-600 px-6 py-8 text-center">
                            <div class="inline-flex items-center justify-center w-20 h-20 bg-white rounded-full mb-4 shadow-lg">
                                <i class="fas fa-info-circle text-gray-600 text-4xl"></i>
                            </div>
                            <h1 class="text-3xl font-bold text-white mb-2">
                                Estado del Pago
                            </h1>
                            <p class="text-gray-100">
                                {{ ucfirst($status) }}
                            </p>
                        </div>
                    @endif
                    
                    <!-- Payment Details -->
                    <div class="p-8">
                        <div class="space-y-6">
                            <!-- Status Message -->
                            @if($status === 'confirmed' || $status === 'completed')
                                <div class="bg-green-50 border border-green-200 rounded-xl p-6">
                                    <div class="flex items-start space-x-4">
                                        <i class="fas fa-check-circle text-green-600 text-2xl mt-1"></i>
                                        <div class="flex-1">
                                            <h3 class="text-lg font-bold text-green-900 mb-2">¡Pago Recibido Correctamente!</h3>
                                            <p class="text-green-700">
                                                Recibirás un correo electrónico con los detalles e instrucciones de tu reserva
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @elseif($status === 'in_progress')
                                <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-6">
                                    <div class="flex items-start space-x-4">
                                        <i class="fas fa-clock text-yellow-600 text-2xl mt-1"></i>
                                        <div class="flex-1">
                                            <h3 class="text-lg font-bold text-yellow-900 mb-2">Pago en Verificación</h3>
                                            <p class="text-yellow-700">
                                                El pago está en proceso. Recibirás un correo electrónico cuando tu pago se realice. 
                                                Recuerda que tu pago tiene como fecha de vencimiento 2 hrs a partir de la generación del mismo. 
                                                Evita la cancelación de tu reserva.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="bg-gray-50 border border-gray-200 rounded-xl p-6">
                                    <div class="flex items-start space-x-4">
                                        <i class="fas fa-info-circle text-gray-600 text-2xl mt-1"></i>
                                        <div class="flex-1">
                                            <h3 class="text-lg font-bold text-gray-900 mb-2">Estado: {{ ucfirst($status) }}</h3>
                                            <p class="text-gray-700">
                                                Recuerda que tu pago tiene como fecha de vencimiento 2 hrs a partir de la generación del mismo. 
                                                Evita la cancelación de tu reserva.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            
                            <!-- Payment Information Card -->
                            <div class="bg-gradient-to-r from-gray-50 to-gray-100 rounded-xl p-6 border border-gray-200">
                                <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-4">
                                    Información del Pago
                                </h3>
                                <div class="space-y-4">
                                    <div class="flex items-center justify-between pb-3 border-b border-gray-300">
                                        <div class="flex items-center space-x-3">
                                            <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center">
                                                <i class="fas fa-check text-gray-600"></i>
                                            </div>
                                            <span class="text-gray-700 font-medium">Estado</span>
                                        </div>
                                        <span class="font-bold text-gray-900">
                                            @if($status === 'confirmed' || $status === 'completed')
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-green-100 text-green-800">
                                                    <i class="fas fa-check-circle mr-2"></i>
                                                    Pago Completado
                                                </span>
                                            @elseif($status === 'in_progress')
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-yellow-100 text-yellow-800">
                                                    <i class="fas fa-clock mr-2"></i>
                                                    En Proceso
                                                </span>
                                            @else
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-gray-100 text-gray-800">
                                                    {{ ucfirst($status) }}
                                                </span>
                                            @endif
                                        </span>
                                    </div>
                                    
                                    <div class="flex items-center justify-between pb-3 border-b border-gray-300">
                                        <div class="flex items-center space-x-3">
                                            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                                                <i class="fas fa-dollar-sign text-green-600"></i>
                                            </div>
                                            <span class="text-gray-700 font-medium">Monto</span>
                                        </div>
                                        <span class="text-2xl font-bold bg-gradient-to-r from-green-600 to-emerald-600 bg-clip-text text-transparent">
                                            ${{ number_format($amount, 2) }}
                                        </span>
                                    </div>
                                    
                                    @if($reservation)
                                    <div class="flex items-start justify-between">
                                        <div class="flex items-center space-x-3">
                                            <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center">
                                                <i class="fas fa-ticket-alt text-gray-600"></i>
                                            </div>
                                            <span class="text-gray-700 font-medium">Reserva</span>
                                        </div>
                                        <div class="text-right">
                                            <p class="font-bold text-gray-900">#{{ $reservation->id }}</p>
                                            <p class="text-sm text-gray-600">{{ $reservation->name }}</p>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            
                            <!-- Action Buttons -->
                            <div class="flex flex-col sm:flex-row gap-4 pt-4">
                                <a href="/" 
                                   class="flex-1 inline-flex items-center justify-center space-x-2 bg-gradient-to-r from-gray-600 to-gray-600 hover:from-gray-700 hover:to-gray-700 text-white font-bold py-4 px-6 rounded-xl transition-all duration-300 transform hover:scale-105 hover:shadow-xl">
                                    <i class="fas fa-home"></i>
                                    <span>Volver al Inicio</span>
                                </a>
                                
                                @if($reservation && $reservation->transaction_id)
                                <a href="{{ route('reservation.details', $reservation->transaction_id) }}" 
                                   class="flex-1 inline-flex items-center justify-center space-x-2 bg-gradient-to-r from-gray-600 to-gray-700 hover:from-gray-700 hover:to-gray-800 text-white font-bold py-4 px-6 rounded-xl transition-all duration-300 transform hover:scale-105 hover:shadow-xl">
                                    <i class="fas fa-file-invoice"></i>
                                    <span>Ver Detalles</span>
                                </a>
                                @endif
                            </div>
                            
                            <!-- Help Section -->
                            <div class="bg-gray-50 border border-gray-200 rounded-xl p-6 text-center">
                                <div class="flex items-center justify-center space-x-2 text-gray-900 mb-2">
                                    <i class="fas fa-question-circle"></i>
                                    <h4 class="font-bold">¿Necesitas Ayuda?</h4>
                                </div>
                                <p class="text-gray-700">
                                    Si tienes alguna pregunta o necesitas asistencia, por favor 
                                    <a href="{{ route('contacto') }}" class="text-gray-600 hover:text-gray-800 underline font-semibold">
                                        contáctanos
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    @php
        $seoTitle = 'Términos y Condiciones | Charros Brew Bar';
        $seoDescription = 'Términos y condiciones de reserva en Charros Brew Bar. Conoce nuestras políticas de cancelación, políticas de acceso y reglas del establecimiento.';
        $seoKeywords = 'terminos Charros Brew Bar, politicas de reserva, condiciones de uso, cancelacion reservas';
        $ogType = 'article';
    @endphp

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Charros Brew Bar') }}
        </h2>
    </x-slot>

    <div
        id="page-container"
        class="mx-auto flex min-h-dvh w-full min-w-[320px] flex-col bg-gray-100">
        <!-- Page Content -->
        <main id="page-content" class="flex max-w-full flex-auto flex-col">
            <div class="container mx-auto px-4 py-12">
                <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
                    <div class="p-8">
                        <div class="prose prose-lg max-w-none">
                            <h1 class="text-3xl font-bold text-gray-900 mb-8 text-center">
                                Términos y Condiciones de Reservas
                            </h1>
                            
                            <h2 class="text-xl font-semibold text-gray-800 mb-4 text-center">
                                RESTAURANTE Charros Brew Bar
                            </h2>

                            <div class="space-y-8">
                                <section>
                                    <h3 class="text-xl font-semibold text-gray-800 mb-4">1. Generalidades</h3>
                                    <p class="text-gray-700 leading-relaxed">
                                        Al realizar la reserva o compra de boletos para un evento en el estadio CHARROS, el cliente acepta los siguientes términos y condiciones. Estos son vinculantes y aplican a cualquier tipo de entrada, ya sea electrónica, impresa o adquirida físicamente.
                                    </p>
                                </section>

                                <section>
                                    <h3 class="text-xl font-semibold text-gray-800 mb-4">2. Reserva y Compra</h3>
                                    <ul class="list-disc list-inside space-y-2 text-gray-700">
                                        <li>Las reservas están sujetas a disponibilidad.</li>
                                        <li>Algunas reservas pueden requerir pago inmediato o dentro de un plazo específico; de no completarse, la reserva puede ser cancelada automáticamente.</li>
                                        <li>Las reservas tienen un tiempo disponibles, desde la apertura de puertas hasta la 4ª entrada del juego. En caso de dificultad, el cliente puede contactarse con el encargado de las reservas.</li>
                                        <li>Las reservas deben ser respetadas con la cantidad de personas y monto de consumo estipulado por las promociones activadas por la administración del estadio.</li>
                                        <li>Al reservar zonas con vistas al campo, como terrazas frente al juego, suelen requerir un mínimo de consumo en alimentos y bebidas.</li>
                                        <li>Una vez completada la compra, el boleto no es reembolsable, salvo en los casos establecidos más adelante.</li>
                                        <li>Todos los precios están expresados en moneda local e incluyen impuestos, salvo que se indique lo contrario.</li>
                                        <li>Pueden aplicarse cargos por servicio, impresión o entrega.</li>
                                    </ul>
                                </section>

                                <section>
                                    <h3 class="text-xl font-semibold text-gray-800 mb-4">3. Pago</h3>
                                    <ul class="list-disc list-inside space-y-2 text-gray-700">
                                        <li>Las transacciones serán efectuadas mediante la pasarela de Openpay.</li>
                                    </ul>
                                </section>

                                <section>
                                    <h3 class="text-xl font-semibold text-gray-800 mb-4">4. Política de Cancelación y Reembolsos</h3>
                                    <p class="text-gray-700 mb-3">Los boletos de reservas son licencias revocables y se consideran no reembolsables.</p>
                                    <ul class="list-disc list-inside space-y-2 text-gray-700">
                                        <li>No se admiten cambios ni devoluciones, excepto en caso de:
                                            <ul class="list-circle list-inside ml-6 mt-2 space-y-1">
                                                <li>Suspensión o cancelación del evento.</li>
                                                <li>Reprogramación del evento que imposibilite la asistencia del comprador.</li>
                                            </ul>
                                        </li>
                                        <li>En tales casos, se devolverá el valor nominal del boleto, excluyendo cargos por servicio.</li>
                                    </ul>
                                </section>

                                <section>
                                    <h3 class="text-xl font-semibold text-gray-800 mb-4">5. Acceso</h3>
                                    <ul class="list-disc list-inside space-y-2 text-gray-700">
                                        <li>El ingreso y salida al SPORT BAR está sujeto a controles de seguridad.</li>
                                        <li>Las reservas deben respetar las normas del BAR.</li>
                                        <li>Está prohibido el ingreso con objetos peligrosos, sustancias ilegales o bebidas alcohólicas del exterior.</li>
                                        <li>Está prohibida la salida de envases del bar, y el consumo de tabaco en el área.</li>
                                        <li>Los cambios y ajustes de mesas deben consultarse con el encargado de reservas.</li>
                                        <li>Comportamientos violentos o irrespetuosos pueden dar lugar a la expulsión del estadio sin derecho a reembolso.</li>
                                    </ul>
                                </section>

                                <section>
                                    <h3 class="text-xl font-semibold text-gray-800 mb-4">6. Derechos de Imagen</h3>
                                    <ul class="list-disc list-inside space-y-2 text-gray-700">
                                        <li>Al asistir al SPORT BAR, el asistente autoriza el uso de su imagen para fines promocionales o de difusión, sin compensación adicional.</li>
                                    </ul>
                                </section>

                                <section>
                                    <h3 class="text-xl font-semibold text-gray-800 mb-4">7. Responsabilidad</h3>
                                    <ul class="list-disc list-inside space-y-2 text-gray-700">
                                        <li>La organización no se hace responsable por pérdidas, robos o daños ocurridos dentro del bar, excepto en los casos previstos por la ley.</li>
                                        <li>El cliente asume los riesgos inherentes a asistir a un evento deportivo.</li>
                                    </ul>
                                </section>

                                <section>
                                    <h3 class="text-xl font-semibold text-gray-800 mb-4">8. Eventos Reprogramados</h3>
                                    <ul class="list-disc list-inside space-y-2 text-gray-700">
                                        <li>En caso de reprogramación por razones climáticas u otras causas de fuerza mayor, el boleto será válido para la nueva fecha. No se garantiza reembolso en estos casos si el evento sigue en pie.</li>
                                        <li>La organización se reserva el derecho de modificar estos términos y condiciones en cualquier momento. Las versiones actualizadas se publicarán en los canales oficiales.</li>
                                    </ul>
                                </section>
                            </div>

                            <div class="mt-12 pt-8 border-t border-gray-200">
                                <p class="text-sm text-gray-500 text-center">
                                    Última actualización: {{ date('d/m/Y') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</x-app-layout>


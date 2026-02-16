<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Configuración de Reservas
    |--------------------------------------------------------------------------
    |
    | Aquí puedes configurar todos los valores relacionados con el sistema
    | de reservas, incluyendo precios base, costos de boletos, etc.
    |
    */

    /*
    |--------------------------------------------------------------------------
    | Costo Base del Boleto
    |--------------------------------------------------------------------------
    |
    | Este valor representa el costo base o mínimo por boleto que se usa
    | para calcular el consumo incluido en las reservas.
    | Se resta del precio total del área para obtener el consumo incluido.
    |
    */
    'base_ticket_cost' => 0,

    /*
    |--------------------------------------------------------------------------
    | Configuración de Capacidades
    |--------------------------------------------------------------------------
    |
    | Configuraciones relacionadas con las capacidades de las áreas
    |
    */
    'min_people_per_reservation' => 4,

    /*
    |--------------------------------------------------------------------------
    | Configuración de Tiempos
    |--------------------------------------------------------------------------
    |
    | Configuraciones relacionadas con los tiempos de las reservas
    |
    */
    'reservation_expiry_hours' => 1, // Tiempo en horas para que expire una reserva no pagada

];

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Nueva Reserva - Charros Brew Bar</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />
</head>

<body style="font-family: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif; background-color: #f1f5f9; margin: 0; padding: 20px 10px;">
  <div style="max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 20px; box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3); overflow: hidden;">

    <!-- Header -->
    <div style="background: #1e3a8a; padding: 40px 32px; text-align: center; position: relative;">
      <!-- Logo -->
      <div style="margin-bottom: 24px;">
        <img src="{{ asset('assets/img/sportbarlogo.png') }}" alt="Charros Brew Bar" style="max-width: 180px; height: auto; display: inline-block;" />
      </div>
      <h1 style="font-size: 32px; font-weight: 700; color: #ffffff; margin: 0; text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">Nueva Reserva</h1>
      <p style="color: #e0e7ff; font-size: 16px; margin: 8px 0 0; font-weight: 400;">Notificación de reserva confirmada</p>
    </div>

    <!-- Content -->
    <div style="padding: 40px 32px;">
      <p style="color: #1e293b; font-size: 18px; margin: 0 0 8px; font-weight: 500;">
        ¡Hola! 👋
      </p>
      <p style="color: #64748b; font-size: 15px; line-height: 1.6; margin: 0 0 32px;">
        Esta es una notificación automática para informarte que se ha realizado una nueva reserva en Sport Bar con los siguientes detalles:
      </p>

      <!-- Reservation Details Card -->
      <div style="background: #f8fafc; border-radius: 16px; padding: 28px; margin-bottom: 32px; border-left: 4px solid #3b82f6;">
        <h2 style="font-size: 18px; font-weight: 700; color: #1e3a8a; margin: 0 0 20px; display: flex; align-items: center;">
          <span style="font-size: 24px; margin-right: 10px;">📋</span>
          Detalles de la Reserva
        </h2>

        <table style="width: 100%; border-collapse: collapse;">
          <tr>
            <td style="padding: 12px 0; border-bottom: 1px solid #e2e8f0;">
              <span style="color: #64748b; font-size: 14px; display: flex; align-items: center;">
                <span style="font-size: 18px; margin-right: 8px;">👤</span>
                <strong>Cliente</strong>
              </span>
            </td>
            <td style="padding: 12px 0; border-bottom: 1px solid #e2e8f0; text-align: right;">
              <span style="color: #1e293b; font-size: 15px; font-weight: 600;">
                {{ $reservation->name ? $reservation->name : 'No disponible' }}
              </span>
            </td>
          </tr>
          <tr>
            <td style="padding: 12px 0; border-bottom: 1px solid #e2e8f0;">
              <span style="color: #64748b; font-size: 14px; display: flex; align-items: center;">
                <span style="font-size: 18px; margin-right: 8px;">📅</span>
                <strong>Fecha</strong>
              </span>
            </td>
            <td style="padding: 12px 0; border-bottom: 1px solid #e2e8f0; text-align: right;">
              <span style="color: #1e293b; font-size: 15px; font-weight: 600;">
                {{ $reservation->businessDay ? $reservation->businessDay->date->format('d-m-Y') : 'No disponible' }}
              </span>
            </td>
          </tr>
          <tr>
            <td style="padding: 12px 0; border-bottom: 1px solid #e2e8f0;">
              <span style="color: #64748b; font-size: 14px; display: flex; align-items: center;">
                <span style="font-size: 18px; margin-right: 8px;">⚾</span>
                <strong>Juego</strong>
              </span>
            </td>
            <td style="padding: 12px 0; border-bottom: 1px solid #e2e8f0; text-align: right;">
              <span style="color: #1e293b; font-size: 15px; font-weight: 600;">
                {{ $reservation->businessDay ? $reservation->businessDay->description : 'No disponible' }}
              </span>
            </td>
          </tr>
          <tr>
            <td style="padding: 12px 0; border-bottom: 1px solid #e2e8f0;">
              <span style="color: #64748b; font-size: 14px; display: flex; align-items: center;">
                <span style="font-size: 18px; margin-right: 8px;">📍</span>
                <strong>Área</strong>
              </span>
            </td>
            <td style="padding: 12px 0; border-bottom: 1px solid #e2e8f0; text-align: right;">
              <span style="color: #1e293b; font-size: 15px; font-weight: 600;">
                {{ $reservation->area ? $reservation->area->name : 'No disponible' }}
              </span>
            </td>
          </tr>
          <tr>
            <td style="padding: 12px 0; border-bottom: 1px solid #e2e8f0;">
              <span style="color: #64748b; font-size: 14px; display: flex; align-items: center;">
                <span style="font-size: 18px; margin-right: 8px;">🎫</span>
                <strong>Boletos</strong>
              </span>
            </td>
            <td style="padding: 12px 0; border-bottom: 1px solid #e2e8f0; text-align: right;">
              <span style="color: #1e293b; font-size: 15px; font-weight: 600;">
                {{ $reservation->people_count ? $reservation->people_count : 'No disponible' }}
              </span>
            </td>
          </tr>
          <tr>
            <td style="padding: 12px 0; border-bottom: 1px solid #e2e8f0;">
              <span style="color: #64748b; font-size: 14px; display: flex; align-items: center;">
                <span style="font-size: 18px; margin-right: 8px;">💰</span>
                <strong>Costo Total</strong>
              </span>
            </td>
            <td style="padding: 12px 0; border-bottom: 1px solid #e2e8f0; text-align: right;">
              <span style="color: #10b981; font-size: 18px; font-weight: 700;">
                ${{ number_format($reservation->total_cost, 2) ? number_format($reservation->total_cost, 2) : 'No disponible' }}
              </span>
            </td>
          </tr>
          <tr>
            <td style="padding: 12px 0; border-bottom: 1px solid #e2e8f0;">
              <span style="color: #64748b; font-size: 14px; display: flex; align-items: center;">
                <span style="font-size: 18px; margin-right: 8px;">🍴</span>
                <strong>Consumo incluido</strong>
              </span>
            </td>
            <td style="padding: 12px 0; border-bottom: 1px solid #e2e8f0; text-align: right;">
              <span style="color: #1e293b; font-size: 15px; font-weight: 600;">
                ${{ number_format(($reservation->total_cost - ($reservation->people_count * config('reservations.base_ticket_cost'))), 2) ? number_format(($reservation->total_cost - ($reservation->people_count * config('reservations.base_ticket_cost'))), 2) : 'No disponible' }}
              </span>
            </td>
          </tr>
          <tr>
            <td style="padding: 12px 0; border-bottom: 1px solid #e2e8f0;">
              <span style="color: #64748b; font-size: 14px; display: flex; align-items: center;">
                <span style="font-size: 18px; margin-right: 8px;">📧</span>
                <strong>Email</strong>
              </span>
            </td>
            <td style="padding: 12px 0; border-bottom: 1px solid #e2e8f0; text-align: right;">
              <a href="mailto:{{ $reservation->email }}" style="color: #3b82f6; font-size: 15px; font-weight: 600; text-decoration: none;">
                {{ $reservation->email }}
              </a>
            </td>
          </tr>
          <tr>
            <td style="padding: 12px 0; border-bottom: 1px solid #e2e8f0;">
              <span style="color: #64748b; font-size: 14px; display: flex; align-items: center;">
                <span style="font-size: 18px; margin-right: 8px;">📱</span>
                <strong>Teléfono</strong>
              </span>
            </td>
            <td style="padding: 12px 0; border-bottom: 1px solid #e2e8f0; text-align: right;">
              <span style="color: #1e293b; font-size: 15px; font-weight: 600;">
                {{ $reservation->phone ? $reservation->phone : 'No disponible' }}
              </span>
            </td>
          </tr>
          <tr>
            <td style="padding: 12px 0;">
              <span style="color: #64748b; font-size: 14px; display: flex; align-items: center;">
                <span style="font-size: 18px; margin-right: 8px;">✅</span>
                <strong>Estado</strong>
              </span>
            </td>
            <td style="padding: 12px 0; text-align: right;">
              <span style="background-color: #10b981; color: #ffffff; padding: 6px 16px; border-radius: 20px; font-size: 13px; font-weight: 600; display: inline-block;">
                {{ $reservation->status ? $reservation->status : 'No disponible' }}
              </span>
            </td>
          </tr>
        </table>
      </div>

      <!-- Payment Info -->
      <div style="background-color: #ecfdf5; border-left: 4px solid #10b981; border-radius: 12px; padding: 20px; margin-bottom: 32px;">
        <p style="color: #065f46; font-size: 14px; margin: 0; line-height: 1.6; display: flex; align-items: flex-start;">
          <span style="font-size: 20px; margin-right: 10px; flex-shrink: 0;">💳</span>
          <span><strong style="font-weight: 600;">Pago confirmado:</strong> Los boletos ya han sido liquidados mediante el sitio web.</span>
        </p>
      </div>

      <!-- CTA Button -->
      <div style="text-align: center; margin-bottom: 32px;">
        <a href="{{ url('/') }}" style="background: #2563eb; color: #ffffff; text-decoration: none; padding: 16px 40px; border-radius: 50px; font-weight: 600; font-size: 16px; display: inline-block; box-shadow: 0 10px 25px rgba(59, 130, 246, 0.3);">
          🏠 Ir al sitio
        </a>
      </div>
    </div>

    <!-- Footer -->
    <div style="background-color: #f8fafc; padding: 32px; border-top: 1px solid #e2e8f0;">
      <div style="text-align: center; margin-bottom: 20px;">
        <p style="color: #475569; font-size: 14px; margin: 0 0 12px; font-weight: 500;">
          ¿Necesitas soporte técnico?
        </p>
        <p style="color: #64748b; font-size: 13px; margin: 0;">
          📧 Contacto:
          <a style="text-decoration: none; color: #3b82f6; font-weight: 600;" href="mailto:alvaro.casillas@charrosjalisco.com">alvaro.casillas@charrosjalisco.com</a>
        </p>
        <p style="color: #64748b; font-size: 13px; margin: 8px 0 0;">
          🆘 Soporte:
          <a style="text-decoration: none; color: #3b82f6; font-weight: 600;" href="mailto:support@charrosjalisco.atlassian.net">support@charrosjalisco.atlassian.net</a>
        </p>
      </div>

      <div style="border-top: 1px solid #e2e8f0; padding-top: 20px; text-align: center;">
        <p style="color: #94a3b8; font-size: 12px; margin: 0 0 8px; font-style: italic;">
          Este es un correo generado automáticamente. Por favor, no respondas a este mensaje.
        </p>
        <p style="color: #64748b; font-size: 12px; margin: 0;">
          <span style="color: #94a3b8;">© {{ date('Y') }} Charros Brew Bar</span>
        </p>
      </div>
    </div>
  </div>
</body>

</html>

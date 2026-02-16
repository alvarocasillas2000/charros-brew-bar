<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Recordatorio de Reserva - Charros Sport Bar</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />
</head>
<body style="font-family: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif; background-color: #f1f5f9; margin: 0; padding: 20px 10px;">
  <div style="max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 20px; box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3); overflow: hidden;">
    
    <!-- Header -->
    <div style="background: #1e3a8a; padding: 40px 32px; text-align: center; position: relative;">
      <!-- Logo -->
      <div style="margin-bottom: 24px;">
        <img src="{{ asset('assets/img/sportbarlogo.png') }}" alt="Charros Sport Bar" style="max-width: 180px; height: auto; display: inline-block;" />
      </div>
      <h1 style="font-size: 32px; font-weight: 700; color: #ffffff; margin: 0; text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">Recordatorio de Reserva</h1>
      <p style="color: #e0e7ff; font-size: 16px; margin: 8px 0 0; font-weight: 400;">Detalles de tu reservación</p>
    </div>

    <!-- Content -->
    <div style="padding: 40px 32px;">
      <p style="color: #1e293b; font-size: 18px; margin: 0 0 8px; font-weight: 500;">
        Hola <span style="color: #1e3a8a; font-weight: 700;">{{ $reservation->name }}</span> 👋
      </p>
      <p style="color: #64748b; font-size: 15px; line-height: 1.6; margin: 0 0 32px;">
        Te recordamos los detalles de tu reservación en Charros Sport Bar:
      </p>

      <!-- Reservation Details Card -->
      <div style="background: #f8fafc; border-radius: 16px; padding: 28px; margin-bottom: 32px; border-left: 4px solid #3b82f6;">
        <h2 style="font-size: 18px; font-weight: 700; color: #1e3a8a; margin: 0 0 20px; display: flex; align-items: center;">
          <span style="font-size: 24px; margin-right: 10px;">📋</span>
          Detalles de tu Reserva
        </h2>
        
        <table style="width: 100%; border-collapse: collapse;">
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
                <span style="font-size: 18px; margin-right: 8px;">👥</span>
                <strong>Personas</strong>
              </span>
            </td>
            <td style="padding: 12px 0; border-bottom: 1px solid #e2e8f0; text-align: right;">
              <span style="color: #1e293b; font-size: 15px; font-weight: 600;">
                {{ $reservation->people_count }}
              </span>
            </td>
          </tr>
          <tr>
            <td style="padding: 16px 0 0;">
              <span style="color: #1e3a8a; font-size: 16px; font-weight: 700; display: flex; align-items: center;">
                <span style="font-size: 20px; margin-right: 8px;">💰</span>
                Costo Total
              </span>
            </td>
            <td style="padding: 16px 0 0; text-align: right;">
              <span style="color: #10b981; font-size: 24px; font-weight: 700;">
                ${{ number_format($reservation->total_cost, 2) }}
              </span>
            </td>
          </tr>
        </table>
      </div>

      <!-- Thank You Message -->
      <div style="text-align: center; padding: 24px; background: #ecfdf5; border-radius: 12px; margin-bottom: 32px;">
        <p style="color: #065f46; font-size: 18px; font-weight: 600; margin: 0;">
          ¡Gracias por reservar con nosotros! 🙌
        </p>
        <p style="color: #047857; font-size: 14px; margin: 8px 0 0;">
          Te esperamos en Charros Sport Bar
        </p>
      </div>

      <!-- CTA Button -->
      <div style="text-align: center; margin-bottom: 32px;">
        <a href="{{ url('/') }}" style="background: #3b82f6; color: #ffffff; text-decoration: none; padding: 16px 40px; border-radius: 50px; font-weight: 600; font-size: 16px; display: inline-block; box-shadow: 0 10px 25px rgba(59, 130, 246, 0.3); transition: transform 0.2s;">
          🏠 Volver al sitio
        </a>
      </div>
    </div>

    <!-- Footer -->
    <div style="background-color: #f8fafc; padding: 32px; border-top: 1px solid #e2e8f0;">
      <div style="text-align: center; margin-bottom: 20px;">
        <p style="color: #475569; font-size: 14px; margin: 0 0 12px; font-weight: 500;">
          ¿Necesitas ayuda? Estamos aquí para ti
        </p>
        <p style="color: #64748b; font-size: 13px; margin: 0;">
          📧 Contáctanos: 
          <a style="text-decoration: none; color: #3b82f6; font-weight: 600;" href="mailto:info@charrosjalisco.com">info@charrosjalisco.com</a>
        </p>
      </div>
      
      <div style="border-top: 1px solid #e2e8f0; padding-top: 20px; text-align: center;">
        <p style="color: #94a3b8; font-size: 12px; margin: 0 0 8px; font-style: italic;">
          Este es un correo generado automáticamente. Por favor, no respondas a este mensaje.
        </p>  
        <p style="color: #64748b; font-size: 12px; margin: 0;">
          <a href="{{ route('terminos') }}" target="_blank" style="color: #3b82f6; text-decoration: none; font-weight: 500;">Términos y Condiciones</a>
          <span style="margin: 0 8px; color: #cbd5e1;">•</span>
          <span style="color: #94a3b8;">© {{ date('Y') }} Charros Sport Bar</span>
        </p>
      </div>
    </div>
  </div>
</body>
</html>

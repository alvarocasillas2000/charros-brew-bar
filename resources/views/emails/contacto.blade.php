<!-- {{-- resources/views/emails/contacto.blade.php --}} -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Nuevo Mensaje de Contacto - Charros Brew Bar</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />
</head>
<body style="font-family: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif; background-color: #f1f5f9; margin: 0; padding: 20px 10px;">
    <div style="max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 20px; box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3); overflow: hidden;">
        
        <!-- Header -->
        <div style="background: #1e3a8a; padding: 40px 32px; text-align: center; position: relative;">
            <!-- Logo -->
            <div style="margin-bottom: 24px;">
                <img src="{{ url('/assets/img/sportbarlogo.png') }}" alt="Charros Brew Bar" style="max-width: 180px; height: auto; display: inline-block;" />
            </div>
            <h1 style="font-size: 32px; font-weight: 700; color: #ffffff; margin: 0; text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">Nuevo Mensaje</h1>
            <p style="color: #e0e7ff; font-size: 16px; margin: 8px 0 0; font-weight: 400;">Formulario de contacto</p>
        </div>

        <!-- Content -->
        <div style="padding: 40px 32px;">
            <p style="color: #1e293b; font-size: 18px; margin: 0 0 32px; font-weight: 500;">
                Has recibido un nuevo mensaje desde el formulario de contacto del sitio web 📨
            </p>

            <!-- Message Details Card -->
            <div style="background: #f8fafc; border-radius: 16px; padding: 28px; margin-bottom: 32px; border-left: 4px solid #3b82f6;">
                <h2 style="font-size: 18px; font-weight: 700; color: #1e3a8a; margin: 0 0 20px; display: flex; align-items: center;">
                    <span style="font-size: 24px; margin-right: 10px;">👤</span>
                    Información del Remitente
                </h2>
                
                <table style="width: 100%; border-collapse: collapse;">
                    <tr>
                        <td style="padding: 12px 0; border-bottom: 1px solid #e2e8f0;">
                            <span style="color: #64748b; font-size: 14px; display: flex; align-items: center;">
                                <span style="font-size: 18px; margin-right: 8px;">🏷️</span>
                                <strong>Nombre</strong>
                            </span>
                        </td>
                        <td style="padding: 12px 0; border-bottom: 1px solid #e2e8f0; text-align: right;">
                            <span style="color: #1e293b; font-size: 15px; font-weight: 600;">
                                {{ $datos['nombre'] }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 12px 0; border-bottom: 1px solid #e2e8f0;">
                            <span style="color: #64748b; font-size: 14px; display: flex; align-items: center;">
                                <span style="font-size: 18px; margin-right: 8px;">📧</span>
                                <strong>Correo</strong>
                            </span>
                        </td>
                        <td style="padding: 12px 0; border-bottom: 1px solid #e2e8f0; text-align: right;">
                            <a href="mailto:{{ $datos['correo'] }}" style="color: #3b82f6; font-size: 15px; font-weight: 600; text-decoration: none;">
                                {{ $datos['correo'] }}
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
                                {{ $datos['tel'] }}
                            </span>
                        </td>
                    </tr>
                </table>
            </div>

            <!-- Message Content -->
            <div style="background-color: #fefce8; border-left: 4px solid #eab308; border-radius: 12px; padding: 24px; margin-bottom: 32px;">
                <h3 style="color: #713f12; font-size: 16px; font-weight: 700; margin: 0 0 12px; display: flex; align-items: center;">
                    <span style="font-size: 20px; margin-right: 10px;">💭</span>
                    Mensaje
                </h3>
                <p style="color: #854d0e; font-size: 15px; line-height: 1.7; margin: 0; white-space: pre-wrap; word-wrap: break-word;">{{ $datos['mensaje'] }}</p>
            </div>

            <!-- Action Info -->
            <div style="background-color: #eff6ff; border-left: 4px solid #3b82f6; border-radius: 12px; padding: 20px; margin-bottom: 32px;">
                <p style="color: #1e40af; font-size: 14px; margin: 0; line-height: 1.6; display: flex; align-items: flex-start;">
                    <span style="font-size: 20px; margin-right: 10px; flex-shrink: 0;">ℹ️</span>
                    <span>Por favor, responde directamente al correo del remitente haciendo clic en su dirección de correo electrónico.</span>
                </p>
            </div>

            <!-- CTA Button -->
            <div style="text-align: center; margin-bottom: 32px;">
                <a href="{{ url('/') }}" style="background: #3b82f6; color: #ffffff; text-decoration: none; padding: 16px 40px; border-radius: 50px; font-weight: 600; font-size: 16px; display: inline-block; box-shadow: 0 10px 25px rgba(59, 130, 246, 0.3);">
                    🏠 Volver al sitio
                </a>
            </div>
        </div>

        <!-- Footer -->
        <div style="background-color: #f8fafc; padding: 32px; border-top: 1px solid #e2e8f0;">
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


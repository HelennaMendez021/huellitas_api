<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bienvenido a Huellitas</title>
</head>

<body
    style="
      background-color: #59867b;
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
    ">
    <table
        role="presentation"
        width="100%"
        cellspacing="0"
        cellpadding="0"
        border="0">
        <tr>
            <td align="center" style="padding: 20px 0">
                <table
                    role="presentation"
                    width="600px"
                    cellspacing="0"
                    cellpadding="0"
                    border="0"
                    style="
              background: #ffffff;
              padding: 20px;
              border-radius: 10px;
              box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            ">
                    <!-- Encabezado -->
                    <tr>
                        <td align="center" style="padding: 20px 0">
                            <img
                                src="https://volkalabs.ddns.net/api/img/LogoHuella.png"
                                width="150"
                                alt="Huellitas Logo" />
                            <h1 style="color: #333">Hola, {{ $name }} 👋</h1>
                        </td>
                    </tr>
                    <!-- Mensaje de bienvenida -->
                    <tr>
                        <td style="padding: 0 20px; text-align: center">
                            <p style="color: #555; font-size: 16px">
                                Bienvenido a <strong>Huellitas Veterinaria</strong>. Tu cuenta
                                ha sido creada con éxito.
                            </p>
                            <p style="color: #555; font-size: 16px">
                                Antes de continuar, por favor confirma tu correo electrónico:
                            </p>
                        </td>
                    </tr>
                    <!-- Botón de Confirmación -->
                    <tr>
                        <td style="padding: 20px; text-align: center">
                            <a
                                href="{{ $url_confirmacion }}"
                                style="
                    background-color: #59867b;
                    color: white;
                    text-decoration: none;
                    padding: 12px 24px;
                    border-radius: 5px;
                    font-size: 16px;
                  ">
                                Confirmar mi correo
                            </a>
                        </td>
                    </tr>
                    <!-- Credenciales -->
                    <tr>
                        <td
                            style="
                  padding: 10px 20px;
                  text-align: center;
                  background: #f8f9fa;
                  border-radius: 5px;
                ">
                            <p style="color: #333; font-size: 16px">
                                <strong>Usuario de Acceso:</strong> {{ $email }}
                            </p>
                        </td>
                    </tr>
                    <!-- Mensaje final -->
                    <tr>
                        <td style="padding: 20px; text-align: center">
                            <p style="color: #555; font-size: 14px">
                                Después de confirmar tu correo, podrás acceder a nuestro sitio
                                web.
                            </p>
                            <p>
                                <a href="https://volkalabs.ddns.net/">Ir al sitio</a>
                            </p>
                        </td>
                    </tr>
                    <!-- Pie de página -->
                    <tr>
                        <td
                            style="
                  text-align: center;
                  padding: 15px;
                  font-size: 12px;
                  color: #999;
                ">
                            &copy; 2025 Huellitas Veterinaria. Todos los derechos
                            reservados.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
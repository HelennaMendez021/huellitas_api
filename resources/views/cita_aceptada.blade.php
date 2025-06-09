<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Solicitud de Cita Recibida</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .header {
            background-color: #59867b;
            color: #ffffff;
            padding: 20px;
            text-align: center;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .content {
            padding: 30px;
            text-align: center;
        }

        .content h2 {
            margin-bottom: 20px;
        }

        .content p {
            font-size: 18px;
            line-height: 1.6;
            color: #555;
        }

        .footer {
            background-color: #f4f4f9;
            padding: 15px;
            text-align: center;
            color: #888;
            font-size: 14px;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Solicitud de cita</h1>
        </div>
        <div class="content">
            <h2>Hola, {{ $name }} 👋</h2>
            <p>
                Hemos aprobado tu solicitud para agendar una cita para
                <strong>{{ $petName }}</strong> para el servicio
                <strong>{{ $service }}</strong>.
            </p>
            <p>Fecha solicitada: <strong>{{ $appointmentDate }}</strong></p>
            <p>Tu cita a sido agendada, te esperamos.</p>
        </div>
        <div class="footer">
            <p>Gracias por confiar en nosotros. 🐶🐱</p>
            <p>Huellitas Veterinaria</p>
        </div>
    </div>
</body>

</html>
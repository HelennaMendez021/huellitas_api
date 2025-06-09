<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Confirmación de cuenta</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f4f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 400px;
        }

        h1 {
            color: #4caf50;
        }

        p {
            color: #555;
        }

        a.btn {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 25px;
            background: #4caf50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }

        a.btn:hover {
            background: #45a049;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>¡Cuenta confirmada!</h1>
        <p>Gracias por verificar tu correo. Ahora puedes acceder a tu cuenta.</p>
        <a href="{{ url('/') }}" class="btn">Ir al sitio</a>
    </div>
</body>

</html>
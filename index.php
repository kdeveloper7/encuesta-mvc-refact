<!-- index.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bienvenido a la Encuesta</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <style>
        /* Estilos básicos para la página de inicio */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f3f4f6;
            font-family: Arial, sans-serif;
        }

        .container {
            text-align: center;
            background-color: #fff;
            padding: 2em;
            border-radius: 8px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 2em;
            color: #333;
            margin-bottom: 1em;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px;
            color: #fff;
            background-color: #4CAF50;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            font-size: 1em;
        }

        .btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Bienvenido a la Encuesta</h1>
        <a href="views/auth/login.php" class="btn">Ingresar como Administrador</a>
        <a href="views/auth/login_usuario.php" class="btn">Ingresar como Usuario</a>
    </div>
</body>
</html>

<?php include '../includes/header.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="../statics/css/styles.css">
    <style>
        body {
            margin: 0;
            background-color: #f3f4f6; /* Color de fondo suave */
            font-family: Arial, sans-serif;
            padding: 20px; /* Espaciado alrededor */
        }

        .form-container {
            width: 90%; /* 90% del ancho total */
            max-width: 400px; /* Máximo de 400px */
            margin: 0 auto; /* Centrado horizontal */
            background-color: #fff;
            padding: 2em;
            border-radius: 8px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            text-align: left; /* Alineación a la izquierda */
        }

        .form-container h1 {
            font-size: 1.8em;
            color: #333;
            margin-bottom: 1em;
            text-align: center; /* Centrar el título */
        }

        .form-container label {
            margin-top: 10px;
            font-size: 0.9em;
            color: #555;
            display: block; /* Asegurarnos que cada label esté en una línea nueva */
            margin-bottom: 5px; /* Espacio entre label y su input */
        }

        .form-container input[type="email"],
        .form-container input[type="password"] {
            width: 100%; /* 100% del contenedor */
            padding: 10px;
            margin-bottom: 15px; /* Espacio inferior */
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box; /* Asegura que el padding no afecte el tamaño total */
        }

        .form-container input[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #4CAF50; /* Color del botón */
            border: none;
            color: white;
            font-size: 1em;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s; /* Efecto de transición */
        }

        .form-container input[type="submit"]:hover {
            background-color: #45a049; /* Color al pasar el mouse */
        }

        .form-container .error-message {
            color: red; /* Color rojo para mensajes de error */
            text-align: center; /* Centrar mensaje de error */
            margin-top: 10px; /* Espaciado arriba */
        }

        .form-container a {
            display: block;
            text-align: center;
            margin-top: 15px;
            text-decoration: none;
            color: #4CAF50; /* Color del enlace */
        }

        .form-container a:hover {
            text-decoration: underline; /* Subrayar al pasar el mouse */
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Inicio de Sesión</h1>
        <form method="post" action="../../controllers/AuthController.php">
            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>

            <input type="submit" value="Iniciar Sesión">
        </form>
        
        <!-- Mostrar mensaje de error si existe -->
        <?php if (isset($_SESSION['login_error'])): ?>
            <p class="error-message"><?php echo $_SESSION['login_error']; ?></p>
            <?php unset($_SESSION['login_error']); // Limpia el mensaje de error después de mostrarlo ?>
        <?php endif; ?>
        
        <a href="../auth/register.php">¿No tienes una cuenta? Registrarse</a>
    </div>
</body>
</html>

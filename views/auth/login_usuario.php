

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio de Sesión de Usuario</title>
    <link rel="stylesheet" href="../../assets/css/styles.css">
    <style>
        /* Estilos para un login moderno */
        body {
          
            height: 100vh;
            margin: 0;
            background-color: #f3f4f6;
            font-family: Arial, sans-serif;
        }

        .login-container {
            width: 100%;
            max-width: 400px;
            padding: 2em;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin: 5rem auto;
        }

        .login-container h1 {
            margin-bottom: 1em;
            color: #333;
            font-size: 1.8em;
        }

        .login-container label {
            display: block;
            text-align: left;
            color: #666;
            margin-bottom: 0.5em;
        }

        .login-container input[type="email"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 1em;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .login-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            color: #fff;
            background-color: #4CAF50;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1em;
        }

        .login-container input[type="submit"]:hover {
            background-color: #45a049;
        }

        .login-container .error-message {
            color: red;
            margin-top: 1em;
        }

        .login-container .register-link {
            display: block;
            margin-top: 1.5em;
            color: #007bff;
            text-decoration: none;
        }

        .login-container .register-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Inicio de Sesión</h1>
        <form method="post" action="../../controllers/UsuarioController.php">
            <input type="hidden" name="action" value="login">
            
            <label for="correo">Correo:</label>
            <input type="email" id="correo" name="correo" required>
            
            <label for="contraseña">Contraseña:</label>
            <input type="password" id="contraseña" name="contraseña" required>
            
            <input type="submit" value="Iniciar Sesión">
        </form>
        
        <?php
        session_start();
        if (isset($_SESSION['login_error'])) {
            echo "<p class='error-message'>{$_SESSION['login_error']}</p>";
            unset($_SESSION['login_error']); // Elimina el mensaje después de mostrarlo
        }
        ?>

        <a href="register.php" class="register-link">Registrarse</a>
    </div>

    <script src="../static/js/script.js"></script>
</body>
</html>

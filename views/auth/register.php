<?php include '../includes/header.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="./register.css">
    
</head>
<body>

    <div class="form-container">
    <h1>Registro de Usuario</h1>

<?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
    <p class="success-message">¡Registro exitoso! Ahora puedes iniciar sesión.</p>
<?php endif; ?>

<form method="post" action="../../controllers/UsuarioController.php" onsubmit="return validarFormularioRegistro()">
    <input type="hidden" name="action" value="register">

            <div class="form-grid">
                <div>
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" required>
                </div>

                <div>
                    <label for="correo">Correo:</label>
                    <input type="email" id="correo" name="correo" required>
                </div>

                <div>
                    <label for="provincia">Provincia:</label>
                    <input type="text" id="provincia" name="provincia">
                </div>

                <div>
                    <label for="ciudad">Ciudad:</label>
                    <input type="text" id="ciudad" name="ciudad">
                </div>

                <div>
                    <label for="telefono">Teléfono:</label>
                    <input type="text" id="telefono" name="telefono">
                </div>

                <div>
                    <label for="dni">DNI:</label>
                    <input type="text" id="dni" name="dni" required>
                </div>

                <div>
                    <label for="contraseña">Contraseña:</label>
                    <input type="password" id="contraseña" name="contraseña" required>
                </div>
            </div>

            <input type="submit" value="Registrarse">
        </form>
        <a href="login_usuario.php">¿Ya tienes una cuenta? Iniciar Sesión</a>
    </div>

    <script src="../static/js/script.js"></script>
</body>
</html>

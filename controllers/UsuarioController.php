

<?php

include_once '../models/Usuario.php';
include_once '../core/db.php';

$conn = connectDB();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST['action'];
    
    if ($action == "register") {
        // Registro del usuario
        Usuario::create($conn, $_POST['nombre'], $_POST['correo'], $_POST['provincia'], $_POST['ciudad'], $_POST['telefono'], $_POST['dni'], $_POST['contraseña']);
        header("Location: ../views/auth/register.php?success=1");
        exit();
    
    } elseif ($action == "login") {
        // Intento de inicio de sesión
        $usuario = Usuario::find_by_email($conn, $_POST['correo']);
        
        if ($usuario && password_verify($_POST['contraseña'], $usuario['contraseña'])) {
            session_start();
            $_SESSION['user_loggedin'] = true;
            $_SESSION['user_id'] = $usuario['id']; // Usar $usuario['id'] para almacenar el id del usuario
            $_SESSION['username'] = $usuario['nombre']; // Almacenar el nombre de usuario en la sesión
            
            header("Location: ../views/encuesta/index.php");
            exit();
        
        } else {
            $error = "Correo o contraseña incorrectos.";
            include '../views/auth/login_usuario.php';
        }
    }


}


?>
<?php
include_once '../core/session.php';
include_once '../core/db.php';

$conn = connectDB();
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Verifica las credenciales de administrador
    if ($email == "admin@admin.com" && $password == "password") {
        $_SESSION['loggedin'] = true;
        $_SESSION['user_id'] = 1; // ID del administrador
        $_SESSION['username'] = "admin";
        
        header("Location: ../views/public/admin.php"); // Redirige al panel de administración
        exit();
    } else {
        // Almacena el mensaje de error en la sesión y redirige a login.php
        $_SESSION['login_error'] = "Correo electrónico o contraseña incorrectos.";
        
        header("Location: ../views/auth/login.php"); // Redirige de nuevo al login
        exit();
    }
} 
?>

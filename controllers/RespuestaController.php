<?php
include_once '../core/db.php';
include_once '../models/Respuesta.php';

$conn = connectDB();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST['action'];
    if ($action == "delete") {
        $id = $_POST['id'];
        Respuesta::delete($conn, $id);
        // Redirigir a la misma página del controlador en lugar de la vista
        // header("Location: " . $_SERVER['PHP_SELF']); // Mantener en el mismo controlador
        // exit();
    }
}

$respuestas = Respuesta::all($conn);
include '../views/respuestas/index.php';
?>

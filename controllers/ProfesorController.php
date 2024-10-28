<?php
include_once '../models/Profesor.php';
include_once '../core/db.php';

$conn = connectDB();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST['action'];
    if ($action == "add") {
        Profesor::create($conn, $_POST['nombre']);
    } elseif ($action == "edit") {
        Profesor::update($conn, $_POST['id'], $_POST['nombre']);
    } elseif ($action == "delete") {
        $id = $_POST['id'];

        // Primero eliminamos todas las respuestas asociadas a este profesor
        $stmt = $conn->prepare("DELETE FROM respuestas WHERE profesor_id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        // Ahora eliminamos al profesor
        Profesor::delete($conn, $id);
    }
}

$profesores = Profesor::all($conn);
include '../views/profesores/index.php';

    
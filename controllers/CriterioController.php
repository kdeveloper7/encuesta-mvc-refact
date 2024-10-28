<?php
include_once '../models/Criterio.php';
include_once '../core/db.php';

$conn = connectDB();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST['action'];
    if ($action == "add") {
        Criterio::create($conn, $_POST['descripcion']);
    } elseif ($action == "edit") {
        Criterio::update($conn, $_POST['id'], $_POST['descripcion']);
    } elseif ($action == "delete") {
        Criterio::delete($conn, $_POST['id']);
    }
}

$criterios = Criterio::all($conn);
include '../views/criterios/index.php';
?>

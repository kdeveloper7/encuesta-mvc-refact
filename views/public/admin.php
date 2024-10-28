<?php
include '../../core/session.php';
include '../includes/header.php';

check_session();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Administración</title>
    <link rel="stylesheet" href="../statics/css/styles.css">
    <style>
        body {
            margin: 0;
            background-color: #f3f4f6; /* Color de fondo suave */
            font-family: Arial, sans-serif;
            padding: 20px; /* Espaciado alrededor */
        }

        h1 {
            text-align: center; /* Centrar el título */
            color: #333; /* Color del título */
            margin-bottom: 20px; /* Espaciado inferior */
        }

        nav {
            display: grid; /* Usar grid para el layout */
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); /* Grid responsive */
            gap: 20px; /* Espaciado entre tarjetas */
            padding: 0 20px; /* Espaciado horizontal */
            justify-items: center; /* Centrar tarjetas en cada celda */
        }

        /* Estilos de las tarjetas */
        .card {
            display: flex; /* Usar flex para el contenido */
            flex-direction: column; /* Colocar elementos en columna */
            justify-content: center; /* Centrar verticalmente */
            align-items: center; /* Centrar horizontalmente */
            padding: 20px; /* Espaciado interno */
            border-radius: 8px; /* Bordes redondeados */
            background-color: #fff; /* Color de fondo de la tarjeta */
            border: 2px solid #4CAF50; /* Borde sólido */
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2); /* Sombra para efecto 3D */
            transition: transform 0.3s, box-shadow 0.3s; /* Efecto de transición */
            height: 150px; /* Altura fija para las tarjetas */
            width: 100%; /* Asegurar que las tarjetas ocupen el ancho completo */
            text-align: center; /* Centrar texto dentro de las tarjetas */
            max-width: 250px; /* Ancho máximo para las tarjetas */
        }

        .card:hover {
            transform: translateY(-5px); /* Levantar la tarjeta al pasar el mouse */
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.3); /* Aumentar sombra al pasar el mouse */
        }

        .card h2 {
            margin: 0; /* Eliminar márgenes de los títulos dentro de las tarjetas */
            font-size: 1.2em; /* Tamaño de fuente del título */
            color: #4CAF50; /* Color del título */
        }
    </style>
</head>
<body>
    <!-- Incluir la cabecera -->
    

    <h1>Panel de Administración</h1>
    <nav>
        <div class="card">
            <a href="../../controllers/ProfesorController.php">
                <h2>Gestionar Profesores</h2>
            </a>
        </div>
        <div class="card">
            <a href="../../controllers/CriterioController.php">
                <h2>Gestionar Criterios</h2>
            </a>
        </div>
        <div class="card">
            <a href="../../controllers/RespuestaController.php">
                <h2>Ver Resultados</h2>
            </a>
        </div>
     

        <div class="card">
            <a href="../respuestas/recomendations.php">
                <h2>Recomendaciones</h2>
            </a>
        </div>

        <div class="card">
            <a href="../respuestas/recomendations_tree.php">
                <h2>Recomendaciones árbol de decisión</h2>
            </a>
        </div>
    </nav>
</body>
</html>

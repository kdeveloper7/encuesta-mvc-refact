<?php
function getRecommendations() {
    $url = 'http://localhost:5000/recommendations'; // Asegúrate de que esta URL apunte a tu API

    // Inicializar cURL
    $ch = curl_init($url);

    // Configuración de cURL
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Ejecutar la solicitud
    $response = curl_exec($ch);
    curl_close($ch);

    // Convertir la respuesta JSON a un array PHP
    return json_decode($response, true);
}

$mejores_profesores = getRecommendations();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mejores Profesores</title>
    <link rel="stylesheet" href="../assets/css/styles.css"> <!-- Asegúrate de que el path sea correcto -->
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 20px;
}

h1 {
    color: #333;
}

table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    border: 1px solid #ccc;
    padding: 10px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}

tr:nth-child(even) {
    background-color: #f9f9f9;
}

a {
            display: inline-block;
            margin: 20px 0;
            text-decoration: none;
            color: white;
            background-color: #4CAF50; /* Color de fondo del botón */
            padding: 10px 20px;
            border-radius: 5px; /* Bordes redondeados */
            text-align: center;
        }

        a:hover {
            background-color: #45a049; /* Color al pasar el mouse */
        }

    </style>
</head>
<body>

<a href="../public/admin.php">Volver al Panel de Administración</a>

    <h1>Mejores Profesores</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Puntuación Promedio</th>
        </tr>
        <?php foreach ($mejores_profesores as $profesor): ?>
            <tr>
                <td><?= htmlspecialchars($profesor['profesor_id']) ?></td>
                <td><?= htmlspecialchars($profesor['profesor']) ?></td>
                <td><?= htmlspecialchars($profesor['puntuacion']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    
</body>
</html>

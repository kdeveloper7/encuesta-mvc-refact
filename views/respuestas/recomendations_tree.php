<?php
function connectAPI() {
    $apiUrl = "http://localhost:5000/recommendations_tree"; // Endpoint correcto de la API Flask

    // Inicializar cURL para hacer la solicitud
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    curl_close($ch);

    // Decodificar la respuesta JSON
    return json_decode($response, true);
}

// Llamar a la API y obtener los datos
$predictions = connectAPI();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Predicciones de Profesores</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 20px;
        }

        .container {
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 80%;
            max-width: 900px;
        }

        h1 {
            background-color: #6c7ae0;
            color: white;
            text-align: center;
            padding: 20px;
            margin: 0;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #6c7ae0;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .no-data {
            text-align: center;
            padding: 20px;
            color: #666;
        }

        .footer {
            text-align: center;
            padding: 10px;
            background-color: #eaeaea;
            color: #333;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Predicciones de Profesores</h1>

    <table>
        <thead>
            <tr>
                <th>Profesor</th>
                <th>Puntuación</th>
                <th>Experiencia (Años)</th>
                <th>Educación (Nivel)</th>
                <th>Predicción</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($predictions)) : ?>
                <?php foreach ($predictions as $profesor) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($profesor['profesor']); ?></td>
                        <td><?php echo htmlspecialchars($profesor['puntuacion']); ?></td>
                        <td><?php echo htmlspecialchars($profesor['prediccion_experiencia']); ?></td>
                        <td><?php echo htmlspecialchars($profesor['prediccion_educacion']); ?></td>
                        <td><?php echo "Predicción exitosa"; ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="5" class="no-data">No se encontraron predicciones</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    
    <div class="footer">
        &copy; 2024 - Sistema de Predicciones de Profesores
    </div>
</div>

</body>
</html>

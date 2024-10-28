


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ver Resultados</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            margin: 0;
            background-color: #f3f4f6;
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #4CAF50;
            margin-bottom: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
            background-color: #fff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:hover {
            background-color: #f2f2f2;
        }
        .canvas-container {
            max-width: 800px;
            margin: 0 auto;
        }
        a {
            display: inline-block;
            margin: 20px 0;
            text-decoration: none;
            color: white;
            background-color: #4CAF50;
            padding: 10px 20px;
            border-radius: 5px;
            text-align: center;
        }
        a:hover {
            background-color: #45a049;
        }
        .delete-button {
            color: white;
            background-color: #e74c3c;
            padding: 5px 10px;
            border-radius: 5px;
            text-decoration: none;
        }
    </style>
</head>
<body>

<a href="../views/public/admin.php">Volver al Panel de Administración</a>
<h1>Resultados de las Encuestas</h1>

<div class="canvas-container">
    <canvas id="resultsChart"></canvas>
</div>

<table>
    <tr>
        <th>Usuario</th>
        <th>Profesor</th>
        <th>Criterio</th>
        <th>Respuesta</th>
        <th>Comentario</th>
        <th>Acciones</th>
    </tr>
    <?php
    try {
        $conn = connectDB();
        $result = $conn->query("
            SELECT respuestas.id, usuarios.nombre AS usuario, profesores.nombre AS profesor, criterios.descripcion AS criterio, respuestas.respuesta, respuestas.comentario
            FROM respuestas
            JOIN usuarios ON respuestas.usuario_id = usuarios.id
            JOIN profesores ON respuestas.profesor_id = profesores.id
            JOIN criterios ON respuestas.criterio_id = criterios.id
        ");

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$row['usuario']}</td>";
                echo "<td>{$row['profesor']}</td>";
                echo "<td>{$row['criterio']}</td>";
                echo "<td>{$row['respuesta']}</td>";
                echo "<td>{$row['comentario']}</td>";
                echo "<td>
                        <form action='../../controllers/RespuestaController.php' method='post' onsubmit='return confirm(\"¿Estás seguro de que deseas eliminar esta respuesta?\");'>
                            <input type='hidden' name='id' value='{$row['id']}'>
                            <input type='hidden' name='action' value='delete'>
                            <button type='submit' class='delete-button'>Eliminar</button>
                        </form>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No se encontraron resultados.</td></tr>";
        }

        $conn->close();
    } catch (Exception $e) {
        error_log($e->getMessage());
        echo "<tr><td colspan='6'>Error al cargar la base de datos. Por favor, inténtelo más tarde.</td></tr>";
    }
    ?>
</table>

<script>
    const ctx = document.getElementById('resultsChart').getContext('2d');
    const data = {
        labels: [],
        datasets: [{
            label: 'Puntuaciones',
            data: [],
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }]
    };

    function loadChartData() {
        const criteria = [];
        const scores = [];
        
        <?php
        $conn = connectDB();
        $result = $conn->query("
            SELECT criterios.descripcion AS criterio, AVG(respuestas.respuesta) AS average_score
            FROM respuestas
            JOIN criterios ON respuestas.criterio_id = criterios.id
            GROUP BY criterios.descripcion
        ");

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                echo "criteria.push('{$row['criterio']}');";
                echo "scores.push({$row['average_score']});";
            }
        }
        ?>

        data.labels = criteria;
        data.datasets[0].data = scores;
    }

    loadChartData();

    const resultsChart = new Chart(ctx, {
        type: 'bar',
        data: data,
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
</body>
</html>

<!-- login_usuario.php -->
<?php 
session_start(); // Siempre al inicio

// Comprueba si el usuario está logueado
if (!isset($_SESSION['user_loggedin'])) {
    // Redirigir a la página de login si no está logueado
    header("Location: login_usuario.php");
    exit();
}
include '../includes/header.php';

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Encuesta de Evaluación del Profesor</title>
    <link rel="stylesheet" href="../statics/css/styles.css">
    <style>
        body {
            margin: 0;
            background-color: #f3f4f6;
            font-family: Arial, sans-serif;
            padding: 20px; /* Espaciado alrededor */
        }

        .form-container {
            width: 90%; /* 90% del ancho total */
            max-width: 600px; /* Máximo de 600px */
            margin: 0 auto; /* Centrado horizontal */
            background-color: #fff;
            padding: 2em;
            border-radius: 8px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            text-align: left;
        }

        .form-container h1 {
            font-size: 1.8em;
            color: #333;
            margin-bottom: 1em;
            text-align: center; /* Centrar el título */
        }

        .form-container label {
            margin-top: 10px;
            font-size: 0.9em;
            color: #555;
            display: block; /* Asegurarnos que cada label esté en una línea nueva */
            margin-bottom: 5px; /* Espacio entre label y su input */
        }

        .form-container select,
        .form-container input[type="radio"],
        .form-container textarea {
            margin-top: 5px;
            margin-bottom: 15px;
            width: 100%; /* 100% del contenedor */
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-container .radio-group {
            display: flex;
            justify-content: space-between; /* Espacio entre cada opción */
            margin-bottom: 10px; /* Espacio entre grupos de radios */
        }

        .form-container input[type="radio"] {
            margin: 0 10px 0 0; /* Espacio a la derecha */
        }

        .form-container input[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #4CAF50;
            border: none;
            color: white;
            font-size: 1em;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s; /* Efecto de transición */
        }

        .form-container input[type="submit"]:hover {
            background-color: #45a049; /* Color al pasar el mouse */
        }

        .form-container a {
            display: block;
            text-align: center;
            margin-top: 15px;
            text-decoration: none;
            color: #4CAF50;
        }

        .form-container a:hover {
            text-decoration: underline; /* Subrayar al pasar el mouse */
        }

        .form-container textarea {
            resize: vertical; /* Permitir el cambio de tamaño verticalmente */
        }

        /* Estilo para las etiquetas de calificación */
        .rating-label {
            display: flex;
            justify-content: space-between; /* Espacio entre las calificaciones */
            margin-top: 5px;
            font-size: 0.9em;
            color: #555;
        }

      
        
    </style>
</head>
<body>

    <div class="form-container">
        <h1>Encuesta de Evaluación del Profesor</h1>
        <?php
        include '../../core/session.php';
        include '../../core/db.php';
        // session_start(); // Inicia la sesión si no está iniciada
        $current_user_id = get_logged_in_user_id();
        $conn = connectDB();
        ?>
        <p>Usuario actual: <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'Invitado'; ?></p>

        <form action="../public/guardar_respuestas.php" method="post">
            <label for="profesor" class="profesor-label">Seleccione el profesor:</label>
            <select name="profesor_id" id="profesor" required>
                <?php
                $result = $conn->query("SELECT id, nombre FROM profesores");
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='{$row['id']}'>{$row['nombre']}</option>";
                }
                ?>
            </select>

            <h2>Evaluación de criterios</h2>
            <?php
            $result = $conn->query("SELECT id, descripcion FROM criterios");
            while ($row = $result->fetch_assoc()) {
                echo "<label>{$row['descripcion']}:</label>";
                echo "<div class='radio-group'>"; // Agrupar los radios
                for ($i = 1; $i <= 5; $i++) {
                    echo "<div style='display: flex; align-items: center;'>"; // Alinear los elementos
                    echo "<input type='radio' name='criterio_{$row['id']}' value='{$i}' required> ";
                    echo "<span>{$i}</span>"; // Etiqueta para el número
                    echo "</div>";
                }
                echo "</div>"; // Cerrar el grupo de radios
                echo "<div class='rating-label'>";
                echo "<span>1 - Muy Malo</span><span>5 - Excelente</span>"; // Descripciones de los extremos
                echo "</div><br>"; // Línea de separación
            }
            $conn->close();
            ?>

            <label for="comentario">Comentarios adicionales:</label>
            <textarea name="comentario" id="comentario" rows="4" cols="50"></textarea>

            <input type="submit" value="Enviar Encuesta">
        </form>
        <a href="../auth/login.php">Login como Administrador</a>
    </div>
</body>
</html>

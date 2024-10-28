<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestionar Profesores</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <style>
        body {
            margin: 0;
            background-color: #f3f4f6; /* Color de fondo suave */
            font-family: Arial, sans-serif;
            padding: 20px; /* Espaciado alrededor */
        }

        h1 {
            text-align: center; /* Centrar el título */
            color: #4CAF50; /* Color del título */
            margin-bottom: 20px; /* Espaciado inferior */
        }

        form {
            max-width: 600px; /* Ancho máximo para el formulario */
            margin: 0 auto; /* Centrar formulario */
            padding: 20px; /* Espaciado interno */
            background-color: #fff; /* Color de fondo del formulario */
            border-radius: 8px; /* Bordes redondeados */
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); /* Sombra para efecto 3D */
            margin-bottom: 30px; /* Espaciado inferior */
        }

        label {
            display: block; /* Mostrar label como bloque */
            margin: 10px 0 5px; /* Espaciado para el label */
            font-weight: bold; /* Negrita para el label */
        }

        input[type="text"] {
            width: 100%; /* Ancho completo */
            padding: 10px; /* Espaciado interno */
            border: 1px solid #ddd; /* Borde suave */
            border-radius: 4px; /* Bordes redondeados */
            box-sizing: border-box; /* Incluir padding y borde en el tamaño total */
            margin-bottom: 15px; /* Espaciado inferior */
        }

        input[type="submit"] {
            background-color: #4CAF50; /* Color de fondo del botón */
            color: white; /* Color del texto del botón */
            border: none; /* Sin borde */
            padding: 10px; /* Espaciado interno */
            border-radius: 4px; /* Bordes redondeados */
            cursor: pointer; /* Cambiar cursor a puntero */
            transition: background-color 0.3s, transform 0.3s; /* Efecto de transición */
            margin-right: 10px; /* Espaciado a la derecha */
            display: inline-block; /* Mostrar como bloque en línea */
        }

        input[type="submit"]:hover {
            background-color: #45a049; /* Color de fondo al pasar el mouse */
            transform: translateY(-2px); /* Levantar el botón al pasar el mouse */
        }

        h2 {
            color: #333; /* Color del subtítulo */
            margin-top: 30px; /* Espaciado superior */
        }

        table {
            width: 100%; /* Ancho completo */
            border-collapse: collapse; /* Colapsar bordes */
            margin-top: 20px; /* Espaciado superior */
        }

        th, td {
            padding: 12px; /* Espaciado interno */
            text-align: left; /* Alinear texto a la izquierda */
            border: 1px solid #ddd; /* Borde suave */
        }

        th {
            background-color: #4CAF50; /* Color de fondo del encabezado */
            color: white; /* Color del texto del encabezado */
        }

        tr:nth-child(even) {
            background-color: #f9f9f9; /* Color de fondo para filas pares */
        }

        tr:hover {
            background-color: #f1f1f1; /* Color de fondo al pasar el mouse */
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

<a href="../views/public/admin.php">Volver al Panel de Administración</a>
    <h1>Gestionar Profesores</h1>
    <form method="post" action="../controllers/ProfesorController.php">
        <input type="hidden" name="action" value="add">
        <label for="nombre">Nombre del Profesor:</label>
        <input type="text" id="nombre" name="nombre" required>
        <input type="submit" value="Agregar Profesor">
    </form>
    
    <h2>Lista de Profesores</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($profesores as $profesor): ?>
            <tr>
                <td><?= $profesor['id'] ?></td>
                <td><?= $profesor['nombre'] ?></td>
                <td>
                    <form style='display:inline;' method='post' action="../controllers/ProfesorController.php">
                        <input type='hidden' name='action' value='edit'>
                        <input type='hidden' name='id' value='<?= $profesor['id'] ?>'>
                        <input type='text' name='nombre' value='<?= $profesor['nombre'] ?>' required>
                        <input type='submit' value='Editar'>
                    </form>
                    <form style='display:inline;' method='post' action="../controllers/ProfesorController.php">
                        <input type='hidden' name='action' value='delete'>
                        <input type='hidden' name='id' value='<?= $profesor['id'] ?>'>
                        <input type='submit' value='Eliminar' onclick="return confirm('¿Estás seguro de que deseas eliminar este profesor?')">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    
</body>
</html>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestionar Criterios</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <style>
        body {
            margin: 0;
            background-color: #f3f4f6; /* Color de fondo suave */
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        h1 {
            text-align: center; /* Centrar el título */
            color: #4CAF50; /* Color del título */
            margin-bottom: 30px; /* Espaciado inferior */
        }

        form {
            margin-bottom: 20px; /* Espaciado inferior del formulario */
            display: flex;
            flex-direction: column; /* Alinear los elementos en columna */
            align-items: center; /* Centrar los elementos */
        }

        label {
            margin-bottom: 5px; /* Espaciado inferior de la etiqueta */
            color: #333; /* Color del texto de la etiqueta */
        }

        input[type="text"] {
            padding: 10px;
            margin-bottom: 15px; /* Espaciado inferior del campo de texto */
            width: 250px; /* Ancho fijo */
            border: 2px solid #4CAF50; /* Borde sólido */
            border-radius: 5px; /* Bordes redondeados */
            transition: border-color 0.3s; /* Transición del color del borde */
        }

        input[type="text"]:focus {
            border-color: #45a049; /* Color de borde al enfocar */
        }

        input[type="submit"] {
            padding: 10px 15px;
            background-color: #4CAF50; /* Color de fondo del botón */
            color: white; /* Color del texto del botón */
            border: none;
            border-radius: 5px; /* Bordes redondeados */
            cursor: pointer; /* Cambiar cursor al pasar sobre el botón */
            transition: background-color 0.3s; /* Transición del color de fondo */
        }

        input[type="submit"]:hover {
            background-color: #45a049; /* Color de fondo al pasar el mouse */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px; /* Espaciado superior de la tabla */
            background-color: #fff; /* Color de fondo de la tabla */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Sombra */
            border-radius: 8px; /* Bordes redondeados */
        }

        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd; /* Borde de las celdas */
        }

        th {
            background-color: #4CAF50; /* Color de fondo de los encabezados */
            color: white; /* Color del texto de los encabezados */
        }

        tr:hover {
            background-color: #f2f2f2; /* Color de fondo al pasar el mouse */
        }

        .actions {
            display: flex;
            gap: 10px; /* Espaciado entre botones */
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
    <h1>Gestionar Criterios</h1>
    <form method="post" action="../controllers/CriterioController.php">
        <input type="hidden" name="action" value="add">
        <label for="descripcion">Descripción del Criterio:</label>
        <input type="text" id="descripcion" name="descripcion" required>
        <input type="submit" value="Agregar Criterio">
    </form>
    <h2>Lista de Criterios</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Descripción</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($criterios as $criterio): ?>
            <tr>
                <td><?= $criterio['id'] ?></td>
                <td><?= $criterio['descripcion'] ?></td>
                <td class="actions">
                    <form method='post' action="../controllers/CriterioController.php">
                        <input type='hidden' name='action' value='edit'>
                        <input type='hidden' name='id' value='<?= $criterio['id'] ?>'>
                        <input type='text' name='descripcion' value='<?= $criterio['descripcion'] ?>' required>
                        <input type='submit' value='Editar'>
                    </form>
                    <form method='post' action="../controllers/CriterioController.php">
                        <input type='hidden' name='action' value='delete'>
                        <input type='hidden' name='id' value='<?= $criterio['id'] ?>'>
                        <input type='submit' value='Eliminar' onclick="return confirm('¿Estás seguro de que deseas eliminar este criterio?')">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    
</body>
</html>

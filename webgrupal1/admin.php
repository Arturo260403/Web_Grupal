<?php
// Incluir la conexión a la base de datos
include('conexion.php');

// Verificar si el usuario está autenticado como administrador
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit();
}

// Consultar los sliders existentes
$query = "SELECT * FROM slider";
$resultado = mysqli_query($mysqli, $query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración - Sliders</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">Gestión de Sliders</h1>
        
        <!-- Tabla de Sliders -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($resultado)) {
                    echo '<tr>';
                    echo '<td><img src="' . $row['imagen'] . '" width="100" height="100"></td>';
                    echo '<td>' . htmlspecialchars($row['descripcion']) . '</td>';
                    echo '<td>';
                    echo '<a href="editar_slider.php?id=' . $row['id'] . '" class="btn btn-warning btn-sm">Editar</a> | ';
                    echo '<a href="eliminar_slider.php?id=' . $row['id'] . '" class="btn btn-danger btn-sm" onclick="return confirm(\'¿Estás seguro de eliminar este slider?\')">Eliminar</a>';
                    echo '</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>

        <!-- Botón para agregar un nuevo slider -->
        <a href="agregar_slider.php" class="btn btn-primary">Agregar Slider</a>
    </div>

</body>
</html>

<?php
// Incluir la conexión a la base de datos
include('conexion.php');

// Obtener el ID del slider a editar
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Consultar el slider por ID
    $query = "SELECT * FROM slider WHERE id = $id";
    $resultado = mysqli_query($mysqli, $query);
    $slider = mysqli_fetch_assoc($resultado);

    if (!$slider) {
        echo "Slider no encontrado.";
        exit();
    }

    // Procesar el formulario para editar el slider
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $descripcion = $_POST['descripcion'];

        // Actualizar la base de datos con la nueva descripción
        $query_update = "UPDATE slider SET descripcion = '$descripcion' WHERE id = $id";
        mysqli_query($mysqli, $query_update);
        
        header('Location: admin.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Slider</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">Editar Slider</h1>

        <form method="POST">
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo htmlspecialchars($slider['descripcion']); ?>">
            </div>
            <button type="submit" class="btn btn-success">Guardar cambios</button>
        </form>
    </div>
</body>
</html>

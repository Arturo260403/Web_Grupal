<?php
// Incluir tu archivo de conexión a la base de datos
include('conexion.php');

// Procesar el formulario cuando se envíe
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $targetDir = "uploads/";  // Directorio donde almacenarás las imágenes
    $targetFile = $targetDir . basename($_FILES["imagen"]["name"]);
    
    // Mover el archivo de la carpeta temporal a la carpeta de destino
    if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $targetFile)) {
        // Insertar la imagen y la descripción en la base de datos
        $descripcion = $_POST['descripcion'];
        $query = "INSERT INTO slider (imagen, descripcion) VALUES ('$targetFile', '$descripcion')";
        mysqli_query($mysqli, $query);
        echo "Imagen agregada exitosamente.";
    } else {
        echo "Hubo un error al subir la imagen.";
    }
}
?>

<form method="POST" enctype="multipart/form-data">
    <label for="imagen">Imagen:</label>
    <input type="file" name="imagen" required><br>

    <label for="descripcion">Descripción:</label>
    <input type="text" name="descripcion" required><br>

    <button type="submit">Agregar Slider</button>
</form>

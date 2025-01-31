<?php
// Incluir la conexión a la base de datos
include('conexion.php');

// Obtener el ID del slider a eliminar
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Eliminar el slider
    $query = "DELETE FROM slider WHERE id = $id";
    mysqli_query($mysqli, $query);

    header('Location: admin.php');
    exit();
}
?>

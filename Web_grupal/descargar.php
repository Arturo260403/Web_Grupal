<?php
include('includes/conexion.php');
session_start();

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=productos.xls");

$query = "SELECT * FROM productos";
$result = mysqli_query($mysqli, $query);

// Verifica si la consulta devolvió datos
if (mysqli_num_rows($result) > 0) {
    echo "ID\tNombre\tDescripcion\tPrecio\n";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "{$row['ID']}\t{$row['nombre']}\t{$row['descripcion']}\t{$row['precio']}\n";
    }
} else {
    echo "No hay productos para mostrar.";
}
?>


<?php
include('includes/conexion.php');
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=productos.xls");

$result = mysqli_query($mysqli, "SELECT * FROM productos");
echo "ID\tNombre\tDescripción\tPrecio\n";
while ($row = mysqli_fetch_assoc($result)) {
    echo "{$row['id']}\t{$row['nombre']}\t{$row['descripcion']}\t{$row['precio']}\n";
}
?>

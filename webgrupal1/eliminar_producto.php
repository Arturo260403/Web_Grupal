<?php
session_start();

// Verificamos si el producto_id está en la URL
if (isset($_GET['id'])) {
    $producto_id = $_GET['id'];

    // Verificamos si el producto está en el carrito
    if (isset($_SESSION['carrito'][$producto_id])) {
        // Eliminar el producto del carrito
        unset($_SESSION['carrito'][$producto_id]);
    }

    // Redirigimos al carrito
    header("Location: carrito.php");
    exit;
} else {
    // Si no se pasa el producto_id, redirigimos al carrito
    header("Location: carrito.php");
    exit;
}
?>

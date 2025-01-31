<?php
session_start();
include('includes/conexion.php');

// Verificar si el usuario está logueado
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

// Verificar si el usuario es administrador
$es_admin = ($_SESSION['login'] === "admin");

// Procesar la adición de productos si es admin
if ($es_admin && isset($_POST['agregar_producto'])) {
    $nombre = trim($_POST['nombre']);
    $descripcion = trim($_POST['descripcion']);
    $precio = floatval($_POST['precio']);
    $foto = trim($_POST['foto']); // En producción, usa un sistema de subida de archivos

    if (!empty($nombre) && !empty($descripcion) && $precio > 0 && !empty($foto)) {
        $query = "INSERT INTO productos (nombre, descripcion, precio, foto) VALUES (?, ?, ?, ?)";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param("ssds", $nombre, $descripcion, $precio, $foto);
        if ($stmt->execute()) {
            echo "<script>alert('Producto agregado correctamente');</script>";
        } else {
            echo "<script>alert('Error al agregar el producto');</script>";
        }
    }
}

// Procesar la modificación de productos si es admin
if ($es_admin && isset($_POST['editar_producto'])) {
    $id = intval($_POST['producto_ID']);
    $nombre = trim($_POST['nombre']);
    $descripcion = trim($_POST['descripcion']);
    $precio = floatval($_POST['precio']);
    $foto = trim($_POST['foto']);

    if ($id > 0) {
        $query = "UPDATE productos SET nombre=?, descripcion=?, precio=?, foto=? WHERE id=?";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param("ssdsi", $nombre, $descripcion, $precio, $foto, $id);
        if ($stmt->execute()) {
            echo "<script>alert('Producto actualizado correctamente');</script>";
        } else {
            echo "<script>alert('Error al actualizar el producto');</script>";
        }
    }
}

// Eliminar productos si es admin
if ($es_admin && isset($_POST['eliminar_producto'])) {
    $id = intval($_POST['producto_ID']);
    if ($id > 0) {
        $query = "DELETE FROM productos WHERE id=?";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            echo "<script>alert('Producto eliminado correctamente');</script>";
        } else {
            echo "<script>alert('Error al eliminar el producto');</script>";
        }
    }
}

// Agregar productos al carrito
if (isset($_POST['agregar_carrito'])) {
    $producto_id = intval($_POST['producto_ID']);
    $producto_precio = floatval($_POST['producto_precio']);

    // Consultar detalles del producto
    $query = "SELECT * FROM productos WHERE id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("i", $producto_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($row = $result->fetch_assoc()) {
        if (isset($_SESSION['carrito'][$producto_id])) {
            $_SESSION['carrito'][$producto_id]['cantidad']++;
        } else {
            $_SESSION['carrito'][$producto_id] = [
                'nombre' => $row['nombre'],
                'precio' => $producto_precio,
                'cantidad' => 1,
            ];
        }
    }
}

// Consultar todos los productos
$query = "SELECT * FROM productos";
$result = $mysqli->query($query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/tec.png" type="image/png">

    <title>Productos - TecnoAlhambra</title>
    <link rel="stylesheet" href="css/style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="img/Tec.png" alt="Logo" class="navbar-logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="productos.php">Productos</a></li>
                <li class="nav-item"><a class="nav-link" href="contacto.php">Contacto</a></li>
                <li class="nav-item"><a class="nav-link" href="carrito.php">Carrito</a></li>
                
                <?php if (isset($_SESSION['login'])): ?>
                    <li class="nav-item"><a class="nav-link btn btn-danger text-white" href="logout.php">Cerrar sesión</a></li>
                <?php else: ?>
                    <li class="nav-item"><a class="nav-link btn btn-light text-dark" href="login.php">Iniciar sesión</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <h3 class="text-center">Nuestros Productos</h3>

    <!-- Formulario para agregar productos (Solo visible para admins) -->
    <?php if ($es_admin): ?>
    <div class="card mb-4 p-3">
        <h5>Agregar Producto</h5>
        <form action="productos.php" method="POST">
            <input type="text" name="nombre" placeholder="Nombre" required class="form-control mb-2">
            <textarea name="descripcion" placeholder="Descripción" required class="form-control mb-2"></textarea>
            <input type="number" step="0.01" name="precio" placeholder="Precio" required class="form-control mb-2">
            <input type="text" name="foto" placeholder="Nombre de la imagen" required class="form-control mb-2">
            <button type="submit" name="agregar_producto" class="btn btn-success">Agregar</button>
        </form>
    </div>
    <?php endif; ?>

    <div class="row justify-content-center mt-4">
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <img src="img/<?= htmlspecialchars($row['foto']) ?>" class="card-img-top">
                    <div class="card-body">
                        <h5><?= htmlspecialchars($row['nombre']) ?></h5>
                        <p><?= htmlspecialchars($row['descripcion']) ?></p>
                        <p><strong><?= number_format($row['precio'], 2) ?> €</strong></p>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

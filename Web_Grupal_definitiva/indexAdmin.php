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
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $foto = $_POST['foto']; // En producción, usa un sistema de subida de archivos

    $query = "INSERT INTO productos (nombre, descripcion, precio, foto) VALUES (?, ?, ?, ?)";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("ssds", $nombre, $descripcion, $precio, $foto);
    $stmt->execute();
}

// Procesar la modificación de productos si es admin
if ($es_admin && isset($_POST['editar_producto'])) {
    $id = $_POST['producto_ID'];
    $nombre = !empty($_POST['nombre']) ? $_POST['nombre'] : null;
    $descripcion = !empty($_POST['descripcion']) ? $_POST['descripcion'] : null;
    $precio = !empty($_POST['precio']) ? $_POST['precio'] : null;
    $foto = !empty($_POST['foto']) ? $_POST['foto'] : null;

    $query = "UPDATE productos SET nombre = COALESCE(?, nombre), descripcion = COALESCE(?, descripcion), precio = COALESCE(?, precio), foto = COALESCE(?, foto) WHERE id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("ssdsi", $nombre, $descripcion, $precio, $foto, $id);
    $stmt->execute();
}

// Eliminar productos si es admin
if ($es_admin && isset($_POST['eliminar_producto'])) {
    $id = $_POST['producto_ID'];
    $query = "DELETE FROM productos WHERE id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
}

// Agregar productos al carrito
if (isset($_POST['agregar_carrito'])) {
    $producto_id = $_POST['producto_ID'];
    $producto_precio = $_POST['producto_precio'];

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
    <title>Productos - TecnoAlhambra</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .product-card:hover {
            transform: scale(1.05);
            transition: transform 0.3s ease;
        }
        .navbar-logo {
            height: 40px;
        }
    </style>
</head>
<body class="bg-light">

<!-- Barra de navegación -->
<nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="img/Tec.png" alt="Logo" class="navbar-logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="productos.php">Productos</a></li>
                <li class="nav-item"><a class="nav-link" href="contacto.php">Contacto</a></li>
                <li class="nav-item"><a class="nav-link" href="carrito.php">Carrito</a></li>
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
            <input type="number" name="precio" placeholder="Precio" required class="form-control mb-2">
            <input type="text" name="foto" placeholder="Nombre de la imagen" required class="form-control mb-2">
            <button type="submit" name="agregar_producto" class="btn btn-success">Agregar</button>
        </form>
    </div>
    <?php endif; ?>

    <div class="row justify-content-center mt-4">
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="col-12 col-md-4 mb-4">
                <div class="card shadow-sm product-card">
                    <img src="img/<?= htmlspecialchars($row['foto']) ?>" alt="<?= htmlspecialchars($row['nombre']) ?>" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($row['nombre']) ?></h5>
                        <p class="card-text"><?= htmlspecialchars($row['descripcion']) ?></p>
                        <p class="card-text"><strong><?= number_format($row['precio'], 2) ?> €</strong></p>

                        <!-- Formulario para agregar al carrito -->
                        <form action="productos.php" method="POST">
                            <input type="hidden" name="producto_ID" value="<?= $row['id'] ?>">
                            <input type="hidden" name="producto_precio" value="<?= $row['precio'] ?>">
                            <button type="submit" name="agregar_carrito" class="btn btn-primary">Añadir al carrito</button>
                        </form>

                        <!-- Formulario para modificar productos (Solo visible para admins) -->
                        <?php if ($es_admin): ?>
                        <hr>
                        <h6>Editar Producto</h6>
                        <form action="productos.php" method="POST">
                            <input type="hidden" name="producto_ID" value="<?= $row['id'] ?>">
                            <input type="text" name="nombre" value="<?= htmlspecialchars($row['nombre']) ?>" class="form-control mb-2">
                            <textarea name="descripcion" class="form-control mb-2"><?= htmlspecialchars($row['descripcion']) ?></textarea>
                            <input type="number" name="precio" value="<?= $row['precio'] ?>" class="form-control mb-2">
                            <input type="text" name="foto" value="<?= htmlspecialchars($row['foto']) ?>" class="form-control mb-2">
                            <button type="submit" name="editar_producto" class="btn btn-warning">Modificar</button>
                        </form>

                        <hr>
                        <h6>Eliminar Producto</h6>
                        <form action="productos.php" method="POST">
                            <input type="hidden" name="producto_ID" value="<?= $row['id'] ?>">
                            <button type="submit" name="eliminar_producto" class="btn btn-danger">Eliminar</button>
                        </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<!-- Pie de página -->
<footer class="bg-primary text-white text-center py-3 mt-5">
    <p>&copy; 2025 TecnoAlhambra. Todos los derechos reservados.</p>
</footer>

<!-- Scripts de Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

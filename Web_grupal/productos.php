<?php
session_start();
include('includes/conexion.php');

// Verificar si el usuario está logueado
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

// Lógica para agregar al carrito
if (isset($_POST['agregar_carrito'])) {
    $producto_id = $_POST['producto_ID'];
    $producto_precio = $_POST['producto_precio'];

    // Consultar los detalles del producto
    $query = "SELECT * FROM productos WHERE id = $producto_id";
    $result = mysqli_query($mysqli, $query);
    if ($row = mysqli_fetch_assoc($result)) {
        // Verificar si el producto ya está en el carrito
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
$result = mysqli_query($mysqli, $query);

// Verificar si la consulta fue exitosa
if (!$result) {
    die("Error en la consulta: " . mysqli_error($mysqli));
}
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

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="img/Tec.png" alt="Logo" class="navbar-logo" a href="index.php">
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
    <div class="row justify-content-center mt-4">
        <?php
        // Mostrar los productos de la base de datos
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="col-12 col-md-4 mb-4">';
            echo '<div class="card shadow-sm product-card">';
            echo '<img src="img/' . htmlspecialchars($row['foto']) . '" alt="' . htmlspecialchars($row['nombre']) . '" class="card-img-top">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . htmlspecialchars($row['nombre']) . '</h5>';
            echo '<p class="card-text">' . htmlspecialchars($row['descripcion']) . '</p>';
            echo '<p class="card-text"><strong>' . number_format($row['precio'], 2) . ' €</strong></p>';
            
           
           

            // Agregar el formulario para añadir al carrito
            echo '<form action="productos.php" method="POST">';
            echo '<input type="hidden" name="producto_ID" value="' . $row['ID'] . '">';
            echo '<input type="hidden" name="producto_precio" value="' . $row['precio'] . '">';
            echo '<button type="submit" name="agregar_carrito" class="btn btn-primary">Añadir al carrito</button>';
            echo '</form>';

            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        ?>
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

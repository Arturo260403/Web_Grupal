<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
include('includes/conexion.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TecnoAlhambra - Tu tienda de tecnología</title>
    <link rel="icon" href="img/" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-light">

<!-- Carrusel -->
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner"></div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

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

<!-- Contenido Principal -->
<div class="container mt-5 text-center">
    <h1>Bienvenido a TecnoAlhambra</h1>
    <p>La mejor tienda online de tecnología y productos electrónicos</p>
    <div class="mt-4">
        <a href="productos.php" class="btn btn-primary">Ver productos</a>
    </div>
</div>

<!-- Nuestros Mejores PCs -->
<div class="container mt-5">
    <h3 class="text-center">Nuestros Mejores PCs</h3>
    <div class="row justify-content-center mt-4">
        <?php
        $productos = [
            ["img/1.png", "COOLPC Gamer I", "Ryzen 5 4500 / GeForce RTX 3050 8GB / 16GB DDR4 3200Mhz / NVMe 500Gb", "729,59 €", "799,99 €"],
            ["img/2.png", "COOLPC Gamer II", "Intel i7-12700K / GeForce RTX 3070 8GB / 32GB DDR4 3600Mhz / NVMe 1TB", "1.249,95 €", "1.499,99 €"],
            ["img/3.png", "COOLPC Gamer III", "Ryzen 7 5800X / GeForce RTX 3080 10GB / 64GB DDR4 3600Mhz / NVMe 1TB", "1.799,95 €", "2.099,99 €"],
            ["img/4.png", "COOLPC Gamer IV", "Intel i9-13900K / GeForce RTX 4090 24GB / 64GB DDR5 4800Mhz / NVMe 2TB", "3.499,99 €", "4.099,99 €"]
        ];
        
        foreach ($productos as $producto) {
            echo '<div class="col-3 mb-4">
                    <a href="productos.php" class="card-link text-decoration-none">
                        <div class="card shadow-sm hover-effect product-card">
                            <img src="' . $producto[0] . '" alt="' . $producto[1] . '" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title">' . $producto[1] . '</h5>
                                <p class="card-text">' . $producto[2] . '</p>
                                <p class="card-text"><strong>' . $producto[3] . '</strong> <del>' . $producto[4] . '</del></p>
                            </div>
                        </div>
                    </a>
                  </div>';
        }
        ?>
    </div>
</div>

<!-- Pie de página -->
<footer class="bg-primary text-white text-center py-3 mt-5">
    <p>&copy; 2025 TecnoAlhambra. Todos los derechos reservados.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

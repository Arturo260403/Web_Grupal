
<?php
session_start();

// Verificamos si el usuario está logueado
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

// Verificar si el carrito está vacío
if (!isset($_SESSION['carrito']) || empty($_SESSION['carrito'])) {
    $mensaje = "Tu carrito está vacío.";
} else {
    $mensaje = "Estos son los productos en tu carrito:";
}

$total = 0;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito - TecnoAlhambra</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
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
<!-- Sección del carrito -->
<div class="container mt-5">
    <h3 class="text-center"><?= $mensaje ?></h3>
    <?php if (isset($mensaje) && !empty($_SESSION['carrito'])): ?>
        <div class="table-responsive mt-4">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($_SESSION['carrito'] as $producto_id => $detalle) {
                        $subtotal = $detalle['precio'] * $detalle['cantidad'];
                        $total += $subtotal;
                        echo '<tr>';
                        echo '<td>' . htmlspecialchars($detalle['nombre']) . '</td>';
                        echo '<td>' . number_format($detalle['precio'], 2) . ' €</td>';
                        echo '<td>' . $detalle['cantidad'] . '</td>';
                        echo '<td>' . number_format($subtotal, 2) . ' €</td>';
                        echo '<td><a href="eliminar_producto.php?id=' . $producto_id . '" class="btn btn-danger btn-sm">Eliminar</a></td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
            <div class="text-end">
                <h4>Total: <?= number_format($total, 2) ?> €</h4>
                <a href="finalizar_compra.php" class="btn btn-success">Finalizar Compra</a>
            </div>
        </div>
    <?php endif; ?>
</div>

<!-- Pie de página -->
<footer class="bg-primary text-white text-center py-3 mt-5">
    <p>&copy; 2025 TecnoAlhambra. Todos los derechos reservados.</p>
</footer>

<!-- Scripts de Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

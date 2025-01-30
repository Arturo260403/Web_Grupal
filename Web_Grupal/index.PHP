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
</head>
<body class="bg-light">

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
        <!-- Fila 1 -->
        <!-- COOLPC Gamer I -->
        <div class="col-3 mb-4">
            <a href="productos.php" class="card-link text-decoration-none">
                <div class="card shadow-sm hover-effect product-card">
                    <img src="img/1.png" alt="COOLPC Gamer I" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">COOLPC Gamer I</h5>
                        <p class="card-text">Ryzen 5 4500 / GeForce RTX 3050 8GB / 16GB DDR4 3200Mhz / NVMe 500Gb</p>
                        <p class="card-text"><strong>729,59 €</strong> <del>799,99 €</del></p>
                    </div>
                </div>
            </a>
        </div>

        <!-- COOLPC Gamer II -->
        <div class="col-3 mb-4">
            <a href="productos.php" class="card-link text-decoration-none">
                <div class="card shadow-sm hover-effect product-card">
                    <img src="img/2.png" alt="COOLPC Gamer II" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">COOLPC Gamer II</h5>
                        <p class="card-text">Intel i7-12700K / GeForce RTX 3070 8GB / 32GB DDR4 3600Mhz / NVMe 1TB</p>
                        <p class="card-text"><strong>1.249,95 €</strong> <del>1.499,99 €</del></p>
                    </div>
                </div>
            </a>
        </div>

        <!-- COOLPC Gamer III -->
        <div class="col-3 mb-4">
            <a href="productos.php" class="card-link text-decoration-none">
                <div class="card shadow-sm hover-effect product-card">
                    <img src="img/3.png" alt="COOLPC Gamer III" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">COOLPC Gamer III</h5>
                        <p class="card-text">Ryzen 7 5800X / GeForce RTX 3080 10GB / 64GB DDR4 3600Mhz / NVMe 1TB</p>
                        <p class="card-text"><strong>1.799,95 €</strong> <del>2.099,99 €</del></p>
                    </div>
                </div>
            </a>
        </div>

        <!-- COOLPC Gamer IV -->
        <div class="col-3 mb-4">
            <a href="productos.php" class="card-link text-decoration-none">
                <div class="card shadow-sm hover-effect product-card">
                    <img src="img/4.png" alt="COOLPC Gamer IV" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">COOLPC Gamer IV</h5>
                        <p class="card-text">Intel i9-13900K / GeForce RTX 4090 24GB / 64GB DDR5 4800Mhz / NVMe 2TB</p>
                        <p class="card-text"><strong>3.499,99 €</strong> <del>4.099,99 €</del></p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>


<!-- Sección de motivo para comprar en nuestra tienda -->
<div class="container mt-5 text-center">
    <h3>¿Por qué comprar en TecnoAlhambra?</h3>
    <div class="row mt-4">
        <!-- 14 días de desistimiento -->
        <div class="col-md-4 mb-3">
            <span style="font-size: 3rem;">🔙</span> <!-- Emoticono de desistimiento -->
            <p>14 días de desistimiento</p>
        </div>

        <!-- 3 años de garantía -->
        <div class="col-md-4 mb-3">
            <span style="font-size: 3rem;">🛡️</span> <!-- Emoticono de garantía -->
            <p>3 años de garantía</p>
        </div>

        <!-- Atención telefónica -->
        <div class="col-md-4 mb-3">
            <span style="font-size: 3rem;">📞</span> <!-- Emoticono de teléfono -->
            <p>Atención telefónica</p>
        </div>
    </div>

    <div class="row mt-4">
        <!-- Envío asegurado -->
        <div class="col-md-4 mb-3">
            <span style="font-size: 3rem;">📦</span> <!-- Emoticono de paquete -->
            <p>Envío asegurado</p>
        </div>

        <!-- Envío inmediato -->
        <div class="col-md-4 mb-3">
            <span style="font-size: 3rem;">⚡</span> <!-- Emoticono de rayo (envío rápido) -->
            <p>Envío inmediato</p>
        </div>

        <!-- Financiación flexible -->
        <div class="col-md-4 mb-3">
            <span style="font-size: 3rem;">💳</span> <!-- Emoticono de tarjeta de crédito -->
            <p>Financiación flexible</p>
        </div>
    </div>
</div>
<!-- Productos Destacados -->
<div class="container mt-5">
    <h3 class="text-center">Productos Destacados</h3>
    <div class="row justify-content-center mt-4">
    <div class="row justify-content-center mt-4">
    <!-- Portátil LG Gram -->
    <div class="col-3 mb-4">
        <a href="productos.php" class="card-link text-decoration-none">
            <div class="card shadow-sm hover-effect product-card">
                <img src="img/portatil_lg.png" alt="Portátil LG Gram" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Portátil LG Gram 16Z90S</h5>
                    <p class="card-text">32GB RAM, 2TB SSD, 16" W11H</p>
                    <p class="card-text"><strong>1.679,95 €</strong> <del>1.799,95 €</del></p>
                </div>
            </div>
        </a>
    </div>

    <!-- Smartphone Xiaomi 14T Pro -->
    <div class="col-3 mb-4">
        <a href="productos.php" class="card-link text-decoration-none">
            <div class="card shadow-sm hover-effect product-card">
                <img src="img/xiaomi.png" alt="Smartphone Xiaomi 14T Pro" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Smartphone Xiaomi 14T Pro</h5>
                    <p class="card-text">12GB RAM, 512GB 5G, Azul Titanio</p>
                    <p class="card-text"><strong>659,95 €</strong> <del>749,95 €</del></p>
                </div>
            </div>
        </a>
    </div>

    <!-- Procesador AMD Ryzen 7 -->
    <div class="col-3 mb-4">
        <a href="productos.php" class="card-link text-decoration-none">
            <div class="card shadow-sm hover-effect product-card">
                <img src="img/ryzen7.png" alt="Procesador AMD Ryzen 7" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Procesador AMD Ryzen 7 </h5>
                    <p class="card-text">5.0GHz, Socket AM5, Boxed</p>
                    <p class="card-text"><strong>509,95 €</strong> <del>729,95 €</del></p>
                </div>
            </div>
        </a>
    </div>

    <!-- Monitor Asus TUF Gaming -->
    <div class="col-3 mb-4">
        <a href="productos.php" class="card-link text-decoration-none">
            <div class="card shadow-sm hover-effect product-card">
                <img src="img/tuf_gaming.png" alt="Monitor Asus TUF Gaming" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Monitor Asus TUF Gaming</h5>
                    <p class="card-text">27" QHD 2K IPS, 180Hz G-Sync</p>
                    <p class="card-text"><strong>229,95 €</strong> <del>319,95 €</del></p>
                </div>
            </div>
        </a>
    </div>
</div>



<!-- Valoraciones de los clientes -->
<div class="container mt-5">
    <h3 class="text-center">Valoraciones de nuestros clientes</h3>
    <div class="row justify-content-center mt-4">
        <div class="col-md-4">
            <div class="card shadow-sm mb-4 hover-effect">
                <div class="card-body">
                    <h5 class="card-title">Juan Pérez</h5>
                    <p class="card-text">"Excelente tienda, compré un ordenador y llegó en perfectas condiciones. ¡Recomendados!"</p>
                    <div class="d-flex justify-content-between">
                        <span class="text-warning">⭐⭐⭐⭐⭐</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm mb-4 hover-effect">
                <div class="card-body">
                    <h5 class="card-title">María López</h5>
                    <p class="card-text">"Muy buena atención al cliente, solucionaron todas mis dudas rápidamente. Volveré a comprar aquí."</p>
                    <div class="d-flex justify-content-between">
                        <span class="text-warning">⭐⭐⭐⭐☆</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm mb-4 hover-effect">
                <div class="card-body">
                    <h5 class="card-title">Carlos García</h5>
                    <p class="card-text">"Los productos son de alta calidad, el envío fue rápido y sin complicaciones. 100% recomendado."</p>
                    <div class="d-flex justify-content-between">
                        <span class="text-warning">⭐⭐⭐⭐⭐</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Marcas que colaboran con nosotros -->
<div class="container mt-5">
    <h3 class="text-center">Marcas que colaboran con nosotros</h3>
    <div class="row justify-content-center mt-4">
        <div class="col-4 col-sm-2 text-center">
            <a href="https://www.apple.com" target="_blank">
                <img src="img/apple.png" alt="Marca 1" class="img-fluid" style="width: 100px; height: 100px;">
            </a>
        </div>
        <div class="col-4 col-sm-2 text-center">
            <a href="https://www.asus.com" target="_blank">
                <img src="img/asus.png" alt="Marca 2" class="img-fluid" style="width: 100px; height: 100px;">
            </a>
        </div>
        <div class="col-4 col-sm-2 text-center">
            <a href="https://www.corsair.com" target="_blank">
                <img src="img/corsair.png" alt="Marca 3" class="img-fluid" style="width: 100px; height: 100px;">
            </a>
        </div>
        <div class="col-4 col-sm-2 text-center">
            <a href="https://www.hp.com" target="_blank">
                <img src="img/hp.png" alt="Marca 4" class="img-fluid" style="width: 100px; height: 100px;">
            </a>
        </div>
        <div class="col-4 col-sm-2 text-center">
            <a href="https://www.logitech.com" target="_blank">
                <img src="img/logitech.png" alt="Marca 5" class="img-fluid" style="width: 100px; height: 100px;">
            </a>
        </div>
    </div>
</div>

<!-- Pie de página -->
<footer class="bg-primary text-white text-center py-3 mt-5">
    <p>&copy; 2025 TecnoAlhambra. Todos los derechos reservados.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
include('includes/conexion.php');
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['eliminar_productos'])) {
    $productos_eliminar = $_POST['productos'] ?? [];
    if (!empty($productos_eliminar)) {
        $ids = implode(",", array_map('intval', $productos_eliminar));
        $query = "DELETE FROM productos WHERE id IN ($ids)";
        if (mysqli_query($mysqli, $query)) {
            echo "<script>alert('Productos eliminados correctamente'); window.location.href='productos.php';</script>";
            exit;
        } else {
            echo "<script>alert('Error eliminando productos');</script>";
        }
    } else {
        echo "<script>alert('No se seleccionó ningún producto para eliminar.');</script>";
    }
}
$result = mysqli_query($mysqli, "SELECT * FROM productos");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Eliminar Productos</h2>
        <form method="POST">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Seleccionar</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (mysqli_num_rows($result) > 0) : ?>
                        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                            <tr>
                                <td><input type="checkbox" name="productos[]" value="<?= $row['id'] ?>"></td>
                                <td><?= htmlspecialchars($row['nombre']) ?></td>
                                <td><?= htmlspecialchars($row['descripcion']) ?></td>
                                <td><?= number_format($row['precio'], 2) ?> €</td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="4" class="text-center">No hay productos disponibles.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
            <button type="submit" name="eliminar_productos" class="btn btn-danger">Eliminar seleccionados</button>
            <a href="productos.php" class="btn btn-secondary">Volver</a>
        </form>
    </div>
</body>
</html>

<?php
include "includes/conexion.php";  // Asegúrate de que la ruta sea correcta para incluir la conexión.

// Definir el usuario y contraseña de prueba
$usuario = "admin"; // Nombre de usuario de prueba
$password = "accesobackend"; // Contraseña de prueba

// Consulta a la base de datos para buscar al usuario
$query = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
$resultado = mysqli_query($mysqli, $query);

if ($resultado && mysqli_num_rows($resultado) > 0) {
    $fila = mysqli_fetch_assoc($resultado); 
    $password_db = $fila['password'];  // Obtener la contraseña almacenada en la base de datos

    // Comparar la contraseña ingresada con la almacenada
    if ($password === $password_db) {
        echo "¡Inicio de sesión exitoso!";
    } else {
        echo "Contraseña incorrecta.";
    }
} else {
    echo "El usuario no existe.";
}
?>

<?php
include "includes/conexion.php"; 
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $mysqli->real_escape_string(trim($_POST["usuario"]));  // Limpiar espacios en blanco
    $password = trim($_POST["password"]);  // Limpiar espacios en blanco

    // Consulta a la base de datos para verificar si el usuario existe
    $query = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
    $resultado = mysqli_query($mysqli, $query);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $fila = mysqli_fetch_assoc($resultado);
        $password_db = $fila['password'];  // Obtener la contraseña almacenada sin encriptar

        // Comparar las contraseñas directamente (sin encriptar)
        if ($password === $password_db) {
            $_SESSION['login'] = $usuario; // Guardar el usuario en la sesión
            echo "<script>
                    alert('Inicio de sesión exitoso');
                    window.location.href = 'index.php'; // Redirigir al index
                  </script>";
            exit;
        } else {
            echo "<script>
                    alert('Contraseña incorrecta');
                    window.location.href = 'login.php';
                  </script>";
            exit;
        }
    } else {
        echo "<script>
                alert('El usuario no existe');
                window.location.href = 'login.php';
              </script>";
        exit;
    }
}
?>

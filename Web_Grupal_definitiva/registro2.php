<?php
include "includes/conexion.php"; 
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $mysqli->real_escape_string($_POST["usuario"]);
    $password = $_POST["password"];

    // Verifica si el usuario ya existe
    $query = "SELECT usuario FROM usuarios WHERE usuario = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        echo "<script>
                alert('El usuario ya existe. Intenta con otro.');
                window.location.href = 'registro.php';
              </script>";
        exit;
    }

    // Hashea la contraseña antes de guardarla
    $password_hash = password_hash($password, PASSWORD_BCRYPT);

    // Inserta el usuario en la base de datos
    $insert = "INSERT INTO usuarios (usuario, password) VALUES (?, ?)";
    $stmt = $mysqli->prepare($insert);
    $stmt->bind_param("ss", $usuario, $password_hash);

    if ($stmt->execute()) {
        echo "<script>
                alert('Registro exitoso. Ahora puedes iniciar sesión.');
                window.location.href = 'login.php';
              </script>";
    } else {
        echo "<script>
                alert('Error al registrar: " . $stmt->error . "');
                window.location.href = 'registro.php';
              </script>";
    }
}
?>

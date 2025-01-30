<?php
include "includes/conexion.php"; 
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $mysqli->real_escape_string($_POST["usuario"]);
    $password = $_POST["password"];

    $query = "SELECT usuario FROM usuarios WHERE usuario = '$usuario'";
    $resultado = mysqli_query($mysqli, $query);

    if (mysqli_num_rows($resultado) > 0) {
        echo "<script>
                alert('El usuario ya existe. Intenta con otro.');
                window.location.href = 'registro.php';
              </script>";
        exit;
    }

    $password_hash = password_hash($password, PASSWORD_BCRYPT);

    $insert = "INSERT INTO usuarios (usuario, password) VALUES ('$usuario', '$password_hash')";
    
    if ($mysqli->query($insert) === TRUE) {
        echo "<script>
                alert('Registro exitoso. Ahora puedes iniciar sesión.');
                window.location.href = 'login.php';
              </script>";
    } else {
        echo "<script>
                alert('Error al registrar: " . $mysqli->error . "');
                window.location.href = 'registro.php';
              </script>";
    }
}
?>

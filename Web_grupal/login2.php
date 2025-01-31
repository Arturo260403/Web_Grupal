<?php
include "includes/conexion.php"; 
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = trim($_POST["usuario"]); // Eliminamos espacios en blanco
    $password = $_POST["password"];

    $query = "SELECT password FROM usuarios WHERE usuario = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
        $hash_password = $fila['password']; 

        // 🔍 Debugging: Muestra lo que se está verificando (solo en pruebas, quítalo en producción)
        echo "Contraseña ingresada: " . htmlspecialchars($password) . "<br>";
        echo "Hash almacenado: " . htmlspecialchars($hash_password) . "<br>";

        // Si el usuario es admin, le damos acceso directo sin hash
        if ($usuario === "admin" && $password === "accesobackend") {
            $_SESSION['login'] = "admin";
            echo "<script>
                    alert('Bienvenido Administrador');
                    window.location.href = 'indexAdmin.php';
                  </script>";
            exit;
        }

        // Verificamos la contraseña con password_verify()
        if (password_verify($password, $hash_password)) {
            $_SESSION['login'] = $usuario;
            echo "<script>
                    alert('Inicio de sesión exitoso');
                    window.location.href = 'index.php';
                  </script>";
            exit;
        } else {
            echo "<script>
                    alert('❌ ERROR: La contraseña no coincide.');
                    window.location.href = 'login.php';
                  </script>";
            exit;
        }
    } else {
        echo "<script>
                alert('❌ ERROR: El usuario no existe.');
                window.location.href = 'login.php';
              </script>";
        exit;
    }
}
?>

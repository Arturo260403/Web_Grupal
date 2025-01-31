<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
include "includes/conexion.php"; 

if ($mysqli->connect_error) {
    die("Error de conexión a la base de datos: " . $mysqli->connect_error);
}

$mensajeUsuario = "";
$alertClass = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $remitente = $mysqli->real_escape_string($_POST['remitente']);
    $email = $mysqli->real_escape_string($_POST['email']);
    $mensaje = $mysqli->real_escape_string($_POST['mensaje']);

    $sql = "INSERT INTO mensajes (remitente, texto) VALUES ('$remitente', '$mensaje')";

    if ($mysqli->query($sql) === TRUE) {
        $mensajeUsuario = "Mensaje guardado en la base de datos correctamente.";
        $alertClass = "alert-success";
    } else {
        $mensajeUsuario = "Error al guardar en la base de datos: " . $mysqli->error;
        $alertClass = "alert-danger";
    }

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'cp7014.webempresa.eu';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'alumno@lafactoriaweb.es';
        $mail->Password   = 'Alumno123@@';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;

        $mail->setFrom('alumno@lafactoriaweb.es', $remitente); 
        $mail->addAddress('cliente@segundodedaw.es'); 
        $mail->addReplyTo($email, $remitente); 

        $mail->isHTML(true);
        $mail->Subject = 'Nuevo mensaje de contacto';
        $mail->Body    = "<b>Remitente:</b> $remitente <br>
                          <b>Correo:</b> $email <br>
                          <b>Mensaje:</b> $mensaje";
        $mail->AltBody = "Remitente: $remitente\nCorreo: $email\nMensaje: $mensaje";

        $mail->send();
        $mensajeUsuario .= "<br>Mensaje enviado correctamente.";
        $alertClass = "alert-success";
    } catch (Exception $e) {
        $mensajeUsuario .= "<br>Error al enviar el mensaje: {$mail->ErrorInfo}";
        $alertClass = "alert-danger";
    }
}

$mysqli->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado del Envío</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex justify-content-center align-items-center vh-100">
    <div class="container text-center">
        <div class="alert <?= $alertClass; ?>" role="alert">
            <?= $mensajeUsuario; ?>
        </div>
        <a href="index.php" class="btn btn-primary">Volver al inicio</a>
    </div>
</body>
</html>

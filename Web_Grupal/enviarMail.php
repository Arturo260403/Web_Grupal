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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $remitente = $mysqli->real_escape_string($_POST['remitente']);
    $email = $mysqli->real_escape_string($_POST['email']);
    $mensaje = $mysqli->real_escape_string($_POST['mensaje']);

    $sql = "INSERT INTO mensajes (remitente, texto) VALUES ('$remitente', '$mensaje')";
    
    if ($mysqli->query($sql) === TRUE) {
        echo "Mensaje guardado en la base de datos correctamente.";
    } else {
        echo "Error al guardar en la base de datos: " . $mysqli->error;
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
        $mail->addReplyTo($email, $remitente); /

        $mail->isHTML(true);
        $mail->Subject = 'Nuevo mensaje de contacto';
        $mail->Body    = "<b>Remitente:</b> $remitente <br>
                          <b>Correo:</b> $email <br>
                          <b>Mensaje:</b> $mensaje";
        $mail->AltBody = "Remitente: $remitente\nCorreo: $email\nMensaje: $mensaje";

        $mail->send();
        echo "<br>Mensaje enviado correctamente.";
    } catch (Exception $e) {
        echo "<br>Error al enviar el mensaje: {$mail->ErrorInfo}";
    }
}

$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviar Comentario</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">
</head>
<body>
    
</body>
</html>


<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Incluye el autoload de Composer
require 'vendor/autoload.php'; // Cambia la ruta si es necesario

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if(isset($_POST['curso'])){
        $curso = $_POST['curso'];
    }
    else{
        echo "<script>alert('No selecciono un curso');</script>";
    }
    if(isset($_POST['gmail'])){
        $gmail = $_POST['gmail'];
    }
    else{
        echo "<script>alert('No selecciono un gmail');</script>";
    }
    if(isset($_POST['asunto'])){
        
        $asunto = htmlspecialchars($_POST['asunto']);
    }
    else{
        echo "<script>alert('No ingreso un asunto');</script>";
    }


    // Crear una instancia de PHPMailer
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';  // Servidor SMTP de Gmail
        $mail->SMTPAuth   = true;               // Habilita la autenticación SMTP
        $mail->Username   = 'gamsite2@gmail.com';  // Tu dirección de correo electrónico de Gmail
        $mail->Password   = 'nvtp qtts xqpc wapo';         // Tu contraseña de Gmail
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Habilita el cifrado TLS; también se puede usar `PHPMailer::ENCRYPTION_SMTPS`
        $mail->Port       = 587;                  // El puerto TCP para conectarse
    
        // Destinatario
        $mail->setFrom('gamsite2@gmail.com', 'Los comentarios');
        $mail->addAddress($gmail, 'Nombre del Destinatario');

        // Contenido del correo
        $mail->isHTML(true);
        $mail->Subject = 'Alumno de '.$curso.' anio' ;
        $mail->Body    = 'El comentario: '. $asunto;
        $mail->AltBody = $asunto;

        // Enviar el correo
        $mail->send();
        
    } catch (Exception $e) {
        echo "Hubo un error al enviar el mensaje. Error: {$mail->ErrorInfo}";
    }
} else {
    echo "Método de solicitud no válido.";
}
?>

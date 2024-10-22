<?php

    include "conexion.php";

    $dni= $_POST['txtdni'];
    $nombre= $_POST['txtnombre'];
    $apellido= $_POST['txtapellido'];
    $correo= $_POST['txtcorreo'];
    $contraseña= $_POST['txtcontraseña'];

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    // Incluye el autoload de Composer
    require 'gmailSend/vendor/autoload.php'; 

    $query = "INSERT INTO alumnos (dni, nombre, apellido, correo, contraseña) 
    VALUES ('$dni', '$nombre', '$apellido', '$correo', '$contraseña')";

    $resultado = mysqli_query( $conectar, $query);

    if ($resultado > 0) {

        echo '<script> alert("Se cargaron los datos.");history.go(-1);</script>';
        //enviar correo ala alumno una vez cargado

        $mail = new PHPMailer(true);
        $asunto = "fuiste creado por tu preceptora en la pagina dela EPET 34";
        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';  // Servidor SMTP de Gmail
            $mail->SMTPAuth   = true;               // Habilita la autenticación SMTP
            $mail->Username   = 'gamsite2@gmail.com';  // Tu dirección de correo electrónico de Gmail
            $mail->Password   = 'nvtp qtts xqpc wapo';         // Tu contraseña de Gmail
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Habilita el cifrado TLS; también se puede usar `PHPMailer::ENCRYPTION_SMTPS`
            $mail->Port       = 587;                  // El puerto TCP para conectarse

            // Destinatario
            $mail->setFrom('gamsite2@gmail.com', '¡Bienvenido a la Epet!');
            $mail->addAddress($correo, 'Hola '.$nombre.'');

            $mail->addAddress($correo, 'Hola ' . $nombre);
            $mail->CharSet = 'UTF-8';
            // Contenido del correo
            $mail->isHTML(true);
            $mail->Subject = 'Alumno de la Epet34';
            $mail->Body    = '<p>Hola,</p><p>Te comentamos que fuiste creado por tu preceptora en la página de la EPET 34.</p>
                            <p>Nombre de Usuario: <strong>' . $nombre . '</strong></p>
                            <p>Contraseña: <strong>' . $dni . '</strong></p>';
            $mail->AltBody = 'Hola, Te comentamos que fuiste creado por tu preceptora en la página de la EPET 34. ' .
                            'Nombre de Usuario: ' . $nombre . '. Contraseña: ' . $dni . '.';
        

            $mail->send();
            echo "<script>alert('Correo enviado al alumno '); </script>";
        } catch (Exception $e) {
            echo "Hubo un error al enviar el mensaje. Error: {$mail->ErrorInfo}";
        }
    }
    else {
        echo '<script> alert("Hubo un herror al cargar los datos."); history.go(-1);</script>';

    }

?>
<?php
// Verificar si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Directorio donde se guardarán los archivos subidos
    $directorioSubida = 'uploads/';

    // Verificar si el directorio de subida existe, si no, lo creamos
    if (!is_dir($directorioSubida)) {
        mkdir($directorioSubida, 0755, true);
    }

    // Ruta completa del archivo subido
    $archivoSubido = $directorioSubida . basename($_FILES['archivo']['name']);

    // Verificar si el archivo fue subido sin errores
    if (move_uploaded_file($_FILES['archivo']['tmp_name'], $archivoSubido)) {
        echo "El archivo " . htmlspecialchars(basename($_FILES['archivo']['name'])) . " ha sido subido correctamente.";
    } else {
        echo "Error al subir el archivo.";
    }
}
?>
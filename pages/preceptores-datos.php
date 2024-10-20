<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Profesores</title>
</head>
<body>    
    <h1>Log In</h1>
    <div class="div-iniciar">
        <form action="iniciar-preces.php" method="post">
            <label for="txtnombre">Nombre</label>
            <input type="text" required name="txtnombre" id="txtnombre" placeholder="NOMBRE">
            <label for="txtcontraseña">Contraseña</label>
            <input type="password" required name="txtcontraseña" id="txtcontraseña" placeholder="CONTRASEÑA"/>
            <input type="submit" name="enviar"/>
            <input type="reset" value="Cancelar"/>
        </form>
    </div>
</body>
</html>
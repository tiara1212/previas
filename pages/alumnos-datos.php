<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
</head>
<body>
    <h1>Log In</h1>
    <form action="iniciar-alumnos.php" method="post">
            <label for="txtusuario">Usuario</label>
            <input type="text" required name="txtusuario" id="txtusuario" placeholder="USUARIO">
            <label for="txtcontraseña">Contraseña</label>
            <input type="password" required name="txtcontraseña" id="txtcontraseña" placeholder="CONTRASEÑA"/>
            <input type="submit" name="enviar"/>
            <input type="reset" value="Cancelar"/>
        </form>
</body>
</html>
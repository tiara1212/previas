<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Profesores</title>
</head>
<body>
    <div class="div-registro">
        <h1>Registrate para poder comenzar</h1>
        <form action="registrar-preces.php" method="POST">
            <label for="txtndni">DNI</label>
            <input type="number" required name="txtdni" id="txtdni" placeholder="DNI"/>
            <label for="txtnombre">Nombre</label>
            <input type="text" required name="txtnombre" id="txtnombre" placeholder="NOMBRE"/>
            <label for="txtapellido">Apellido</label>
            <input type="text" required name="txtapellido" id="txtapellido" placeholder="APELLIDO"/>
            <label for="txtcorreo">Correo</label>
            <input type="text" required name="txtcorreo" id="txtcorreo" placeholder="CORREO"/>
            <label for="txtcontraseña">Contraseña</label>
            <input type="password" required name="txtcontraseña" id="txtcontraseña" placeholder="CONTRASEÑA"/>
            <input type="submit" name="enviar"/>
            <input type="reset" value="Cancelar"/>
        </form>
    </div>
    <h1>Log In</h1>
    <div class="div-iniciar">
        <form action="iniciar-preces.php" method="post">
            <label for="txtdni">DNI</label>
            <input type="number" required name="txtdni" id="txtdni" placeholder="DNI">
            <label for="txtcontraseña">Contraseña</label>
            <input type="password" required name="txtcontraseña" id="txtcontraseña" placeholder="CONTRASEÑA"/>
            <input type="submit" name="enviar"/>
            <input type="reset" value="Cancelar"/>
        </form>
    </div>
</body>
</html>
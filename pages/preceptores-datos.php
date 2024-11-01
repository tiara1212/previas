<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Profesores</title>
</head>
<body>    
<style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #121212; /* Fondo negro */
            font-family: Arial, sans-serif;
        }

        .login-container {
            background-color: #1e1e1e; /* Fondo gris oscuro */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
            width: 400px;
        }

        h2 {
            color: #ff4d4d; /* Título rojo */
            text-align: center;
        }

        input[type="text"],
        input[type="password"] {
            width: 95%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ff4d4d; /* Borde rojo */
            border-radius: 4px;
            background-color: #2a2a2a; /* Fondo de los inputs */
            color: white; /* Texto blanco */
        }

        input[type="submit"],
        input[type="submit"],
        input[type="button"] {
            width: 48%;
            padding: 10px;
            margin: 10px 1%;
            border: none;
            border-radius: 4px;
            color: white;
            cursor: pointer;
        }

        input[type="submit"] {
            background-color: #ff4d4d; /* Botón rojo */
        }

        input[type="button"] {
            background-color: #444; /* Botón gris */
        }

        input[type="submit"]:hover {
            background-color: #e60000; /* Rojo más oscuro al pasar el ratón */
        }

        input[type="button"]:hover {
            background-color: #555; /* Gris más claro al pasar el ratón */
        }
    </style>
    <div class="login-container">
        <h2>Iniciar Sesión</h2>
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